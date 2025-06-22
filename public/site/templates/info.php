<?php
/** @var EventsPage|\Kirby\Cms\Page $page */
?>
<?php snippet('head'); ?>
<body class="t-events">
	<?php snippet('o-header') ?>
	<main class="o-info">
		<div class="m-teaser">
			<h1 class="a-heading"><?= $page->alternativeTitle()->or($page->title()) ?></h1>
			<p class="m-text"><?= $page->teaserText() ?></p>
			<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
				<img src="<?= $teaserImage->url() ?>">
			<?php endif ?>
		</div>
		<div class="o-blocks">
			<?= $page->text()->toBlocks() ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
