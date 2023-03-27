<?php

namespace UP\Tasks\API;

use Bitrix\Main\DB\SqlHelper;
use Bitrix\Main\Diag\Helper;
use Bitrix\Main\ORM\Fields\Validators\Validator;

class TaskList
{
	public static function add($data):bool
	{
		if(!checkIntValue($data['PRIORITY'])) return false;

		$result = \Up\Tasks\Model\TaskTable::add([
			'NAME' => $data['NAME'],
			'DESCRIPTION' => $data['DESCRIPTION'],
			'ID_PRIORITY' => (int)$data['PRIORITY'],
			]);
		return $result->isSuccess();
	}

	public static function deleteById($id): bool
	{
		if(!checkIntValue($id)) return false;
		return \Up\Tasks\Model\TaskTable::delete((int)$id)->isSuccess();
	}

	public static function get(string $title = null)
	{
		$result = \Up\Tasks\Model\TaskTable::query()->setSelect(['*', 'PRIORITY'])->addOrder('ID_PRIORITY');
		if ($title !== null)
		{
			$result->whereLike('NAME', "%$title%");
		}

		return $result->fetchCollection();
	}
}