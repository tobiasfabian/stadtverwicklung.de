<?php

/** @var \Kirby\Cms\Block $block */

$alt = $block->alt();
$caption = $block->caption();
$crop = $block->crop()->isTrue();
$ratio = $block->ratio()->or('auto');
$image = $block->image()->toFile();
$alt = $alt->or($image->alt());

if ($image === null) {
	return;
}
?>
<figure class="m-figure">
	<img src="<?= $image->url() ?>" alt="<?= $alt->esc() ?>">

	<?php if ($caption->isNotEmpty()): ?>
	<figcaption>
		<?= $caption ?>
	</figcaption>
	<?php endif ?>
</figure>
