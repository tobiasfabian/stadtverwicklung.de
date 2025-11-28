<?php
/** @var EventPage $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class="o-blocks">
			<header class="m-teaser-text">
				<a class="a-button-back" href="<?= $page->parent()->url() ?>">← Zurück zur Übersicht</a>
				<time datetime="<?= $page->startDate()->toDate('c') ?>">
					<?= $page->dateFull() ?> | <?= $page->hours() ?>
				</time>
				<address>
					<?= $page->addressFull() ?>
				</address>
				<h1 class="a-heading"><?= $page->title() ?></h1>
				<h2 class="a-heading"><?= $page->subtitle() ?></h2>
				<?php if ($projectPages->count() > 0): ?>
					<div class=m-teaser-text__projects>
						<?= tc('project', $projectPages->count()) ?>:
						<?php foreach ($projectPages as $projectPage): ?>
							<a href=<?= $projectPage->url() ?>><?= $projectPage->title() ?></a>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			</header>

			<?= $page->text()->toBlocks() ?>
			<a class="a-button" href="<?= $page->url() ?>.ics">In Kalender eintragen</a>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
