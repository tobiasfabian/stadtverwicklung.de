<?php

/** @var EventPage $page */

// header('Content-Type: text/calendar; charset=utf-8');
header('Content-Type: text/plain; charset=utf-8');
// header('Content-Disposition: attachment; filename='. Str::slug($page->fullTitle()) .'.ics');

$title = $page->title();
if ($page->subtitle()->isNotEmpty()) {
  $title .= ' – ' . $page->subtitle();
}

$location = null;
if ($page->attendanceMode()->value() === 'OfflineEventAttendanceMode') {
	if ($page->location()->isNotEmpty()) {
		$location = $page->location()->toObject()->name() . '\n' . $page->location()->toObject()->streetAddress() . '\n' . $page->location()->toObject()->postalCode() . ' ' . $page->location()->toObject()->city() . '\n' . $page->location()->toObject()->country();
	}
}
if ($page->attendanceMode()->value() === 'OnlineEventAttendanceMode') {
	$location = $page->virtualLocation();
}

$endDate = $page->endDate();
if ($page->endDate()->isEmpty()) {
  $endDate = date('c', $page->startDate()->toDate() + 60 * 60);
}

$ics = new ICS(array(
  'location' => $location,
  'dtstart' => $page->startDate(),
  'dtend' => $endDate,
  'summary' => $title,
  'url' => $page->url(),
  'dtstamp' => $page->modified('c'),
));
$ics->set('uid', $page->permalink());

echo $ics->to_string();
