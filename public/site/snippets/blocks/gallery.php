<?php
/** @var \Kirby\Cms\Block $block */
$caption = $block->caption();
$srcset = $block->ratio()->or('default');

$files = $block->images()->toFiles();
?>
<m-gallery
	role="region"
	aria-roledescription="gallery"
	aria-label="Images"
	tabindex="0"
>
	<ul>
		<?php foreach ($files as $image): ?>
		<li>
			<?php snippet('image', [
				'image' => $image,
				'srcset' => $srcset,
				'sizes' => '(min-width: 66rem) 66rem, 100vw'
			]) ?>
		</li>
		<?php endforeach ?>
	</ul>
</m-gallery>
