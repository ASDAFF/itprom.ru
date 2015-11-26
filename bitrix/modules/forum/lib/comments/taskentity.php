<?php

namespace Bitrix\Forum\Comments;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Loader;

final class TaskEntity extends Entity
{
	private $taskPostData;
	private $hasAccess;

	/**
	 * @return bool
	 */
	public function canRead()
	{
		// you are not allowed to view the task, so you can not read messages
		if(!$this->checkHasAccess())
		{
			return false;
		}

		return parent::canRead();
	}
	/**
	 * @return bool
	 */
	public function canAdd()
	{
		// you are not allowed to view the task, so you can not add new messages
		if(!$this->checkHasAccess())
		{
			return false;
		}

		return parent::canAdd();
	}

	/**
	 * @return bool
	 */
	public function canEditOwn()
	{
		// you must obey module settings
		if(!static::checkEditOptionIsOn())
		{
			return false;
		}

		// you are not allowed to view the task, so you can not edit messages either (even own)
		if(!$this->checkHasAccess())
		{
			return false;
		}

		return parent::canEditOwn();
	}

	/**
	 * @return bool
	 */
	public function canEdit()
	{
		$userId = $this->getUser()->getId();

		// admin is always able to edit\remove comments
		if (
			Loader::includeModule("tasks")
			&& (
				\CTasksTools::isAdmin($userId)
				|| \CTasksTools::IsPortalB24Admin($userId)
			)
		)
		{
			return true;
		}

		// if you are not an admin, you must obey "tasks" module settings
		if(!static::checkEditOptionIsOn())
		{
			return false;
		}

		// you are not allowed to view the task, so you can not edit messages either (even own)
		if(!$this->checkHasAccess())
		{
			return false;
		}

		// in all other ways - depends on "forum" module settings
		return parent::canEdit();
	}

	public function dropCache()
	{
		$this->taskPostData = null;
		$this->hasAccess = null;
	}

	private function checkHasAccess()
	{
		if($this->hasAccess === null)
		{
			try
			{
				if (Loader::includeModule("tasks"))
				{
					$task = new \CTaskItem($this->getId(), $this->getUser()->getId());
					$this->hasAccess = $task->checkCanRead();
				}
				else
				{
					return false;
				}

			}
			catch(\TasksException $e)
			{
				return false;
			}
		}

		return $this->hasAccess;
	}

	private function loadTaskData()
	{
		if($this->taskPostData === null)
		{
			try
			{
				if (Loader::includeModule("tasks"))
				{
					$task = new \CTaskItem($this->getId(), $this->getUser()->getId());
					$this->taskPostData = $task->getData(false);
				}
				else
				{
					return array();
				}
			}
			catch(\TasksException $e)
			{
				return array();
			}
		}
		return $this->taskPostData;
	}

	private static function checkEditOptionIsOn()
	{
		return Option::get("tasks", "task_comment_allow_edit");
	}
}