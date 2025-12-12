<?php
/** @var \Kirby\Cms\Site $site */
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Page $page */

use Kirby\Toolkit\Str;

?>
<div class=m-nav-primary>
	<button class=a-button-hamburger aria-label="<?= t('aria.label.a-button-hamburger') ?>" popovertarget=nav-primary-list popovertargetaction=toggle>
		<span></span>
		<span></span>
		<span></span>
	</button>
	<div class=m-nav-primary__container id=nav-primary-list popover>
		<nav class=m-nav-primary__nav aria-label="<?= t('aria.label.primary-nav') ?>">
			<ul>
				<?php foreach ($site->pages()->listed() as $item): ?>
					<li>
						<?php if (in_array($item->intendedTemplate()->name(), ['projects', 'overview']) && $item->children()->listed()): ?>
							<button <?= attr([
								'class' => 'a-nav-item',
								'data-selected' => $item->isOpen() ? true : null,
								'aria-current' => $item->isActive() ? 'page' : null,
								'aria-label' => tt('aria.label.a-nav-item', ['title' => $item->title()]),
								'popovertarget' => 'subnav-' . $item->id(),
							]) ?> >
								<?=  $item->title() ?>
							</button>
							<ul <?= attr([
								'class' => 'm-nav-primary__subnav',
								'aria-label' => $item->title(),
								'id' => 'subnav-' . $item->id(),
								'popover' => true,
							]) ?>>
								<?php foreach ($item->children()->listed() as $childItem): ?>
									<li>
										<a <?= attr([
											'href' => $childItem->url(),
											'class' => 'a-nav-item',
											'data-selected' => $childItem->isOpen() ? true : null,
											'data-variant' => 'secondary',
											'aria-current' => $childItem->isActive() ? 'page' : null,
										]) ?> >
											<?=  $childItem->title() ?>
										</a>
									</li>
								<?php endforeach ?>
								<?php if ($item->intendedTemplate()->name() === 'projects'): ?>
									<li>
										<a <?= attr([
											'href' => $item->url() . '#' . Str::slug(t('projects.completed')),
											'class' => 'a-nav-item',
											'data-variant' => 'secondary',
										]) ?> >
											<?= t('projects.completed') ?>
										</a>
									</li>
								<?php endif ?>
							</ul>
						<?php else: ?>
							<a <?= attr([
								'href' => $item->url(),
								'class' => 'a-nav-item',
								'data-selected' => $item->isOpen() ? true : null,
								'aria-current' => $item->isActive() ? 'page' : null,
							]) ?> >
								<?=  $item->title() ?>
							</a>
						<?php endif ?>
					</li>
				<?php endforeach ?>
			</ul>
		</nav>
		<nav class=m-nav-primary__language-switch aria-label="<?= t('aria.label.language-nav') ?>">
			<ul>
				<?php foreach ($kirby->languages() as $lang): ?>
					<li>
						<a <?= attr([
							'href' => $page->urlForLanguage($lang->code()),
							'aria-current' => $lang === $kirby->language() ? 'page' : null,
						]) ?> href="<?= $page->urlForLanguage($lang->code()) ?>">
							<?= $lang->code() ?>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</nav>
	</div>
</div>

<script type="module">
const element = document.getElementById('nav-primary-list');
const subnavButtonElements = element?.querySelectorAll('button.a-nav-item');
const subnavElements = element?.querySelectorAll('.m-nav-primary__subnav');
const onSubnavButtonEnter = (/** @var {MouseEvent} */ event) => {
	if (!event.target.popoverTargetElement.matches(':popover-open')) {
		event.target.click();
	}
}
const onSubnavButtonLeave = (event) => {
	event.target.querySelector('button.a-nav-item').popoverTargetElement.hidePopover();
}
const updatePopovers = () => {
	if (window.matchMedia('(min-width: 64em)').matches) {
		element.removeAttribute('popover');
		subnavElements.forEach((subnavElement) => subnavElement.toggleAttribute('popover', true));
		subnavButtonElements.forEach((subnavButtonElement) => {
			subnavButtonElement.role = null;
			subnavButtonElement.tabIndex = null;
			subnavButtonElement.addEventListener('mouseenter', onSubnavButtonEnter);
			subnavButtonElement.parentElement.addEventListener('mouseleave', onSubnavButtonLeave);
		});
	} else {
		element.toggleAttribute('popover', true);
		subnavElements.forEach((subnavElement) => subnavElement.removeAttribute('popover'));
		subnavButtonElements.forEach((subnavButtonElement) => {
			subnavButtonElement.role = 'text';
			subnavButtonElement.tabIndex = -1;
			subnavButtonElement.removeEventListener('mouseenter', onSubnavButtonEnter);
			subnavButtonElement.parentElement.removeEventListener('mouseleave', onSubnavButtonLeave);
		});
	}
}
window.addEventListener('resize', updatePopovers);
window.addEventListener('orientationchange', updatePopovers);
updatePopovers();
</script>
