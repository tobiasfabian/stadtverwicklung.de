<?php snippet('o-list-events', [
	'headline' => 'Bevorstehende Veranstaltungen',
	'events' => collection('events-upcoming')->listed()->limit(4),
]) ?>
