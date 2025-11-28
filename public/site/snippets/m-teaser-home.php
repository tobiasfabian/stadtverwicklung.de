<?php /** @var \Kirby\Cms\Page $page */ ?>
<?php
$teaserImage = $page->teaserImage()->toFile();
$teaserLink = $page->teaserLink()->toObject();

if ($teaserImage === null) {
	return;
}
?>
<div class=m-teaser-home>
	<div>
		<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
			<picture>
				<source srcset="<?= $teaserImage->thumb([
					'height' => 360,
					'width' => 800,
					'crop' => true,
				])->url() ?> 1x, <?= $teaserImage->thumb([
					'height' => 360 * 2,
					'width' => 800 * 2,
					'quality' => 60,
					'crop' => true,
				])->url() ?> 2x" media="(max-width: 50em)">
				<?php snippet('image', [
					'image' => $teaserImage,
					'sizes' => '100vw',
				]) ?>
			</picture>
		<?php endif ?>
		<div class=m-teaser-home__text>
			<h1 class=a-heading><?= $page->teaserTitle() ?></h1>
			<p class=m-text><?= $page->teaserText() ?></p>
			<?php if ($page->teaserLink()->isNotEmpty()): ?>
				<a class=a-button data-kind=transparent href=<?= $teaserLink->link()->toUrl() ?>>
					<?= $teaserLink->text() ?>
				</a>
			<?php endif ?>
		</div>
	</div>
</div>

