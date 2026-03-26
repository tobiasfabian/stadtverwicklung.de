<?php
/** @var \Kirby\Cms\Page $page */

$events = null;

if ($page instanceof ProjectPage) {
	$events = $page->events();
} else {
	/** @var \Kirby\Cms\Pages */
	$events = collection('events');
}
$eventsUpcoming = $events->listed()->filter(function (EventPage $event) {
	return $event->isUpcoming() || $event->isTBA();
});
?>
<?php if ($eventsUpcoming->count() > 0): ?>
	<?php snippet('o-list-events', [
		'headline' => t('events.upcoming'),
		'events' => $eventsUpcoming,
		'buttonShowAll' => true,
	]) ?>
<?php endif ?>
