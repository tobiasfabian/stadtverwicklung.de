<?php
/** @var \Kirby\Cms\Site $site */

use Kirby\Toolkit\Str;

?>
<footer class="o-footer">
	<div class="o-footer__newsletter">
		<div>
			<img src="<?= url('assets/images/illustration-newsletter.png') ?>" width="304" height="160" alt="">
			<div>
				<h2 class="a-heading"><?= $site->newsletterTitle() ?></h2>
				<p class="m-text"><?= $site->newsletterText() ?></p>
				<a class="a-button" data-kind="transparent" href="<?= $site->newsletterLink()->toObject()->url() ?>">
					<?= $site->newsletterLink()->toObject()->text() ?>
				</a>
			</div>
		</div>
	</div>
	<div class="o-footer__sitemap">
		<div>
			<address>
				<p>
					<?= $site->footerAddress() ?>
				</p>
				<div class="a-caption">© 2025 Stadtverwicklung gGmbH</div>
			</address>
			<nav aria-label="Footer">
				<div>
					<strong>Programm</strong>
					<ul aria-label="Programm">
						<?php foreach ($site->footerProgramm()->toPages() as $item): ?>
							<li>
								<a href="<?= $item->url() ?>"><?= $item->title() ?></a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				<div>
					<strong>Rechtliches</strong>
					<ul aria-label="Rechtliches">
						<?php foreach ($site->footerLegal()->toPages() as $item): ?>
							<li>
								<a href="<?= $item->url() ?>"><?= $item->title() ?></a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				<div>
					<ul class="o-footer__social-media" aria-label="Social Media">
						<?php foreach ($site->footerSocialMedia()->toStructure() as $item): ?>
							<li>
								<a href="<?= $item->link() ?>">
									<img src="<?= url('assets/images/icon-' . $item->plattform() . '.svg') ?>" alt="<?= Str::kebabToCamel($item->plattform()) ?>" width="24" height="24">
								</a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="o-footer__funding">
		<div>
			<ul>
				<?php foreach ($site->footerFundingIcons()->toStructure() as $item): ?>
					<?php if ($image = $item->image()->toFile()): ?>
						<li>
							<?php if ($link = $item->link()->toUrl()): ?>
								<a href="<?= $link ?>">
							<?php endif ?>
								<img src="<?= $image->url() ?>" alt="<?= $item->text() ?>" width="<?= (int)($item->height()->toFloat() * $image->ratio()) ?>" height="<?= $item->height() ?>">
							<?php if ($link = $item->link()->toUrl()): ?>
								</a>
							<?php endif ?>
						</li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
			<p>
				<?= $site->footerFundingText() ?>
			</p>
		</div>
	</div>
</footer>
