<?php
return function (\Kirby\Cms\Site $site) {
	$eventsPage = $site->eventsPage();
	return $eventsPage->childrenAndDrafts();
};
