<?php

use Kirby\Toolkit\Str;

/** @var \Kirby\Cms\Site $site */
?>
<footer class=o-footer>
	<div class=o-footer__newsletter>
		<div>
			<img src=<?= url('assets/images/illustration-newsletter.webp') ?> width=304 height=160 alt="">
			<div>
				<h2 class=a-heading><?= $site->newsletterTitle() ?></h2>
				<p class=m-text><?= $site->newsletterText() ?></p>
				<a class=a-button data-kind=transparent href=<?= $site->newsletterLink()->toObject()->link() ?> target=_blank>
					<?= $site->newsletterLink()->toObject()->text() ?>
				</a>
			</div>
		</div>
	</div>
	<div class=o-footer__sitemap>
		<div>
			<address>
				<p>
					<?= $site->contactPage()->address() ?>
					<?php if ($site->contactPage()->email()->isNotEmpty()): ?>
						<br>
						<a href="<?= Str::encode($site->contactPage()->email()) ?>"><?= Str::encode($site->contactPage()->email()) ?></a>
					<?php endif ?>
				</p>
				<div class=a-caption>© 2025 Stadtverwicklung gGmbH</div>
			</address>
			<nav aria-label="Footer">
				<div class=o-footer__nav-category>
					<strong>Programm</strong>
					<ul aria-label="Programm">
						<?php foreach ($site->footerProgramm()->toPages() as $item): ?>
							<li>
								<a href=<?= $item->url() ?>><?= $item->title() ?></a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				<div class=o-footer__nav-category>
					<strong>Rechtliches</strong>
					<ul aria-label="Rechtliches">
						<?php foreach ($site->footerLegal()->toPages() as $item): ?>
							<li>
								<a href=<?= $item->url() ?>><?= $item->title() ?></a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				<div class=o-footer__social-media>
					<ul aria-label="Social Media">
						<?php foreach ($site->contactPage()->socialMedia()->toStructure() as $item): ?>
							<li>
								<a href=<?= $item->link() ?> title="<?= Str::kebabToCamel($item->plattform()) ?> ">
									<img src=<?= url('assets/images/icon-' . $item->plattform() . '.svg') ?> alt="<?= Str::kebabToCamel($item->plattform()) ?>" width="36" height="36">
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class=o-footer__funding>
		<div>
			<?php snippet('image', [
				'image' => $site->footerFundingLogo()->toFile(),
				'loading' => 'lazy',
			]) ?>
			<?php snippet('m-list-logos', ['logos' => $site->footerFundingLogos()->toStructure()]) ?>
		</div>
	</div>
</footer>
