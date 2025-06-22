<?php
/** @var \Kirby\Cms\Block $block */
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$ratio   = $block->ratio()->or('auto');
?>
<m-gallery
	role="region"
	aria-roledescription="gallery"
	aria-label="Images"
	tabindex="0"
	<?= attr(['data-ratio' => $ratio, 'data-crop' => $crop]) ?>
>
	<ul>
		<?php foreach ($block->images()->toFiles() as $image): ?>
		<li>
			<?= $image ?>
		</li>
		<?php endforeach ?>
	</ul>
</m-gallery>
