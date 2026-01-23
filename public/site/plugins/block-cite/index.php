<?php

use Kirby\Cms\App;

App::plugin('tobiaswolf/cite-block', [
	'blueprints' => [
		'blocks/cite' => __DIR__ . '/blueprints/blocks/cite.yml',
	],
	'snippets' => [
		'blocks/cite' => __DIR__ . '/snippets/blocks/cite.php',
	],
]);
