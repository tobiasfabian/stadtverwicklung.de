<?php
/** @var EventsPage|\Kirby\Cms\Page $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class="o-blocks">
			<div class="m-teaser">
				<h1 class="a-heading"><?= $page->alternativeTitle()->or($page->title()) ?></h1>
				<p class="m-text"><?= $page->teaserText() ?></p>
				<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
					<?php snippet('image', [
						'image' => $teaserImage,
						'sizes' => 516 / 16 . 'em',
					]) ?>
				<?php endif ?>
			</div>

			<?= $page->text()->toBlocks() ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
