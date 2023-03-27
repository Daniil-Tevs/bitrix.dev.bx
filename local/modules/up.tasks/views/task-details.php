<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Task details");
?>

	<section class="hero is-info">
		<div class="hero-body">
			<nav class="breadcrumb" aria-label="breadcrumbs">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="/projects/1234/">Project name</a></li>
				</ul>
			</nav>
			<p class="title">
				My task <?= (int)$_GET['id'];?> name
			</p>
			<p class="subtitle">
				Some optional short task description
			</p>
		</div>
	</section>

	<div class="columns mt-6">
		<div class="column is-three-quarters">
			<div class="content box pl-6 pr-6">
				<h1>What to do</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, ducimus eveniet explicabo fugit illo iure laboriosam nisi porro praesentium ratione reiciendis voluptatum. Ab accusamus harum maxime natus suscipit voluptas voluptatem.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci enim eveniet exercitationem ipsum maiores necessitatibus officia omnis quidem sit voluptate. Corporis cupiditate excepturi id minima nemo reprehenderit sapiente suscipit vero.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur debitis nostrum officia repudiandae totam veniam! Consequatur, consequuntur earum eos fugit incidunt ipsum, libero magnam neque officia perferendis repellendus suscipit vitae.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores at commodi, dolorum eligendi expedita fugiat iusto quaerat, recusandae repellendus sequi similique, sit totam unde veritatis voluptate voluptates? Animi, fugiat.</p>
			</div>
			<div>
				<?php foreach (range(1, 5) as $i):?>
					<article class="task-comment message is-light">
						<div class="message-header">
							<div>
								<span class="mr-3">#<?= $i; ?></span> Ivan Petrov
							</div>
							<div class="date is-size-7">Yesterday, 16:06</div>
						</div>
						<div class="message-body">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
						</div>
					</article>
				<?php endforeach; ?>
			</div>
			<form class="mt-6" action="/issues/123/comment/" method="post">
				<textarea class="textarea is-info mb-3" placeholder="New comment" name="comment"></textarea>
				<button class="button is-info">Send</button>
			</form>
		</div>
		<div class="column">
			<nav class="panel">
				<p class="panel-heading">
					Metadata
				</p>
				<div class="panel-block is-flex is-flex-direction-column is-align-items-flex-start is-size-7">
					<div class="has-text-weight-semibold">Created at</div>
					<div class="">13 Mar 2023, 14:25</div>
				</div>
				<div class="panel-block is-flex is-flex-direction-column is-align-items-flex-start is-size-7">
					<div class="has-text-weight-semibold">Updated at</div>
					<div class="">13 Mar 2023, 16:20</div>
				</div>
				<div class="panel-block is-flex is-flex-direction-column is-align-items-flex-start is-size-7">
					<div class="has-text-weight-semibold">Deadline</div>
					<div class="">18 Mar 2023, 12:00</div>
				</div>
				<div class="panel-block is-flex is-flex-direction-column is-align-items-flex-start is-size-7">
					<div class="has-text-weight-semibold">Responsible</div>
					<div class="">Eugene Zadorin</div>
				</div>
			</nav>
		</div>
	</div>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");?>