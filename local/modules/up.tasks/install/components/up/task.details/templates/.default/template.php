<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

use Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

Loc::loadMessages(__FILE__);
?>
<form style="width: 100%" method="post">
	<div class="field">
		<label class="label"><?= Loc::getMessage("UP_TASKS_NAME");?></label>
		<div class="control">
			<label>
				<input required="text" name="NAME" class="input" type="text" placeholder="Text input"
					   value="<?=htmlspecialcharsbx($arResult['task']->getName())?>">
			</label>
		</div>
	</div>
	<div class="field">
		<label class="label"><?= Loc::getMessage("UP_TASKS_DESCRIPTION");?></label>
		<div class="control">
			<label>
				<input name="DESCRIPTION" class="input" type="text" placeholder="Description input"
					   value="<?=htmlspecialcharsbx($arResult['task']->getDescription())?>">
			</label>
		</div>
	</div>

	<div class="field is-grouped">
		<div class="control">
			<input class="button is-link" type="submit" value="<?= Loc::getMessage("UP_TASKS_SAVE_BUTTON");?>">
		</div>
	</div>
</form>