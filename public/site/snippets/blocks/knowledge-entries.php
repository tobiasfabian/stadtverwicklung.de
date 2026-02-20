<?php
/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */

$knowledgeEntries = null;
$limit = 4;

$knowledgeEntries = collection('knowledge-entries');

if ($page->template()->name() === 'knowledge-entry') {
	$knowledgeEntries = $knowledgeEntries->filter(fn ($knowledgeEntry) => $knowledgeEntry->id() !== $page->id());
}

/** @var \Kirby\Cms\Pages $knowledgeEntries */
$knowledgeEntries = $knowledgeEntries->shuffle()->limit($limit);
?>
<div class=m-info-list>
	<h2 class=a-heading><?= tc('knowledge-entry.more', $knowledgeEntries->count()) ?></h2>
	<ul>
		<?php foreach ($knowledgeEntries->limit($limit) as $knowledgeEntryPage): ?>
			<li>
				<a href=<?= $knowledgeEntryPage->url() ?>>
					<strong><?= $knowledgeEntryPage->title() ?> →</strong>
					<?= $knowledgeEntryPage->teaserText() ?>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
</div>
