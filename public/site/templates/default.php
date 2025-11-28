<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class=o-blocks data-gap=small>
			<h1 class=a-heading><?= $page->title() ?></h1>
			<?= $page->text()->toBlocks() ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
