<?php
/** @var \Kirby\Cms\Page $page */
use Kirby\Toolkit\Str;
?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class=o-blocks>
			<?php snippet('m-teaser') ?>
			<div class=m-grid>
				<h2 class=a-heading><?= t('projects.current') ?></h2>
				<ul>
					<?php foreach (collection('projects')->listed() as $projectPage): ?>
						<?php /** @var ProjectPage|\Kirby\Cms\Page $projectPage */ ?>
						<li class=m-grid__item>
							<a href=<?= $projectPage->url() ?>>
								<?php snippet('image', [
									'image' => $projectPage->teaserImage()->toFile(),
									'srcset' => 'card',
								]); ?>
								<h3><?= $projectPage->title() ?> →</h3>
								<?php if ($projectPage->teaserText()->isNotEmpty()): ?>
									<p><?= $projectPage->teaserText() ?></p>
								<?php endif ?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			<div class=m-grid>
				<h2 class=a-heading id=<?= Str::slug(t('projects.completed')) ?>><?= t('projects.completed') ?></h2>
				<ul>
					<?php foreach (collection('projects')->unlisted() as $projectPage): ?>
						<?php /** @var ProjectPage|\Kirby\Cms\Page $projectPage */ ?>
						<li class=m-grid__item>
							<a href=<?= $projectPage->url() ?>>
								<?php snippet('image', [
									'image' => $projectPage->teaserImage()->toFile(),
									'srcset' => 'card',
								]); ?>
								<h3><?= $projectPage->title() ?> →</h3>
								<?php if ($projectPage->teaserText()->isNotEmpty()): ?>
									<p><?= $projectPage->teaserText() ?></p>
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
