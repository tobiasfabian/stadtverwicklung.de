<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
/** @var \Kirby\Cms\Structure */
$logos = $block->logos()->toStructure();

if ($logos->count() === 0) return;
?>
<div class="m-logos">
	<?php if ($block->headline()->isNotEmpty()): ?>
		<h2 class="a-heading"><?= $block->headline() ?></h2>
	<?php endif ?>
	<?php if ($block->text()->isNotEmpty()): ?>
		<div class="m-text" data-text-size="small">
			<?= $block->text() ?>
		</div>
	<?php endif ?>
	<?php snippet('m-list-logos', ['logos' => $logos]) ?>
</div>

