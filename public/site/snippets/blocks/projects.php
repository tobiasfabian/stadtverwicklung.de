<?php
/** @var \Kirby\Cms\Page $page */
/** @var \Kirby\Cms\Site $site */

$projects = null;
$limit = 3;

if ($page->parent() === $site->servicesPage()) {
	$uuid = $page->uuid();
	$projects = collection('projects')->filter(function (ProjectPage $projectPage) use ($uuid) {
		return in_array($uuid, $projectPage->servicePagesUuids());
	});
} else {
	/** @var \Kirby\Cms\Pages */
	$projects = collection('projects');
}
$projects = $projects->sortBy('startDate', 'desc')->limit($limit);
?>
<div class=m-grid>
	<h2 class=a-heading><?= tc('project', $projects->count()) ?></h2>
	<ul>
		<?php foreach ($projects->limit($limit) as $projectPage): ?>
			<li class=m-grid__item>
				<a href=<?= $projectPage->url() ?>>
					<?php snippet('image', [
						'image' => $projectPage->teaserImage()->toFile(),
						'srcset' => '3/2',
						'sizes' => 336 / 16 . 'rem',
					]) ?>
					<h3><?= $projectPage->title() ?></h3>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
</div>
