<?php
/** @var BlogEntryPage $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main class="o-blog-entry">
		<a class="a-button-back" href="<?= $page->parent()->url() ?>">← Zurück zur Übersicht</a>

		<header class="o-blog-entry__header">
			<time datetime="<?= $page->date()->toDate('c') ?>">
				<?= $page->date()->toDate('d.m.Y') ?>
			</time>
			<h1 class="a-heading"><?= $page->title() ?></h1>
		</header>

		<div class="o-blog-entry__content">
			<div class="o-blocks" data-gap="small" data-variant="blog-entry">
				<figure class="m-figure">
					<img <?= attr([
						'src' => $page->teaserImage()->toObject()->src(),
						'srcset' => $page->teaserImage()->toObject()->srcset(),
						'width' => $page->teaserImage()->toObject()->width(),
						'height' => $page->teaserImage()->toObject()->height(),
						'alt' => $page->teaserImage()->toObject()->alt(),
						'sizes' => '(min-width: 66rem) 66rem, 100vw',
					]) ?>>
				</figure>
				<?= $page->text() ?>
			</div>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
