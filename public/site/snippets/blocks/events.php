<?php
/** @var \Kirby\Cms\Page $page */

$events = null;
$limit = 4;

if ($page instanceof ProjectPage) {
	$events = $page->events();
} else {
	/** @var \Kirby\Cms\Pages */
	$events = collection('events');
	$limit = 4;
}
$eventsUpcoming = $events->filterBy('isUpcoming', '==', true);
?>
<?php if ($eventsUpcoming->count() > 0): ?>
	<?php snippet('o-list-events', [
		'headline' => t('events.upcoming'),
		'events' => $eventsUpcoming->listed()->limit($limit),
	]) ?>
<?php endif ?>
