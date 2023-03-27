<?php
namespace Up\Tasks\Model;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\DatetimeField,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator,
	Bitrix\Main\ORM\Fields\Relations\Reference,
	Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\Type\DateTime;

Loc::loadMessages(__FILE__);

class TaskTable extends DataManager
{
	public static function getTableName()
	{
		return 'up_tasks_task';
	}

	public static function getMap()
	{
		return [
			'ID'=>new IntegerField(
				'ID',
				[
					'primary' => true,
					'autocomplete' => true
				]
			),
			'NAME'=>new StringField(
				'NAME',
				[
					'required' => true,
					'validation' => [__CLASS__, 'validateName']
				]
			),
			'DESCRIPTION'=>new StringField(
				'DESCRIPTION',
				[
					'validation' => [__CLASS__, 'validateDescription']
				]
			),
			'ID_PRIORITY' =>new IntegerField(
				'ID_PRIORITY',
				[
					'required' => true
				]
			),
			'PRIORITY' => (new Reference(
				'PRIORITY',
				PriorityTable::class,
				Join::on('this.ID_PRIORITY','ref.ID')
			))->configureJoinType('inner'),
			'DATE_CREATION' => new DatetimeField(
				'DATE_CREATION',
				[
					'default_value' => function(){
						return new DateTime();
					}
				]
			),
		];
	}

	public static function validateName()
	{
		return [
			new LengthValidator(null, 255),
		];
	}

	public static function validateDescription()
	{
		return [
			new LengthValidator(null, 510),
		];
	}
}