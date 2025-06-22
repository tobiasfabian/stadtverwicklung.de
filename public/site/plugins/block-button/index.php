<?php

Kirby::plugin('tobiaswolf/button-block', [
	'blueprints' => [
		'blocks/button' => __DIR__ . '/blueprints/blocks/button.yml',
	],
	'snippets' => [
		'blocks/button' => __DIR__ . '/snippets/blocks/button.php',
	],
]);
