<?php
/** @var \Kirby\Cms\Page $page */

$events = null;
$eventsPast = null;
$limit = null;

if ($page instanceof ProjectPage) {
	$events = $page->events();
	$eventsPast = $events->filterBy('isUpcoming', '==', false);
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

<?php if ($page instanceof ProjectPage && $eventsPast->count() > 0): ?>
	<?php snippet('o-list-events', [
		'headline' => t('events.past'),
		'events' => $eventsPast,
	]) ?>
<?php endif ?>
