<?php

namespace UP\Tasks\API;

use Bitrix\Main\DB\SqlHelper;
use Bitrix\Main\Diag\Helper;
use Bitrix\Main\ORM\Fields\Validators\Validator;

class TaskList
{
	public static function add(array $data):bool
	{
		if(!checkIntValue($data['PRIORITY'])) return false;

		$result = \Up\Tasks\Model\TaskTable::add([
			'NAME' => db()->getSqlHelper()->forSql($data['NAME']),
			'DESCRIPTION' => db()->getSqlHelper()->forSql($data['DESCRIPTION']),
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

		$title = db()->getSqlHelper()->forSql($title);

		if ($title !== null)
		{
			$result->whereLike('NAME', "%$title%");
		}

		return $result->fetchCollection();
	}

	public static function getById(int $id = null)
	{
		if(!checkIntValue($id)) return false;
		return \Up\Tasks\Model\TaskTable::query()->setSelect(['*', 'PRIORITY'])->whereIn('ID',(int)$id)->fetchObject();
	}

	public static function update(int $id, array $data):bool
	{
		if(!checkIntValue($id)) return false;

		$result = \Up\Tasks\Model\TaskTable::update($id,[
				'NAME' => db()->getSqlHelper()->forSql($data['NAME']),
				'DESCRIPTION' => db()->getSqlHelper()->forSql($data['DESCRIPTION']),
				]);
		return $result->isSuccess();
	}
}