<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$image = $block->image()->toFile();
$text = $block->text();
$srcset = $block->content()->has('ratio') ? $block->ratio()->or('default') : 'short-introduction';
$sizes = 352 / 16 . 'em';
?>
<div class=m-short-introduction>
	<?php if ($block->headline()->isNotEmpty()): ?>
		<h2 class=a-heading><?= $block->headline() ?></h2>
	<?php endif ?>
	<?php if ($image): ?>
		<figure class="m-figure">
			<?php snippet('image', [
				'image' => $image,
				'sizes' => $sizes,
				'srcset' => $srcset,
				'loading' => 'lazy',
			]) ?>
			<?php if ($block->caption()->isNotEmpty()): ?>
				<figcaption>
					<?= $block->caption() ?>
				</figcaption>
			<?php endif ?>
		</figure>
	<?php endif ?>
	<div class=m-short-introduction__text>
		<?= $text ?>
	</div>
</div>
