<?php /** @var \Kirby\Cms\Page $page */ ?>
<?php
$teaserImage = $page->teaserImage()->toFile();
$teaserLink = $page->teaserLink()->toObject();

if ($teaserImage === null) {
	return;
}
?>
<div class=m-teaser-home>
		<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
			<?php snippet('image', [
				'image' => $teaserImage,
				'srcset' => 'm-teaser-home',
				'sizes' => '100vw',
			]) ?>
		<?php endif ?>
		<div class="m-teaser-home__overlay" data-variant="mask"></div>
		<div class="m-teaser-home__overlay"></div>
		<div class=m-teaser-home__text>
			<h1 class=a-heading><?= $page->teaserTitle() ?></h1>
		</div>
		<?php if ($page->teaserText()->isNotEmpty()): ?>
			<div class="m-teaser-home__bubble">
				<p><?= $page->teaserText() ?></p>
				<?php if ($page->teaserLink()->isNotEmpty()): ?>
					<a class="a-button" href="<?= $page->teaserLink()->toObject()->link()->toUrl() ?>" data-kind=transparent-dark data-size=large><?= $page->teaserLink()->toObject()->text() ?></a>
				<?php endif ?>
			</div>
		<?php endif ?>
</div>

