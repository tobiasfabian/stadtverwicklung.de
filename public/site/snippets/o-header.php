<?php
/** @var \Kirby\Cms\Site $site */
?>
<header class="o-header">
	<strong class="o-header__logo">
		<a href="<?= $site->url() ?>">
			<img src="<?= url('assets/images/svw-logo.svg') ?>" alt="Stadtverwicklung Logo" width="206" height="80">
		</a>
	</strong>
	<em class="o-header__title">
		Gemeinsam<br>
		Gemeinwohl
	</em>

	<?php snippet('m-nav-primary') ?>
</header>

