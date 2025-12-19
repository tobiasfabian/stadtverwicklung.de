<?php
/** @var BlogEntryPage $page */
$projectPages = $page->projects()->toPages();
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class=o-blocks data-gap=small data-variant=blog-entry>
			<header class=m-teaser-text>
				<a class=a-button-back href=<?= $page->parent()->url() ?>>← Zurück zur Übersicht</a>
				<time datetime="<?= $page->date()->toDate('c') ?>">
					<?= $page->date()->toDate('d.m.Y') ?>
				</time>
				<?php if ($projectPages->count() > 0): ?>
					<div class=m-teaser-text__projects>
						<?= tc('project', $projectPages->count()) ?>:
						<?php foreach ($projectPages as $projectPage): ?>
							<a href=<?= $projectPage->url() ?>><?= $projectPage->title() ?></a>
						<?php endforeach ?>
					</div>
				<?php endif ?>
				<h1 class=a-heading><?= $page->title() ?></h1>
			</header>

			<?= $page->text()->toBlocks() ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
