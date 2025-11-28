<?php
/** @var EventPage $page */
/** @var \Kirby\Cms\Pages */
$projectPages = $page->projects()->toPages();
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class=o-blocks>
			<header class=m-teaser-text>
				<a class=a-button-back href=<?= $page->parent()->url() ?>>← Zurück zur Übersicht</a>
				<time datetime="<?= $page->startDate()->toDate('c') ?>">
					<?php if ($page->multiDay()): ?>
						<?= $page->dateTimeFull() ?> – <?= $page->dateTimeFull(true) ?>
					<?php else: ?>
						<?= $page->dateFull() ?> | <?= $page->hours() ?>
					<?php endif ?>
				</time>
				<address>
					<?= $page->addressFull() ?>
				</address>
				<?php if ($projectPages->count() > 0): ?>
					<div class=m-teaser-text__projects>
						<?= tc('project', $projectPages->count()) ?>:
						<?php foreach ($projectPages as $projectPage): ?>
							<a href=<?= $projectPage->url() ?>><?= $projectPage->title() ?></a>
						<?php endforeach ?>
					</div>
				<?php endif ?>
				<h1 class=a-heading><?= $page->title() ?></h1>
				<h2 class=a-heading><?= $page->subtitle() ?></h2>
			</header>
			<?= $page->text()->toBlocks() ?>
			<a class=a-button href="<?= $page->url() ?>.ics">In Kalender eintragen</a>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
