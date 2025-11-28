<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$image = $block->image()->toFile();
$text = $block->text();
?>
<div class=m-short-introduction>
	<?php if ($block->headline()->isNotEmpty()): ?>
		<h2 class=a-heading><?= $block->headline() ?></h2>
	<?php endif ?>
	<?php if ($image): ?>
		<?php snippet('image', [
			'image' => $image,
			'sizes' => 352 / 16 . 'em',
			'srcset' => 'short-introduction',
		]) ?>
	<?php endif ?>
	<div class=m-short-introduction__text>
		<?= $text ?>
	</div>
</div>
