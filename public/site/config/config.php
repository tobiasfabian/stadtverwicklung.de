<?php

return [
	// Kirby options
	'languages' => true,
	'locale' => 'de_DE.utf-8',
	'routes' => require __DIR__ . '/options/routes.php',
	'thumbs' => require __DIR__ . '/options/thumbs.php',
	'updates' => [
		'kirby' => 'security',
		'plugins' => [
			'site/*' => false,
			'tobiaswolf/*' => false,
		],
	],
	'cache' => [
		'pages' => [
			'active' => true,
			'type'   => 'static',
		],
	],

	'panel' => [
		'css' => 'assets/css/panel.css',
	],

	// Custom options
	'sitemap.ignoreTemplates' => ['error'],

	// Matomo plugin, other settings in env.php
	'sylvainjule.matomo.area.label' => 'Analytics'
];
