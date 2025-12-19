<?php
/** @var ?string $headline */
/** @var \Kirby\Cms\Pages $entries */

$headline = $headline ?? null;
$showMore = $showMore ?? null;
?>
<div class=m-grid>
	<?php if ($headline): ?>
		<h2 class=a-heading><?= $headline ?></h2>
	<?php endif ?>
	<ul>
		<?php foreach ($entries as $blogEntryPage): ?>
			<li class=m-grid__item>
				<a href=<?= $blogEntryPage->url() ?>>
					<?php snippet('image', [
						'image' => $blogEntryPage->teaserImage()->toFile(),
						'srcset' => 'card',
						'loading' => $page instanceof BlogPage && $blogEntryPage->indexOf($entries) <= 4 ? null : 'lazy',
					]) ?>
					<div>
						<time datetime="<?= $blogEntryPage->date()->toDate('c') ?>"><?= $blogEntryPage->date()->toDate('d.m.Y') ?></time>
						<?php foreach ($blogEntryPage->tags()->split() as $tag): ?>
							<em>#<?= $tag ?></em>
						<?php endforeach ?>
					</div>
					<h3><?= $blogEntryPage->title() ?></h3>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
	<?php if ($showMore): ?>
		<div class=m-stack data-justify=center>
			<a class=a-button href=<?= $site->blogPage()->url() ?>>
				Alle Artikel
			</a>
		</div>
	<?php endif ?>
</div>
