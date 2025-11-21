<?php
/** @var BlogEntryPage $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class="o-blocks" data-gap="small" data-variant="blog-entry">
			<header class="m-teaser-text">
				<a class="a-button-back" href="<?= $page->parent()->url() ?>">← Zurück zur Übersicht</a>
				<time datetime="<?= $page->date()->toDate('c') ?>">
					<?= $page->date()->toDate('d.m.Y') ?>
				</time>
				<h1 class="a-heading"><?= $page->title() ?></h1>
			</header>

			<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
				<figure class="m-figure">
					<?php snippet('image', [
						'image' => $teaserImage,
						'sizes' => '(min-width: 66rem) 66rem, 100vw',
					]) ?>
				</figure>
			<?php endif ?>
			<?= $page->text()->toBlocks() ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
