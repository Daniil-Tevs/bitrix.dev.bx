<?php

class TaskDeleteComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->deleteTask($this->arParams['id']);
		$this->includeComponentTemplate();
	}

	public function onPrepareComponentParams($arParams)
	{
		$id = request()->get('task');
		if (checkIntValue($id))
		{
			$arParams['id'] = (int)$id;

			return $arParams;
		}
		ShowMessage("'$id' isn't correct form of id");
		exit();
	}

	protected function deleteTask($id)
	{
		if (\UP\Tasks\API\TaskList::deleteById($id))
		{
			header('Location: /');
		}
		ShowMessage("task by '$id' isn't deleted");
	}
}