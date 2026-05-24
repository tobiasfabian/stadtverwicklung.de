<?php
/** @var \Kirby\Cms\Page $page */

use Kirby\Toolkit\Str;

$children = $page->children()->listed();
$itemsWithoutCategory = $children->filterBy('category', null);
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class=o-blocks>
			<?php snippet('m-teaser') ?>
			<?php foreach ($page->categories()->toBlocks() as $category): ?>
				<?php
					$items = $children->filterBy('categoryId', $category->id());
					if ($items->count() === 0) continue;
					$headline = $page->kirby()->languageCode() === 'en' ? $category->headlineEn()->or($category->headline()) : $category->headline();
				?>
				<div class=m-grid>
					<h2 class="a-heading" id="<?= Str::slug($headline) ?>"><?= $headline ?></h2>
					<ul>
						<?php foreach ($items as $knowledgePage): ?>
							<?php /** @var KnowledgeEntryPage|\Kirby\Cms\Page $knowledgePage */ ?>
							<li class=m-grid__item>
								<a href=<?= $knowledgePage->url() ?>>
									<?php snippet('image', [
										'image' => $knowledgePage->teaserImage()->toFile(),
										'srcset' => 'card',
										'loading' => 'lazy',
									]) ?>
									<h3><?= $knowledgePage->title() ?> →</h3>
									<p><?= $knowledgePage->teaserText() ?></p>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			<?php endforeach ?>
			<?php if ($itemsWithoutCategory->count() > 0): ?>
				<div class=m-grid>
					<ul>
						<?php foreach ($itemsWithoutCategory as $knowledgePage): ?>
							<?php /** @var KnowledgeEntryPage|\Kirby\Cms\Page $knowledgePage */ ?>
							<li class=m-grid__item>
								<a href=<?= $knowledgePage->url() ?>>
									<?php snippet('image', [
										'image' => $knowledgePage->teaserImage()->toFile(),
										'srcset' => 'card',
										'loading' => 'lazy',
									]) ?>
									<h3><?= $knowledgePage->title() ?> →</h3>
									<p><?= $knowledgePage->teaserText() ?></p>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			<?php endif ?>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
