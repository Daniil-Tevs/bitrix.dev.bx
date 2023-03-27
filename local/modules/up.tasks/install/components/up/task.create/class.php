<?php

class TaskCreateComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$data = request()->getPostList()->toArray();
		if(!empty($data))
		{
			$this->createTask($data);
		}
		$this->fetchPriority();
		$this->includeComponentTemplate();
	}

	protected function fetchPriority(): void
	{
		$this->arResult['PRIORITY'] = \UP\Tasks\API\PriorityList::get();
	}

	protected function createTask($data): void
	{
		if(\UP\Tasks\API\TaskList::add($data))
		{
			header('Location: /');
		}
		ShowMessage("Tasks don't be added");
	}
}