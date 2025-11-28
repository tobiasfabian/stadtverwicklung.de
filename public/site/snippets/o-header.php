<?php
/** @var \Kirby\Cms\Site $site */
?>
<header class=o-header>
	<div>
		<strong class=o-header__logo>
			<a href=<?= $site->url() ?>>
				<img src=<?= url('assets/images/svw-logo.svg') ?> alt="Stadtverwicklung Logo" width=206 height=80>
			</a>
		</strong>

		<?php snippet('m-nav-primary') ?>
	</div>
</header>

