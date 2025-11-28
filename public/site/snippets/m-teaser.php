<div class=m-teaser>
	<h1 class=a-heading><?= $page->alternativeTitle()->or($page->title()) ?></h1>
	<?php if ($page->teaserText()->isNotEmpty()): ?>
		<div class=m-teaser__text>
			<p class=m-text><?= $page->teaserText() ?></p>
		</div>
	<?php endif ?>
	<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
		<?php snippet('image', [
			'image' => $teaserImage,
			'sizes' => 528 / 16 . 'em',
		]) ?>
	<?php endif ?>
</div>
