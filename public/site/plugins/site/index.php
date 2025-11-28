<?php

use Kirby\Cms\App;

App::plugin(
	name: 'site/site',
	info: [
		'authors' => [
			[
				'name' => 'Tobias Wolf',
			],
		],
	],
	license: '©',
	version: '2025-06',
	extends: [
		'siteMethods' => [
			'projectsPage' => fn () => page('page://5qmbi5bf5dkeu3u3'),
			'blogPage' => fn () => page('page://ts0jgzbgmzzyfri3'),
			'contactPage' => fn () => page('page://fmn7z0n40ortaweq'),
			'servicesPage' => fn () => page('page://yl6un2fzajxokg6b'),
			'eventsPage' => fn () => page('page://jzxp27b1ir0rlrsc'),
			'privacyPage' => fn () => page('page://zfim59xjmzmmta8d'),
		],
	],
);

