<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$styles = array_filter([
	'color' => $block->color()->isNotEmpty() ? $block->color() : null,
	'background-color' => $block->backgroundColor()->isNotEmpty() ? $block->backgroundColor() : null,
]);
?>
<div class="o-background" <?= attr([
	'data-gradient' => $block->gradient()->value(),
	'style' => [
		'color' => $block->color(),
		'background-color' => $block->backgroundColor(),
	],
	'style' => implode('; ', array_map(
			fn($k, $v) => "$k: $v",
			array_keys($styles),
			$styles
	)),
]) ?>>
	<div class="o-blocks">
		<?= $block->text()->toBlocks() ?>
	</div>
</div>
