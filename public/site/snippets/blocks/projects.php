<?php
/** @var Kirby\Cms\Page $page */
/** @var Kirby\Cms\Site $site */

	/** @var \Kirby\Cms\Pages */
$projects = collection('projects')->listed();
$limit = 3;

if ($page->parent() === $site->servicesPage()) {
	$uuid = $page->uuid();
	$projects = $projects->filter(function (ProjectPage $projectPage) use ($uuid) {
		return in_array($uuid, $projectPage->servicePagesUuids());
	});
}
$projects = $projects->limit($limit);
?>
<div class=m-grid>
	<h2 class=a-heading><?= tc('project', $projects->count()) ?></h2>
	<ul>
		<?php foreach ($projects as $projectPage): ?>
			<li class=m-grid__item>
				<a href=<?= $projectPage->url() ?>>
					<?php snippet('image', [
						'image' => $projectPage->teaserImage()->toFile(),
						'srcset' => 'card',
						'loading' => 'lazy',
					]) ?>
					<h3><?= $projectPage->title() ?> →</h3>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
	<?php if ($page->parent() !== $site->servicesPage()): ?>
		<div class=m-stack data-justify=center>
			<a class=a-button href=<?= $site->projectsPage()->url() ?>>
				Alle Projekte
			</a>
		</div>
	<?php endif ?>
</div>
