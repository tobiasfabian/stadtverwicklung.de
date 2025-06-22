<?php
/** @var EventPage $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main class="o-event">
		<a class="a-button-back" href="<?= $page->parent()->url() ?>">← Zurück zur Übersicht</a>

		<header class="o-event__header">
			<time datetime="<?= $page->startDate()->toDate('c') ?>">
				<?= $page->dateFull() ?> | <?= $page->hours() ?>
			</time>
			<address class="a-tag" data-size="large">
				<?= $page->addressFull() ?>
			</address>
			<h1 class="a-heading"><?= $page->title() ?></h1>
			<h2 class="a-heading"><?= $page->subtitle() ?></h2>
		</header>

		<div class="o-event__content">
			<div class="o-blocks" data-gap="small">
				<?= $page->text()->toBlocks() ?>
				<a class="a-button" href="<?= $page->url() ?>.ics">In Kalender eintragen</a>
			</div>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
