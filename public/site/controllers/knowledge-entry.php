<?php

use Kirby\Cms\Page;

return function (Page $page): array
{
	return [
		'prevPages' => $page->siblings(false)->filter(fn (Page $item) => $item->num() < $page->num())->flip()->limit(3)->flip(),
		'nextPages' => $page->siblings(false)->filter(fn (Page $item) => $item->num() > $page->num())->limit(3),
	];
};
