<?php
/** @var ?string $headline */
/** @var \Kirby\Cms\Pages $entries */

$headline = $headline ?? null;
$showMore = $showMore ?? null;
?>
<div class="m-bricks">
	<?php if ($headline): ?>
		<h2 class="a-heading"><?= $headline ?></h2>
	<?php endif ?>
	<ul>
		<?php foreach ($entries as $blogEntryPage): ?>
			<?php /** @var BlogEntryPage|\Kirby\Cms\Page $blogEntryPage */ ?>
			<li>
				<a href="<?= $blogEntryPage->url() ?>">
					<img <?= attr([
						'src' => $blogEntryPage->teaserImage()->toObject()->src(),
						'srcset' => $blogEntryPage->teaserImage()->toObject()->srcset(),
						'width' => $blogEntryPage->teaserImage()->toObject()->width(),
						'height' => $blogEntryPage->teaserImage()->toObject()->height(),
						'alt' => $blogEntryPage->teaserImage()->toObject()->alt(),
						'sizes' => 336 / 16 . 'rem',
					]) ?>>
					<time datetime="<?= $blogEntryPage->date()->toDate('c') ?>"><?= $blogEntryPage->date()->toDate('d.m.Y') ?></time>
					<h3><?= $blogEntryPage->title() ?></h3>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
	<?php if ($showMore): ?>
		<div class="m-stack" data-justify="center">
			<a class="a-button" href="<?= $site->blogPage()->url() ?>">
				Alle Artikel
			</a>
		</div>
	<?php endif ?>
</div>
