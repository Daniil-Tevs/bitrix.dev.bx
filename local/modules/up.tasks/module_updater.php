<?php

use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;

function __tasksMigrate(int $nextVersion, callable $callback)
{
	global $DB;
	$moduleId = 'up.tasks';

	if (!ModuleManager::isModuleInstalled($moduleId))
	{
		return;
	}

	$currentVersion = (int)Option::get($moduleId, '~database_schema_version', 0);

	if ($currentVersion < $nextVersion)
	{
		include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/update_class.php');
		$updater = new \CUpdater();
		$updater->Init('', 'mysql', '', '', $moduleId, 'DB');

		$callback($updater, $DB, 'mysql');
		Option::set($moduleId, '~database_schema_version', $nextVersion);
	}
}

__tasksMigrate(2, function($updater, $DB)
{
	if ($updater->CanUpdateDatabase())
	{
		$DB->query("INSERT IGNORE INTO up_bus.up_tasks_priority(NAME)
		VALUES ('Hight'),('Medium'),('Low');");
	}
});
