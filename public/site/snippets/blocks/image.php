<?php

/** @var \Kirby\Cms\Block $block */

$alt = $block->alt();
$caption = $block->caption();
$srcset = $block->ratio()->or('default');
$image = $block->image()->toFile();
$alt = $alt->or($image->alt());

if ($image === null) {
	return;
}
?>
<figure class="m-figure">
	<?php snippet('image', [
		'image' => $image,
		'srcset' => $srcset,
		'alt' => $alt,
		'sizes' => '(min-width: 66rem) 66rem, 100vw'
	]) ?>

	<?php if ($caption->isNotEmpty()): ?>
	<figcaption>
		<?= $caption ?>
	</figcaption>
	<?php endif ?>
</figure>
