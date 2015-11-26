<?php

namespace Bitrix\Forum\Comments;

use Bitrix\Forum\Internals\Error\ErrorCollection;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Forum\Internals\Error\Error;
use \Bitrix\Forum\Comments\ForumEntity;
use \Bitrix\Forum\Comments\TaskEntity;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Event;
use \Bitrix\Main\ArgumentTypeException;
use \Bitrix\Main\ArgumentException;

Loc::loadMessages(__FILE__);

class Feed extends BaseObject
{
	const ERROR_PARAMS_MESSAGE = 'params0004';
	const ERROR_PERMISSION = 'params0005';

	private function checkTopic()
	{
		if (empty($this->topic))
		{
			$this->topic = $this->createTopic();
		}
		return ($this->topic !== null);
	}

	public function canAdd()
	{
		global $USER;
		return $this->entity->canAdd();
	}

	public function canRead()
	{
		return $this->entity->canRead();
	}

	public function canEdit()
	{
		return $this->entity->canEdit();
	}

	public function canEditComment(Comment $comment)
	{
		return $this->entity->canEdit($comment);
	}

	public function canDelete()
	{
		return $this->entity->canEdit();
	}

	public function canDeleteComment(Comment $comment)
	{
		return $this->entity->canEdit($comment);
	}

	public function canModerate()
	{
		global $USER;
		return $this->entity->canModerate();
	}

	/**
	 * Add a comment
	 * @param array $params
	 * @return array|false
	 */
	public function add(array $params)
	{
		if (!$this->canAdd())
			$this->errorCollection->addOne(new Error(Loc::getMessage("FORUM_CM_RIGHTS1"), self::ERROR_PERMISSION));
		else if ($this->checkTopic())
		{
			$comment = Comment::create($this);
			$comment->add($params);
			if ($comment->hasErrors())
				$this->errorCollection->add($comment->getErrors());
			else
				return $comment->getComment();
		}
		return false;
	}

	/**
	 * Edit a comment
	 * @param array $params
	 * @return array|false
	 */
	public function edit($id, array $params)
	{
		$comment = Comment::createFromId($this, $id);
		if (!$this->canEdit() && !$comment->canEdit())
			$this->errorCollection->addOne(new Error(Loc::getMessage("FORUM_CM_RIGHTS2"), self::ERROR_PERMISSION));
		else
		{
			$comment->edit($params);
			if ($comment->hasErrors())
				$this->errorCollection->add($comment->getErrors());
			else
				return $comment->getComment();
		}
		return false;
	}

	public function delete($id)
	{
		$comment = Comment::createFromId($this, $id);
		if (!$this->canDelete() && !$comment->canDelete())
			$this->errorCollection->addOne(new Error(Loc::getMessage("FORUM_CM_RIGHTS3"), self::ERROR_PERMISSION));
		else
		{
			$comment->delete();
			if ($comment->hasErrors())
				$this->errorCollection->add($comment->getErrors());
			else
				return $comment->getComment();
		}
		return false;
	}

	public function moderate($id, $show)
	{
		$comment = Comment::createFromId($this, $id);
		if (!$this->canModerate())
			$this->errorCollection->addOne(new Error(Loc::getMessage("FORUM_CM_RIGHTS4"), self::ERROR_PERMISSION));
		else
		{
			$comment->moderate($show);
			if ($comment->hasErrors())
				$this->errorCollection->add($comment->getErrors());
			else
				return $comment->getComment();
		}
		return false;
	}

	public function setPermission($permission)
	{
		return $this->entity->setPermission($permission);
	}
	public function setEditOwn($allow)
	{
		return $this->entity->setEditOwn($allow);
	}
	public function getPermission()
	{
		return $this->entity->getPermission();
	}
}