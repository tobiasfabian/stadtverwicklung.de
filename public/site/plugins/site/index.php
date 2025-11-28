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
			'projectsPage' => function () {
				return page('page://5qmbi5bf5dkeu3u3');
			},
			'blogPage' => function () {
				return page('page://ts0jgzbgmzzyfri3');
			},
			'contactPage' => function () {
				return page('page://fmn7z0n40ortaweq');
			},
			'eventsPage' => function () {
				return page('page://jzxp27b1ir0rlrsc');
			},
			'privacyPage' => function () {
				return page('page://zfim59xjmzmmta8d');
			},
		],
	],
);

