class MIframe {
	/** @argument {HTMLElement} element */
	constructor(element) {
		this.element = element;
		this.provider = element.dataset.provider;
		this.iframeElement = element.querySelector('iframe');

		const buttonElement = element.querySelector('button');

		buttonElement.addEventListener('click', () => {
			[...document.mIframes].filter((_) => _.provider === this.provider).forEach((_) => _.activate());
		});
	}

	activate() {
		this.element.setAttribute('data-state', 'active');
		this.iframeElement.setAttribute('src', this.iframeElement.dataset.src);
		this.iframeElement.removeAttribute('data-src');
	}
}

document.mIframes = [...document.querySelectorAll('.m-iframe')].map((element) => new MIframe(element));
