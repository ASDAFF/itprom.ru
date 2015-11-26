<?php

namespace Bitrix\Iblock\BizprocType;

use Bitrix\Bizproc\FieldType;
use Bitrix\Main\Loader;

class UserTypePropertyDiskFile extends UserTypeProperty
{

	/**
	 * @param FieldType $fieldType
	 * @param $value
	 * @return string
	 */
	protected static function formatValuePrintable(FieldType $fieldType, $value)
	{
		if(!Loader::includeModule('disk'))
		{
			return '';
		}

		$attachedId = (int)$value;
		$attachedModel = \Bitrix\Disk\AttachedObject::loadById($attachedId, array('OBJECT'));
		if(!$attachedModel)
		{
			return '';
		}

		global $USER;
		$userId = $USER->getID();
		if($userId)
		{
			if(!$attachedModel->canRead($userId))
			{
				return '';
			}
		}

		$file = $attachedModel->getFile();
		if(!$file)
		{
			return '';
		}

		$driver = \Bitrix\Disk\Driver::getInstance();
		$urlManager = $driver->getUrlManager();

		return '[url='.$urlManager->getUrlUfController('download', array('attachedId' => $attachedModel->getId())
			).']'.htmlspecialcharsbx($file->getName()).'[/url]';
	}

	/**
	 * @param FieldType $fieldType Document field object.
	 * @param array $field Form field information.
	 * @param mixed $value Field value.
	 * @param bool $allowSelection Allow selection flag.
	 * @param int $renderMode Control render mode.
	 * @return string
	 */
	public static function renderControlSingle(FieldType $fieldType, array $field, $value, $allowSelection, $renderMode)
	{
		return static::renderControlMultiple($fieldType, $field, $value, $allowSelection, $renderMode);
	}

	/**
	 * @param FieldType $fieldType Document field object.
	 * @param array $field Form field information.
	 * @param mixed $value Field value.
	 * @param bool $allowSelection Allow selection flag.
	 * @param int $renderMode Control render mode.
	 * @return string
	 */
	public static function renderControlMultiple(FieldType $fieldType, array $field, $value, $allowSelection, $renderMode)
	{
		if ($renderMode & FieldType::RENDER_MODE_DESIGNER)
			return '';

		$userType = static::getUserType($fieldType);



		$documentType = $fieldType->getDocumentType();

		$iblockId = $documentType[2];
		$iblockId = str_replace('iblock_', '', $iblockId);

		if (!empty($userType['GetPublicEditHTML']))
		{
			if (!isset($value['VALUE']))
				$value = array('VALUE' => $value);

			$fieldName = static::generateControlName($field);
			$fieldName .= $fieldType->isMultiple() ? '' : '[]';
			$renderResult = call_user_func_array(
				$userType['GetPublicEditHTML'],
				array(
					array(
						'IBLOCK_ID' => $iblockId,
						'IS_REQUIRED' => $fieldType->isRequired()? 'Y' : 'N',
						'PROPERTY_USER_TYPE' => $userType
					),
					$value,
					array(
						'FORM_NAME' => $field['Form'],
						'VALUE' => $fieldName,
						'DESCRIPTION' => '',
					),
					true
				)
			);
		}
		else
			$renderResult = static::renderControl($fieldType, $field, $value, $allowSelection, $renderMode);

		return $renderResult;
	}

	public static function extractValue(FieldType $fieldType, array $field, array $request)
	{
		if(!Loader::includeModule('disk'))
			return null;

		$value = parent::extractValue($fieldType, $field, $request);
		if (isset($value['VALUE']))
			$value = $value['VALUE'];

		if(!$value)
			return null;

		// Attach file disk
		$userFieldManager = \Bitrix\Disk\Driver::getInstance()->getUserFieldManager();
		list($connectorClass, $moduleId) = $userFieldManager->getConnectorDataByEntityType('iblock_workflow');
		list($type, $realId) = \Bitrix\Disk\Uf\FileUserType::detectType($value);

		if($type != \Bitrix\Disk\Uf\FileUserType::TYPE_NEW_OBJECT)
			return null;

		$errorCollection = new \Bitrix\Disk\Internals\Error\ErrorCollection();
		$fileModel = \Bitrix\Disk\File::loadById($realId, array('STORAGE'));
		if(!$fileModel)
			return null;

		$securityContext = $fileModel->getStorage()->getCurrentUserSecurityContext();

		if(!$fileModel->canRead($securityContext))
			return null;

		$documentType = $fieldType->getDocumentType();
		$iblockId = intval(substr($documentType[2], strlen("iblock_")));

		$canUpdate = $fileModel->canUpdate($securityContext);

		global $USER;

		$attachedModel = \Bitrix\Disk\AttachedObject::add(array(
			'MODULE_ID' => $moduleId,
			'OBJECT_ID' => $fileModel->getId(),
			'ENTITY_ID' => $iblockId,
			'ENTITY_TYPE' => $connectorClass,
			'IS_EDITABLE' => (int)$canUpdate,
			'ALLOW_EDIT' => (int) ($canUpdate && (int)\Bitrix\Main\Application::getInstance()->getContext()->getRequest()->getPost('DISK_FILE_'.$iblockId.'_DISK_ATTACHED_OBJECT_ALLOW_EDIT')),
			'CREATED_BY' => $USER->getId(),
		), $errorCollection);
		if(!$attachedModel || $errorCollection->hasErrors())
			return null;

		return $attachedModel->getId();
	}

	public static function clearValueSingle(FieldType $fieldType, $value)
	{
		if(!Loader::includeModule('disk'))
			return;

		$value = (int)$value;
		if(!$value)
			return;

		$documentType = $fieldType->getDocumentType();
		$iblockId = intval(substr($documentType[2], strlen("iblock_")));
		if(!$iblockId)
			return;

		$userFieldManager = \Bitrix\Disk\Driver::getInstance()->getUserFieldManager();
		list($type, $realId) = \Bitrix\Disk\Uf\FileUserType::detectType($value);
		if($type == \Bitrix\Disk\Uf\FileUserType::TYPE_ALREADY_ATTACHED)
		{
			$attachedModel = \Bitrix\Disk\AttachedObject::loadById($realId);
			if(!$attachedModel)
				return;

			if($userFieldManager->belongsToEntity($attachedModel, "iblock_workflow", $iblockId))
				\Bitrix\Disk\AttachedObject::detachByFilter(array('ID' => $realId));
		}
	}
}