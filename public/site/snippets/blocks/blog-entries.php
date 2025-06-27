<?php snippet('o-list-blog', [
	'headline' => 'Neuigkeiten',
	'entries' => collection('blog-entries')->listed()->limit(3),
	'showMore' => true,
]) ?>
