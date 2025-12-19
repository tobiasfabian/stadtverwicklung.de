<?php

use Kirby\Toolkit\Str;

 snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main>
		<div class=o-contact>
			<div class=o-contact__header>
				<div class=o-contact__header-text>
					<div class=m-text>
						<h1><?= $page->title() ?></h1>
						<?= $page->text() ?>
					</div>
				</div>
				<div class=o-contact__header-image>
					<?php snippet('image', [
						'image' => $page->headerImage()->toFile(),
						'sizes' => '(min-width: 66rem) 66rem, 100vw',
						'fetchpriority' => 'high',
					]) ?>
				</div>
			</div>
			<div class=o-contact__contact>
				<div>
					<h2 class=a-tag data-size=medium>Adresse</h2>
					<p class=m-text>
						<?= $page->address() ?>
					</p>
				</div>
				<div>
					<h2 class=a-tag data-size=medium>E-Mail</h2>
					<p class=m-text>
						<a href=<?= Str::encode($page->email()) ?>><?= Str::encode($page->email()) ?></a>
					</p>
				</div>
				<div>
					<h2 class=a-tag data-size=medium>Social Media</h2>
					<ul class=o-contact__social-media aria-label="Social Media">
						<?php foreach ($page->socialMedia()->toStructure() as $item): ?>
							<li>
								<a href=<?= $item->link() ?> title="<?= Str::kebabToCamel($item->plattform()) ?> ">
									<img src=<?= url('assets/images/icon-' . $item->plattform() . '.svg') ?> alt="<?= Str::kebabToCamel($item->plattform()) ?>" width=36 height=36 loading=lazy>
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
