import './components/m-gallery.js';
import './components/m-iframe.js';
import './components/m-video.js';

if (!(
	typeof HTMLElement !== 'undefined'
	&& typeof HTMLElement.prototype === 'object'
	&& 'popover' in HTMLElement.prototype
)) {
	// eslint-disable-next-line import/no-unresolved
	await import('./polyfills/popover.min.js');
}

// polyfill for anchor position
if (!('anchorName' in document.documentElement.style)) {
	document.querySelectorAll('.a-nav-item').forEach((aNavItem) => {
		aNavItem.addEventListener('mouseenter', () => {
			const popoverElement = aNavItem.popoverTargetElement;
			if (popoverElement) {
				const rect = aNavItem.getBoundingClientRect();
				popoverElement.style.left = `${rect.left}px`;
				popoverElement.style.top = `${rect.top + rect.height}px`;
			}
		});
	});
}
