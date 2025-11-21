<?php
/** @var BlogEntryPage $page */
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class="o-blocks" data-variant="blog-entry">
			<a class="a-button-back" href="<?= $page->parent()->url() ?>">← Zurück zur Übersicht</a>

			<header class="m-teaser-text">
				<time datetime="<?= $page->date()->toDate('c') ?>">
					<?= $page->date()->toDate('d.m.Y') ?>
				</time>
				<nav>
					<strong>Vorherige Themen</strong>
					<ul>

					</ul>
				</nav>
				<h1 class="a-heading"><?= $page->title() ?></h1>
			</header>

			<?= $page->text()->toBlocks() ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
