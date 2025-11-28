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
				<div class="m-teaser__text">
					<p class="m-text"><?= $page->teaserText() ?></p>
				</div>
				<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
					<?php snippet('image', [
						'image' => $teaserImage,
						'sizes' => 516 / 16 . 'em',
					]) ?>
				<?php endif ?>
			</div>
			<h2 class="a-heading">Aktuelle Projekte</h2>
			<div class="m-grid">
				<ul>
					<?php foreach ($page->children()->listed() as $projectPage): ?>
						<?php /** @var ProjectPage|\Kirby\Cms\Page $projectPage */ ?>
						<li class="m-grid__item">
							<a class="m-card-lonk" href="<?= $projectPage->url() ?>">
								<h3><?= $projectPage->title() ?> →</h3>
								<p><?= $projectPage->teaserText() ?></p>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			<h2 class="a-heading">Abgeschlossene Projekte</h2>
			<div class="m-grid">
				<ul>
					<?php foreach ($page->children()->unlisted() as $projectPage): ?>
						<?php /** @var ProjectPage|\Kirby\Cms\Page $projectPage */ ?>
						<li class="m-grid__item">
							<a class="m-card-lonk" href="<?= $projectPage->url() ?>">
								<h3><?= $projectPage->title() ?> →</h3>
								<p><?= $projectPage->teaserText() ?></p>
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
