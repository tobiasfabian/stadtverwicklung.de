<?php
/** @var EventsPage|\Kirby\Cms\Page $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class=o-blocks>
			<div class=m-teaser>
				<h1 class=a-heading><?= $page->alternativeTitle()->or($page->title()) ?></h1>
				<div class=m-teaser__text>
					<?php if ($page->teaserText()->isNotEmpty()): ?>
						<div class=m-text>
							<?= $page->teaserText() ?>
						</div>
					<?php endif ?>
					<?php if ($page->status() === 'unlisted'): ?>
						<div class=m-text>
							<dl>
								<dt>Zeitraum</dt>
								<dd><?= $page->period() ?></dd>
								<dt>Ort</dt>
								<dd><?= $page->location() ?></dd>
								<dt>Handlungsfelder</dt>
								<dd><?= $page->areas_of_action() ?></dd>
							</dl>
							<p><strong><?= $page->partner()->kti()?></strong></p>
						</div>
					<?php endif ?>
				</div>
				<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
					<?php snippet('image', [
						'image' => $teaserImage,
						'sizes' => 516 / 16 . 'em',
					]) ?>
				<?php endif ?>
			</div>

			<?= $page->text()->toBlocks() ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
