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
 * @method Field projects()
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

	public function city(): ?string
	{
		return $this->location()->toObject()->city()->value();
	}

	/**
	 * @return string Online or [City]
	 */
	public function tag(): ?string
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

	public function dateTimeFull($useEndDate = false): string
	{
		$dateField = $useEndDate ? $this->endDate() : $this->startDate();
		$pattern = 'dd. MMMM y';
		if ($dateField->toDate('Hi') !== '0000') {
			$pattern .= ', HH:mm';
		}
		$formatter = new IntlDateFormatter(
			locale: 'de_DE',
			pattern: $pattern,
		);
		return $formatter->format($dateField->toDate());
	}

	public function dateTimeFullEnd(): string
	{
		$formatter = new IntlDateFormatter(
			locale: 'de_DE',
			pattern: 'dd. MMMM y HH:mm',
		);
		return $formatter->format($this->endDate()->toDate());
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

	public function shortEndDate(): string
	{
		$formatter = new IntlDateFormatter(
			locale: 'de_DE',
			pattern: 'dd.MM.y',
		);
		return 'bis ' . $formatter->format($this->endDate()->toDate());;
	}

	public function multiDay(): bool
	{
		if ($this->endDate()->isEmpty()) return false;
		return $this->startDate()->toDate('Ymd') !== $this->endDate()->toDate('Ymd');
	}

	/**
	 * @return string|null
	 * e.g. ab 11:00
	 * null, when start and end date are differnt days
	 */
	public function hours(): ?string
	{
		$formatter = new IntlDateFormatter(
			locale: 'de_DE',
			pattern: 'HH:mm',
		);
		if ($this->endDate()->isEmpty()) {
			return 'ab ' . $formatter->format($this->startDate()->toDate());
		}

		$startHour = $formatter->format($this->startDate()->toDate());
		$endHour = $formatter->format($this->endDate()->toDate());

		return $startHour . ' – ' . $endHour;
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

	public function projectsUuids(): array
	{
		return $this->projects()->yaml();
	}
}
