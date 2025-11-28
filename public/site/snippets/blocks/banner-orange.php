<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$link = $block->link()->toObject();
$image = $block->image()->toFile();
?>
<div class=m-banner-orange>
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
			'sizes' => 480 / 16 . 'rem',
		]) ?>
	</div>
</div>
