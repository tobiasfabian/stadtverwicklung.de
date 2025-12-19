<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$image = $block->image()->toFile();
$link = $block->link()->toObject();
$title = $block->title();
$text = $block->text();

if ($image === null) {
	return;
}
?>
<div class=m-teaser-illustration>
	<div>
		<?php if ($image): ?>
			<picture>
				<source srcset="<?= $image->thumb([
					'height' => 360,
					'width' => 800,
					'crop' => true,
				])->url() ?> 1x, <?= $image->thumb([
					'height' => 360 * 2,
					'width' => 800 * 2,
					'quality' => 60,
					'crop' => true,
				])->url() ?> 2x" media="(max-width: 50em)">
				<?php snippet('image', [
					'image' => $image,
					'sizes' => '100vw',
					'fetchpriority' => 'high',
				]) ?>
			</picture>
		<?php endif ?>
		<div class="m-teaser-illustration__text">
			<h1 class="a-heading"><?= $title ?></h1>
			<p class="m-text"><?= $text ?></p>
			<?php if ($link->link()->toUrl()): ?>
				<a class="a-button" data-kind="transparent" href="<?= $link->link()->toUrl() ?>">
					<?= $link->text() ?>
				</a>
			<?php endif ?>
		</div>
	</div>
</div>

