<?php
return function (\Kirby\Cms\Site $site) {
	return $site->projectsPage()->childrenAndDrafts();
};
