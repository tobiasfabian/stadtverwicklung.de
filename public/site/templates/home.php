<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<?php snippet('m-teaser-start') ?>
		<div class=o-blocks>
			<?= $page->text()->toBlocks() ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
