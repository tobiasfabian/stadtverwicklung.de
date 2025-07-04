<?php
/** @var \Kirby\Cms\Site $site */
?>
<nav class="m-nav-primary">
	<button class="a-button-hamburger" aria-label="Navigation ausklappen" popovertarget="nav-primary-list" popovertargetaction="toggle">
		<span></span>
		<span></span>
		<span></span>
	</button>
	<ul id="nav-primary-list" popover>
		<?php foreach ($site->pages()->listed() as $item): ?>
			<li>
				<a <?= attr([
					'href' => $item->url(),
					'class' => 'a-nav-item',
					'data-selected' => $item->isOpen() ? true : null,
					'aria-current' => $item->isActive() ? 'page' : null,
				]) ?> >
					<?=  $item->title() ?>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
</nav>

<script type="module">
const element = document.getElementById('nav-primary-list');
const updatePopover = () => {
	if (window.matchMedia('(min-width: 64em)').matches) {
		element.removeAttribute('popover');
	} else {
		element.setAttribute('popover', 'manual');
	}
}
window.addEventListener('resize', updatePopover);
window.addEventListener('orientationchange', updatePopover);
updatePopover();
document.addEventListener('keydown', function(event) {
	if (event.key === 'Escape') {
		element.hidePopover();
	}
});
</script>
