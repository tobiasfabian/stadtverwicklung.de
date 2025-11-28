<?php
/** @var ?string $headline */
/** @var \Kirby\Cms\Pages $events */

$headline = $headline ?? null;
?>
<div class=o-list-events>
	<?php if ($headline): ?>
		<h2 class=a-heading><?= $headline ?></h2>
	<?php endif ?>
	<ul>
		<?php foreach ($events->group('month', false) as $month => $group): ?>
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
								<span class=o-list-events__item-hours><?= $eventPage->multiDay() ? $eventPage->shortEndDate() : $eventPage->hours() ?></span>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</li>
		<?php endforeach ?>
	</ul>
</div>
