<?php
return function (\Kirby\Cms\Site $site) {
	return $site->eventsPage()->childrenAndDrafts();
};
