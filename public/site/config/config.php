<?php

return [
	'locale' => 'de_DE.utf-8',
	'routes' => require __DIR__ . '/options/routes.php',
	'sitemap.ignoreTemplates' => ['error'],
	'updates' => [
		'kirby' => 'security',
		'plugins' => [
			'site/*' => false,
			'tobiaswolf/hashed-url' => false,
		],
	],
];
