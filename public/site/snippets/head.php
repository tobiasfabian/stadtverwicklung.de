<?php

use Kirby\Cms\File;
use Kirby\Cms\Site;
use Kirby\Cms\Page;

/**
 * @var Site $site
 * @var Page $page
 * @var \Kirby\Cms\App $kirby
 */
$ogImage = $page->metaImage()->or($page->teaserImage())->toFile();
$ogImage = $ogImage ?? asset('assets/images/open-graph.jpg');
?>
<!doctype html>
<html lang=<?= $kirby->language()?->code() ?? 'de' ?>>
<head>
	<meta charset=utf-8>

	<title><?= $page->isHomePage() ? $site->title()->esc('attr') : $page->title()->esc('attr') . ' – ' . $site->title()->esc('attr') ?></title>

	<link rel=icon href=<?= url('favicon.ico') ?> sizes=32x32>
	<link rel=apple-touch-icon href=<?= url('apple-touch-icon.png') ?>>
	<link rel=manifest href=<?= url('site.webmanifest') ?>>

	<meta name=viewport content="width=device-width,initial-scale=1.0">
	<meta name=description content="<?= $page->metaDescription()->or(strip_tags($page->teaserText()))->esc('attr') ?>">
	<meta property=og:title content="<?= $page->title()->esc('attr') ?>">
	<meta property=og:site_name content="<?= $site->title()->esc('attr') ?>">
	<?php if ($ogImage): ?>
		<meta property=og:image content=<?= $ogImage->thumb('og-image')->url() ?>>
		<?php if ($ogImage instanceof File): ?>
			<meta property=og:image:alt content="<?= $ogImage->alt()->esc('attr') ?>">
		<?php endif ?>
		<meta property=og:image:type content=<?= $ogImage->mime() ?>>
		<meta property=og:image:width content=1200>
		<meta property=og:image:height content=628>
	<?php endif ?>

	<link rel=canonical href=<?= $page->url($page->translation()->exists() ? null : (string)$kirby->defaultLanguage()) ?>>
	<link rel=stylesheet href=<?= hashedUrl('assets/css/index.css') ?>>
	<script src=<?= hashedUrl('assets/js/index.js') ?> defer type=module></script>
</head>
