<?php
/** @var EventsPage|\Kirby\Cms\Page $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class=o-blocks>
			<?php snippet('m-teaser') ?>

			<?= $page->text()->toBlocks() ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
