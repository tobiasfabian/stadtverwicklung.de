<?php
/** @var ?string $headline */
/** @var \Kirby\Cms\Pages $events */

$headline = $headline ?? null;
$eventsTBA = $events->filterBy('isTBA', '==', true);
$buttonShowAll = $buttonShowAll ?? null;
$countGroups = 0;
?>
<div class=o-list-events <?= attr(['data-show-all' => $buttonShowAll ? 'false' : null]) ?>>
	<?php if ($headline): ?>
		<h2 class=a-heading><?= $headline ?></h2>
	<?php endif ?>
	<ul>
		<?php foreach ($events->filterBy('isUpcoming', '==', true)->group('month', false) as $month => $group): ?>
			<?php $countGroups += 1 ?>
			<li>
				<h3><?= $month ?></h3>
				<ul>
					<?php foreach ($group as $eventPage): ?>
						<?php /** @var EventPage $eventPage */ ?>
						<li>
							<a class=o-list-events__item href=<?= $eventPage->url() ?>>
								<span class=o-list-events__item-start-date><?= $eventPage->startDate()->toDate('d.') ?></span>
								<span class=o-list-events__item-day-short><?= $eventPage->dayShort() ?></span>
								<strong class=o-list-events__item-title>
									<?= $eventPage->title() ?>
									<?php if ($eventPage->subtitle()->isNotEmpty()): ?>
										<small><?= $eventPage->subtitle() ?></small>
									<?php endif ?>
								</strong>
								<span class=o-list-events__item-location>
									<span class=a-tag><?= $eventPage->tag() ?></span>
								</span>
								<span class=o-list-events__item-hours><?= $eventPage->multiDay() ? kti($eventPage->fromToDate()) : $eventPage->hours() ?></span>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</li>
		<?php endforeach ?>
		<?php if ($eventsTBA->count() > 0): ?>
			<?php $countGroups += 1 ?>
			<li>
				<h3>
					<?= t('events.tba.heading') ?>
					<small><?= t('events.tba.subheading') ?></small>
				</h3>
				<ul>
					<?php foreach ($eventsTBA as $eventPage): ?>
						<?php /** @var EventPage $eventPage */ ?>
						<li>
							<a class=o-list-events__item data-variant="tba" href=<?= $eventPage->url() ?>>
								<strong class=o-list-events__item-title>
									<?= $eventPage->title() ?>
									<?php if ($eventPage->subtitle()->isNotEmpty()): ?>
										<small><?= $eventPage->subtitle() ?></small>
									<?php endif ?>
								</strong>
								<span class=o-list-events__item-location>
									<span class=a-tag><?= $eventPage->tag() ?></span>
								</span>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</li>
		<?php endif ?>
	</ul>
	<?php if ($buttonShowAll === true && $countGroups > 2): ?>
		<button class="a-button" data-action="show-all" data-alternative-text="<?= t('events.button.hide-all') ?>"><?= t('events.button.show-all') ?></button>
	<?php endif ?>
</div>
