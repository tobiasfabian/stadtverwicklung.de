<?php

use Kirby\Cms\Page;
use Kirby\Cms\Pages;

class ProjectPage extends Page
{
	public function events(): Pages
	{
		$uuid = (string)$this->uuid();
		return collection('events')->filter(function (EventPage $event) use ($uuid) {
			return in_array($uuid, $event->projectsUuids());
		});
	}

	public function servicePagesUuids(): array
	{
		return $this->servicePages()->yaml();
	}
}
