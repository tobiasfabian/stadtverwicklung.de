<?php
/** @var BlogEntryPage $page */
$tags = $page->tags()->split();
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
				<?php if (count($tags) > 0): ?>
					<div class=m-teaser-text__tags>
						<?php foreach ($tags as $tag): ?>
							<em>#<?= $tag ?></em>
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
