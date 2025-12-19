<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$link = $block->link()->toObject();
$image = $block->image()->toFile();

$style = [];
if ($block->colorBackground()->isNotEmpty()) {
	$style[] = '--_color-background: ' . 	$block->colorBackground();
}
if ($block->color()->isNotEmpty()) {
	$style[] = '--_color: ' . 	$block->color();
}
?>
<div class=m-banner <?= attr([
	'style' => $style ? implode(';', $style) : null,
])
?>>
	<div>
		<div>
			<h2 class=a-heading><?= $block->title() ?></h2>
			<p class=m-text><?= $block->text() ?></p>
			<?php if ($block->link()->isNotEmpty()): ?>
				<a class=a-button data-kind=transparent-dark href=<?= $link->link()->toUrl() ?>>
					<?= $link->text() ?>
				</a>
			<?php endif ?>
		</div>
		<?php snippet('image', [
			'image' => $image,
			'sizes' => '(width > 52em) ' . 576 / 16 . 'rem, ' .  380 / 16 . 'rem',
			'loading' => 'lazy',
		]) ?>
	</div>
</div>
