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
				<?php if (!$page->isTBA()): ?>
					<time datetime="<?= $page->startDate()->toDate('c') ?>">
						<?php if ($page->multiDay()): ?>
							<?= $page->dateTimeFull() ?> – <?= $page->dateTimeFull(true) ?>
						<?php else: ?>
							<?= $page->dateFull() ?> | <?= $page->hours() ?>
						<?php endif ?>
					</time>
				<?php endif ?>
				<?php if ($page->attendanceMode()->value() === 'OnlineEventAttendanceMode'): ?>
					<em>Online</em>
				<?php else: ?>
					<address>
						<?= $page->addressFull() ?>
					</address>
				<?php endif ?>
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
			<div class="m-stack">
				<?php if ($page->registrationLink()->isNotEmpty() && $page->isUpcoming()): ?>
					<a class=a-button data-kind=solid href="<?= $page->registrationLink() ?>">Jetzt anmelden</a>
				<?php endif ?>
				<a class=a-button href="<?= $page->url() ?>.ics">In Kalender eintragen</a>
			</div>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
