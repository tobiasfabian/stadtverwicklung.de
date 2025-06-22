<?php /** @var \Kirby\Cms\Block $block */ ?>
<div class="m-text" <?= attr([
	'data-text-size' => $block->textSize()->isNotEmpty() ? $block->textSize() : null,
	'data-width' => $block->width()->isNotEmpty() ? $block->width() : null,
]) ?>>
	<?= $block->text() ?>
</div>
