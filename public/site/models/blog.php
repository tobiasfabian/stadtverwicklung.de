<?php

use Kirby\Content\Field;
use Kirby\Cms\Page;
use Kirby\Cms\Pages;
use Kirby\Exception\Exception;
use Kirby\Http\Remote;
use Kirby\Toolkit\A;

/**
 * @method Field metaDescription()
 */
class BlogPage extends Page {
	public function children(): Pages
	{
		try {
			$pages = new Pages();
			$remote = Remote::get(option('blog.jsonUrl'));
			$items = $remote->json(true);
			$items = A::filter($items, fn ($item) => in_array('gemeinwohl', $item['channels']));
			foreach ($items as $item) {
				$pages->add(new Page([
					'parent' => $this,
					'num' => $item['num'],
					'slug' => $item['slug'],
					'template' => 'blog-entry',
					'content' => [
						'title' => $item['title'],
						'date' => $item['date'],
						'teaserImage' => (array)$item['teaserImage'],
						'text' => $item['text'],
					],
				]));
			}
		} catch (Throwable $exception) {
			throw new Exception(fallback: 'Error fetching blog entries from remote', previous: $exception);
		}
		return $pages;
	}
}
