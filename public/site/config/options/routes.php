<?php

return [
	[
		'pattern' => 'media/pages/programme',
		'action' => function($all) {
			go('media/pages/projekte/' . $all, 301);
		}
	],
	[
		'pattern' => 'de(:all)',
		'action' => function($all) {
			go($all, 301);
		}
	],
	[
		'pattern' => 'programme(:all)',
		'action' => function($all) {
			go('projekte' . $all, 301);
		}
	],
	[
		'pattern' => 'uber-uns(:all)',
		'action' => function($all) {
			go('ueber-uns' . $all, 301);
		}
	],
	[
		'pattern' => 'en/uber-uns(:all)',
		'action' => function($all) {
			go('en/ueber-uns' . $all, 301);
		}
	],
	[
		'pattern' => 'leistungen/fur-kommunen',
		'action' => function() {
			go('leistungen/fuer-kommunen', 301);
		}
	],
	[
		'pattern' => 'leistungen/fur-initiativen',
		'action' => function() {
			go('leistungen/fuer-initiativen', 301);
		}
	],
	[
		'pattern' => 'leistungen/fur-private-tragerschaften',
		'action' => function() {
			go('leistungen/fuer-private-traegerschaften', 301);
		}
	],
	[
		'pattern' => 'site.webmanifest',
		'action' => function() {
			$content = snippet('manifest', ['site' => site()], true);
			return new Kirby\Cms\Response($content, 'application/manifest+json');
		},
	],
	[
		'pattern' => 'robots.txt',
		'action' => function() {
			$content = snippet('robots', ['kirby' => kirby()], true);
			return new Kirby\Cms\Response($content, 'text/plain');
		},
	],
	[
		'pattern' => 'sitemap.xml',
		'language' => '*', // allow sitemap for each language
		'action'  => function() {
			$content = snippet('sitemap', ['site' => site()], true);
			return new Kirby\Cms\Response($content, 'application/xml');
		},
	],
];
