<?php

use Kirby\Toolkit\Str;

/** @var \Kirby\Cms\Block $block */

$caption = $block->caption();
$srcset = $block->ratio()->or('default');

$maxWidth = Str::camelToKebab($block->maxWidth()->toString());
$sizes = '(min-width: 69rem) 69rem, 100vw';

if ($maxWidth === 'text-width') {
	$sizes = '(min-width: 45.5em) 45.5rem, 100vw';
}

$files = $block->images()->toFiles();
?>
<m-gallery <?= attr([
	'role' => 'region',
	'aria-roledescription' => 'gallery',
	'aria-label' => t('aria.label.gallery'),
	'tabindex' => 0,
	'data-max-width' => empty($maxWidth) || $maxWidth === 'content-width' ? null : $maxWidth,
]) ?>>
	<ul>
		<?php foreach ($files as $image): ?>
		<li>
			<?php snippet('image', [
				'image' => $image,
				'srcset' => $srcset,
				'sizes' => $sizes,
				'loading' => 'lazy',
			]) ?>
		</li>
		<?php endforeach ?>
	</ul>
</m-gallery>
