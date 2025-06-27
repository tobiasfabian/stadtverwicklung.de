<?php

use Kirby\Cms\Page;

return function (\Kirby\Cms\Site $site) {
	/** @var Page $blogPage */
	$blogPage = $site->blogPage();
	return $blogPage->childrenAndDrafts()->sort(fn ($blogEntryPage) => $blogEntryPage->date()->toDate('Ymd'))->flip();
};
