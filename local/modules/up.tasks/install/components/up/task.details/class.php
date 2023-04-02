<?php

class TaskDetailsComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$data = request()->getPostList()->toArray();
		if (!empty($data))
		{
			$this->updateTask($this->arParams['id'],$data);
			header('Location: /');
		}
		$this->fetchTask($this->arParams['id']);
		$this->includeComponentTemplate();
	}

	public function onPrepareComponentParams($arParams)
	{
		$arParams['id'] = (int)request()->get('id');
		return $arParams;
	}

	protected function fetchTask($id)
	{
		$task = \UP\Tasks\API\TaskList::getById($id);
		if (!$task)
		{
			header('Location: /');
		}
		$this->arResult['task'] = $task;
	}

	protected function updateTask($id,$data)
	{
		$task = \UP\Tasks\API\TaskList::update($id,$data);
		header('Location: /');
	}
}