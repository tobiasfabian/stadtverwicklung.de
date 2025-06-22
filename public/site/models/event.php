<?php

use Kirby\Content\Field;
use Kirby\Cms\Page;
use Kirby\Toolkit\A;
use Kirby\Toolkit\Str;

/**
 * @method Field subtitle()
 * @method Field startDate()
 * @method Field endDate()
 * @method Field status()
 * @method Field attendanceMode()
 * @method Field location()
 * @method Field virtualLocation()
 * @method Field text()
 * @method Field registrationLink()
 * @method Field teaserImage()
 */
class EventPage extends Page {
	public function isUpcoming(): bool
	{
		if ($this->endDate()->isEmpty()) {
			return $this->startDate()->toDate() > time();
		}
		return $this->endDate()->toDate() > time();
	}

	public function city(): string
	{
		return $this->location()->toObject()->city()->value();
	}

	/**
	 * @return string Online or [City]
	 */
	public function tag(): string
	{
		return $this->attendanceMode()->value() === 'OnlineEventAttendanceMode'
			? 'online'
			: $this->city();
	}

	public function dateFull(): string
	{
		$formatter = new IntlDateFormatter(
			locale: 'de_DE',
			pattern: 'dd. MMMM y',
		);
		return $formatter->format($this->startDate()->toDate());
	}

	public function dayShort(): string
	{
		$formatter = new IntlDateFormatter(
			locale: 'de_DE',
			pattern: 'ccc',
		);
		return $formatter->format($this->startDate()->toDate());
	}

	/**
	 * @return string Month including year
	 */
	public function month(): string
	{
		$formatter = new IntlDateFormatter(
			locale: 'de_DE',
			pattern: 'MMMM y',
		);
		return $formatter->format($this->startDate()->toDate());
	}

	public function hours(): string
	{
		$formatter = new IntlDateFormatter(
			locale: 'de_DE',
			pattern: 'HH:mm',
		);
		if ($this->endDate()->isEmpty()) {
			return 'ab ' . $formatter->format($this->startDate()->toDate());
		}
		return $formatter->format($this->startDate()->toDate()) . ' – ' . $formatter->format($this->endDate()->toDate());
	}

	public function addressFull(): string
	{
		$location = $this->location()->toObject();
		$items = [];
		if ($location->name()->isNotEmpty()) {
			$items[] = $location->name();
		}
		if ($location->streetAddress()->isNotEmpty()) {
			$items[] = $location->streetAddress();
		}
		if ($location->postalCode()->isNotEmpty() || $location->city()->isNotEmpty()) {
			$items[] = Str::trim($location->postalCode() . ' ' . $location->city());
		}
		if ($location->country()->isNotEmpty() && $location->country()->value() !== 'DE') {
			$items[] = $location->country();
		}
		return A::implode($items, ', ');
	}
}
