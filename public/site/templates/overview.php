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
					<?php foreach ($page->children()->listed() as $subpage): ?>
						<?php /** @var \Kirby\Cms\Page $subpage */ ?>
						<li class=m-grid__item>
							<a href=<?= $subpage->url() ?>>
								<?php snippet('image', [
									'image' => $subpage->teaserImage()->or($subpage->metaImage())->toFile(),
									'srcset' => 'card',
								]) ?>
								<h3><?= $subpage->title() ?> →</h3>
								<?php if ($subpage->teaserText()->isNotEmpty()): ?>
									<p><?= strip_tags($subpage->teaserText(), ['strong']) ?></p>
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
