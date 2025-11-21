<?php
/** @var \Kirby\Cms\Page $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class="o-blocks">
			<div class="m-teaser">
				<h1 class="a-heading"><?= $page->alternativeTitle()->or($page->title()) ?></h1>
				<p class="m-text"><?= $page->teaserText() ?></p>
				<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
					<?php snippet('image', [
						'image' => $teaserImage,
						'sizes' => 516 / 16 . 'em',
					]) ?>
				<?php endif ?>
			</div>
			<div class="m-grid">
				<ul>
					<?php foreach ($page->children()->listed() as $knowledgePage): ?>
						<?php /** @var BlogEntryPage|\Kirby\Cms\Page $knowledgePage */ ?>
						<li class="m-grid__item">
							<a class="m-card-lonk" href="<?= $knowledgePage->url() ?>">
								<h3><?= $knowledgePage->title() ?> →</h3>
								<p><?= $knowledgePage->teaser() ?></p>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
