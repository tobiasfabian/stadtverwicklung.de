class MVideo {
	constructor(element) {
		this.element = element;
		this.cookieBannerElement = element.querySelector('.m-video__cookie-banner');
		this.iframeElement = element.querySelector('iframe');
		const buttonElement = element.querySelector('button');

		buttonElement.addEventListener('click', (event) => {
			event.preventDefault();
			this.show();
		});
	}

	show(animate = true) {
		const {
			element,
			iframeElement,
			cookieBannerElement,
		} = this;
		element.classList.add('-active');
		iframeElement.removeAttribute('hidden');
		iframeElement.setAttribute('src', iframeElement.dataset.src);
		if (animate === true) {
			element.classList.add('-animate');
			const fadeOutAnimation = cookieBannerElement.animate(
				{
					opacity: 0,
				},
				{
					delay: 150,
					duration: 300,
				},
			);
			fadeOutAnimation.addEventListener('finish', () => {
				cookieBannerElement.setAttribute('hidden', '');
			});
		} else {
			cookieBannerElement.setAttribute('hidden', '');
		}
		// eslint-disable-next-line no-underscore-dangle
		window._paq?.push(['trackEvent', 'Video', 'Show', iframeElement.dataset.src]);
	}
}

document.mVideos = [];
document.querySelectorAll('.m-video').forEach((element) => {
	document.mVideos.push(new MVideo(element));
});
