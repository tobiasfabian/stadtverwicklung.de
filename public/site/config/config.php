<?php

return [
	// Kirby options
	'languages' => true,
	'routes' => require __DIR__ . '/options/routes.php',
	'thumbs' => require __DIR__ . '/options/thumbs.php',
	'updates' => [
		'kirby' => 'security',
		'plugins' => [
			'site/*' => false,
			'tobiaswolf/hashed-url' => false,
		],
	],

	// Custom options
	'sitemap.ignoreTemplates' => ['error'],
	'blog.jsonUrl' => 'https://stadtverwicklung.de/de/blog.json',
];
