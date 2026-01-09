<?php

/** @var \Kirby\Cms\Block $block */

use Kirby\Toolkit\Str;

$alt = $block->alt();
$caption = $block->caption();
$srcset = $block->ratio()->or('default');
$image = $block->image()->toFile();
$alt = $alt->or($image?->alt());
$maxWidth = Str::camelToKebab($block->maxWidth()->toString());
$sizes = '(min-width: 69rem) 69rem, 100vw';

if ($maxWidth === 'text-width') {
	$sizes = '(min-width: 45.5em) 45.5rem, 100vw';
}

if ($image === null) {
	return;
}
?>
<figure class=m-figure <?= attr([
	'data-max-width' => empty($maxWidth) || $maxWidth === 'content-width' ? null : $maxWidth,
]) ?>>
	<?php snippet('image', [
		'image' => $image,
		'srcset' => $srcset,
		'alt' => $alt,
		'sizes' => $sizes,
		'loading' => 'lazy',
	]) ?>

	<?php if ($caption->isNotEmpty()): ?>
	<figcaption>
		<?= $caption ?>
	</figcaption>
	<?php endif ?>
</figure>
