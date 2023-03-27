<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<form style="width: 100%" method="post">
	<div class="field">
		<label class="label">Name</label>
		<div class="control">
			<label>
				<input required="text" name="NAME" class="input" type="text" placeholder="Text input">
			</label>
		</div>
	</div>
	<div class="field">
		<label class="label">Description</label>
		<div class="control">
			<label>
				<input name="DESCRIPTION" class="input" type="text" placeholder="Description input">
			</label>
		</div>
	</div>

	<div class="field">
		<label class="label">Priority</label>
		<div class="control">
			<div class="select">
				<label>
					<select name='PRIORITY'>
						<?php foreach ($arResult['PRIORITY'] as $priority):?>
						<option value="<?=$priority->getId()?>"><?=$priority->getName()?></option>
						<?php endforeach;?>
					</select>
				</label>
			</div>
		</div>
	</div>

	<div class="field is-grouped">
		<div class="control">
			<input class="button is-link" type="submit" value="Save">
		</div>
	</div>
</form>