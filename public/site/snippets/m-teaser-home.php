<?php /** @var \Kirby\Cms\Page $page */ ?>
<?php
$teaserImage = $page->teaserImage()->toFile();
$teaserLink = $page->teaserLink()->toObject();

if ($teaserImage === null) {
	return;
}
?>
<div class="m-teaser-home">
	<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
		<?php snippet('image', [
			'image' => $teaserImage,
			'sizes' => '100vw',
		]) ?>
	<?php endif ?>
	<div>
		<h1 class="a-heading"><?= $page->teaserTitle() ?></h1>
		<p class="m-text"><?= $page->teaserText() ?></p>
		<?php if ($page->teaserLink()->isNotEmpty()): ?>
			<a class="a-button" data-kind="transparent" href="<?= $teaserLink->link()->toUrl() ?>">
				<?= $teaserLink->text() ?>
			</a>
		<?php endif ?>
	</div>
</div>

