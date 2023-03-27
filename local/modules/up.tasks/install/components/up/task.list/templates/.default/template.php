<?php

/**
 * @var array $arResult
 * @var array $arParams
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
?>

<div class="columns mb-6">
	<div class="column">
		<div class="field">
			<div class="control">
				<form id="search" action="/" method="get">
					<input class="input" name="title" type="text" placeholder="Search for tasks">
				</form>
			</div>
		</div>
	</div>
	<div class="column">
		<a class="button is-success is-pulled-right" href="/tasks/create/">Create task</a>
	</div>
</div>


<?php $i = 0; foreach ($arResult['TASKS'] as $task): ?>
	<?php echo ($i % 3 === 0) ? '<div class="columns">' : ''; $i++; ?>
	<div class="column">
		<div class="card project-card">
			<header class="card-header is-<?=strtolower($task->getPriority()->getName());?>">
				<p class="card-header-title">
					<?= $task->getName() ?>
				</p>
				<button class="card-header-icon" aria-label="more options">
					<a href="/tasks/delete/?task=<?= $task->getId() ?>"><span class="tag is-delete"></span></a>
				</button>
			</header>
			<div class="card-content">
				<div class="content">
					<?= $task->getDescription() ?>
				</div>
			</div>
			<footer class="card-footer">
				<span class="card-footer-item is-size-7"><strong>Task Created</strong>: <?= $task->getDateCreation()->format($arParams['DATE_FORMAT']); ?></span>
				<span class="card-footer-item is-size-7"><strong>Priority</strong>: <?= $task->getPriority()->getName(); ?></span>
			</footer>
		</div>
	</div>
	<?= ($i % 3 === 0) ? '</div>' : ''; ?>
<?php endforeach; ?>
</div>
