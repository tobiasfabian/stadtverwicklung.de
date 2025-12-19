<?php

// Ratios available e.g. in image and gallery block
$crops = [
	'default' => null,
	'9/16' => 9/16,
	'10/16' => 10/16,
	'2/3' => 2/3,
	'4/5' => 4/5,
	'1/1' => 1/1,
	'5/4' => 5/4,
	'3/2' => 3/2,
	'16/10' => 16/10,
	'16/9' => 16/9,
];

$presets = [];
$srcsets = [];

foreach ($crops as $key => $value) {
	// Define presets
	$presets[$key] = [
		'width' => 2048,
		'height' => $value === null ? null : round(2048 / $value),
		'crop' => $value === null ? false : true,
		'quality' => 80,
	];

	// Define srcsets
	$srcsets[$key] = [
		// Moto G Power (Page Speed Test)
		'412w' => [
			'width' => 412,
			'height' => $value === null ? null : round(376 / $value),
			'crop' => $value === null ? false : true,
			'format' => 'webp',
		],
		'824w' => [
			'width' => 824,
			'height' => $value === null ? null : round(824 / $value),
			'crop' => $value === null ? false : true,
			'format' => 'webp',
		],
		'1024w' => [
			'width' => 1080,
			'height' => $value === null ? null : round(1080 / $value),
			'crop' => $value === null ? false : true,
			'format' => 'webp',
		],
		'1236w' => [
			'width' => 1236,
			'height' => $value === null ? null : round(1236 / $value),
			'crop' => $value === null ? false : true,
			'format' => 'webp',
		],
		'1440w' => [
			'width' => 1440,
			'height' => $value === null ? null : round(1440 / $value),
			'crop' => $value === null ? false : true,
			'format' => 'webp',
		],
		'2048w' => [
			'width' => 2048,
			'height' => $value === null ? null : round(2048 / $value),
			'crop' => $value === null ? false : true,
			'quality' => 70,
			'format' => 'webp',
		],
	];
}

return [
	'quality' => 80,
	'interlace' => true,
	'presets' => [...$presets,
		'og-image'=> [
			'width' => 1200,
			'height' => 630,
			'crop' => true,
		],
		'm-teaser-start'=> [
			'width' => 1600,
			'height' => 640,
			'crop' => true,
		],
		'card'=> [
			'width' => 352,
			'height' => 236,
			'crop' => true,
		],
		'short-introduction' => [
			'width' => 336,
			'height' => 256,
			'crop' => true,
		],
	],
	'srcsets' => [...$srcsets,
		'og-image'=> [
			'1200w' => [
				'width' => 1200,
				'height' => 628,
				'crop' => true,
			],
		],
		'm-teaser-start'=> [
			'3200w' => [
				'width' => 1600 * 2,
				'height' => 640 * 2,
				'crop' => true,
			],
			'1600w' => [
				'width' => 1600,
				'height' => 640,
				'crop' => true,
			],
			'800w' => [
				'width' => 800,
				'height' => 320,
				'crop' => true,
			],
		],
		'card' => [
			'352w' => [
				'width' => 352,
				'height' => 236,
				'crop' => true,
			],
			'704w' => [
				'width' => 352 * 2,
				'height' => 236 * 2,
				'crop' => true,
				'quality' => 70,
			],
		],
		'short-introduction' => [
			'352w' => [
				'width' => 352,
				'height' => 256,
				'crop' => true,
			],
			'704w' => [
				'width' => 352 * 2,
				'height' => 256 * 2,
				'crop' => true,
				'quality' => 70,
			],
		],
	],
];
