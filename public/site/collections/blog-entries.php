<?php
return function (\Kirby\Cms\Site $site) {
	return $site->blogPage()->childrenAndDrafts()->sort(fn ($blogEntryPage) => $blogEntryPage->date()->toDate('Ymd'))->flip();
};
