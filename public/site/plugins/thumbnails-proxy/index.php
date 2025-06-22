<?php

use Kirby\Cms\App;
use Kirby\Cms\Response;
use Kirby\Filesystem\F;
use Kirby\Http\Remote;

load([
	'ProxyCache' => __DIR__ . '/src/ProxyCache.php'
]);

App::plugin('tobiaswolf/thumbnails-proxy', [
	'options' => [
		'cache.images' => [
			'active' => true,
			'type' => 'proxycache',
		],
	],
	'cacheTypes' => [
		'proxycache' => 'ProxyCache',
	],
	'routes' => [
		[
			'pattern' => 'youtube-thumbnail/remove/(:any)',
			'action'  => function ($any) {
				$responsesCache = kirby()->cache('tobiaswolf.thumbnails-proxy.images');
				$responsesCache->remove($any);
				return [
					'status' => 'ok',
					'message' => 'Image “' . $any . '” removed from cache.',
				];
			},
		],
		[
			'pattern' => 'youtube-thumbnail/(:any)',
			'action'  => function ($any) {
				$responsesCache = kirby()->cache('tobiaswolf.thumbnails-proxy.images');
				$start = microtime(true);
				$response = $responsesCache->get($any);

				if ($response !== null) {
					header('Server-Timing: kirbyCache;desc="Kirby Cache";dur=' .  round((microtime(true) - $start) * 1000));
				} else {
					$start = microtime(true);
					$remote = Remote::get('https://i.ytimg.com/vi/' . $any .  '/maxresdefault.jpg');
					$response = $remote->content();
					header('Server-Timing: youTube;desc="YouTube";dur=' .  round((microtime(true) - $start) * 1000));

					// cache response
					$responsesCache->set($any, $response);
				}

				return new Response([
					'body' => $response,
					'type' => 'image/jpeg',
				]);

			 }
		],
	]
]);
