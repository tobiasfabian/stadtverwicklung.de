<?php
/** @var ?string $headline */
/** @var \Kirby\Cms\Pages $events */

$headline = $headline ?? null;
?>
<div class="o-list-events">
	<?php if ($headline): ?>
		<h2 class="a-heading"><?= $headline ?></h2>
	<?php endif ?>
	<ul>
		<?php foreach ($events->group('month', false) as $month => $group): ?>
			<li>
				<h3><?= $month ?></h3>
				<ul>
					<?php foreach ($group as $eventPage): ?>
						<?php /** @var EventPage $eventPage */ ?>
						<li>
							<a class="o-list-events__item" href="<?= $eventPage->url() ?>">
								<span class="a-list-item-event__start-date"><?= $eventPage->startDate()->toDate('d.') ?></span>
								<span class="a-list-item-event__day-short"><?= $eventPage->dayShort() ?></span>
								<strong class="a-list-item-event__title"><?= $eventPage->title() ?></strong>
								<span class="a-tag"><?= $eventPage->tag() ?></span>
								<span class="a-list-item-event__hours"><?= $eventPage->hours() ?></span>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</li>
		<?php endforeach ?>
	</ul>
</div>
