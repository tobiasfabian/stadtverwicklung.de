class MIframe {
	/** @argument {HTMLElement} element */
	constructor(element) {
		this.element = element;
		this.provider = element.dataset.provider;
		this.iframeElement = element.querySelector('iframe');
		this.sessionKey = `consent.${this.provider}`;

		const buttonElement = element.querySelector('button');

		buttonElement.addEventListener('click', () => {
			window.sessionStorage.setItem(this.sessionKey, '1');
			[...document.mIframes].filter((_) => _.provider === this.provider).forEach((_) => _.activate());
		});

		if (window.sessionStorage.getItem(this.sessionKey) === '1') {
			this.activate();
		}
	}

	activate() {
		this.element.setAttribute('data-state', 'active');
		this.iframeElement.setAttribute('src', this.iframeElement.dataset.src);
		this.iframeElement.removeAttribute('data-src');
	}
}

document.mIframes = [...document.querySelectorAll('.m-iframe')].map((element) => new MIframe(element));
