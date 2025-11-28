<?php
/** @var \Kirby\Cms\Page $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class=o-blocks>
			<?php snippet('m-teaser') ?>
			<div class=m-grid>
				<ul>
					<?php foreach ($page->children()->listed() as $projectPage): ?>
						<?php /** @var ProjectPage|\Kirby\Cms\Page $projectPage */ ?>
						<li class=m-grid__item>
							<a class=m-card-link href=<?= $projectPage->url() ?>>
								<h3><?= $projectPage->title() ?> →</h3>
								<?php if ($projectPage->teaserText()->isNotEmpty()): ?>
									<p><?= strip_tags($projectPage->teaserText(), ['strong']) ?></p>
								<?php endif ?>
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
