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
					<?php foreach ($page->children()->listed() as $knowledgePage): ?>
						<?php /** @var KnowledgeEntryPage|\Kirby\Cms\Page $knowledgePage */ ?>
						<li class=m-grid__item>
							<a class=m-card-link href=<?= $knowledgePage->url() ?>>
								<h3><?= $knowledgePage->title() ?> →</h3>
								<p><?= $knowledgePage->teaserText() ?></p>
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
