<?php
/** @var BlogEntryPage $page */
/** @var \Kirby\Cms\Pages $prevPages */
/** @var \Kirby\Cms\Pages $nextPages */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class="o-blocks">
			<header class="m-teaser-text">
				<a class="a-button-back" href="<?= $page->parent()->url() ?>">← Zurück zur Übersicht</a>
				<?php if ($prevPages->count() > 0): ?>
					<nav class="m-related-pages" aria-labelledby="vorherige-themen-ueberschrift">
						<strong class="a-heading" data-size="small" id="vorherige-themen-ueberschrift">Vorherige Themen</strong>
						<ul>
							<?php foreach ($prevPages as $item): ?>
								<li>
									<a href="<?= $item->url() ?>" class="a-button" data-size="small"><?= $item->title() ?></a>
								</li>
							<?php endforeach ?>
						</ul>
					</nav>
				<?php endif ?>
				<h1 class="a-heading"><?= $page->title() ?></h1>
			</header>

			<?= $page->text()->toBlocks() ?>

			<?php if ($nextPages->count() > 0): ?>
				<nav class="m-related-pages" aria-labelledby="naechste-themen-ueberschrift">
					<strong class="a-heading" data-size="small" id="naechste-themen-ueberschrift">Nächste Themen</strong>
					<ul>
						<?php foreach ($nextPages as $item): ?>
							<li>
								<a href="<?= $item->url() ?>" class="a-button" data-size="small"><?= $item->title() ?></a>
							</li>
						<?php endforeach ?>
					</ul>
				</nav>
			<?php endif ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
