<?php

use Kirby\Cms\Page;

return function (\Kirby\Cms\Site $site) {
	/** @var Page $eventsPage */
	$eventsPage = $site->eventsPage();
	return $eventsPage->childrenAndDrafts();
};
