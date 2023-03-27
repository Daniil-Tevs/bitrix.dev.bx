<?php
namespace Up\Tasks\Model;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator,
	Bitrix\Main\ORM\Fields\Relations\OneToMany;

Loc::loadMessages(__FILE__);

class PriorityTable extends DataManager
{
	public static function getTableName()
	{
		return 'up_tasks_priority';
	}

	public static function getMap()
	{
		return [
			'ID' => new IntegerField(
				'ID',
				[
					'primary' => true,
					'autocomplete' => true,
				]
			),
			'NAME' => new StringField(
				'NAME',
				[
					'required' => true,
					'validation' => [__CLASS__, 'validateName'],
				]
			),
			'TASKS' => new OneToMany(
				'TASKS',
				TaskTable::class,
				'PRIORITY'
			)
		];
	}

	public static function validateName()
	{
		return [
			new LengthValidator(null, 255),
		];
	}
}