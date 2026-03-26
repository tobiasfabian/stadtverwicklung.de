class OListEvents {
	/** @argument {HTMLElement} element */
	constructor(element) {
		this.element = element;
		this.buttonShowAllElement = element.querySelector('[data-action="show-all"]');

		this.buttonShowAllElement.addEventListener('click', () => {
			if (this.element.getAttribute('data-show-all') === 'true') {
				this.hideAll();
			} else {
				this.showAll();
			}
		});
	}

	toggleButtonText() {
		const buttonAlternativeText = this.buttonShowAllElement.dataset.alternativeText;
		this.buttonShowAllElement.dataset.alternativeText = this.buttonShowAllElement.innerText;
		this.buttonShowAllElement.innerText = buttonAlternativeText;
	}

	showAll() {
		this.element.setAttribute('data-show-all', 'true');
		this.toggleButtonText();
	}

	hideAll() {
		this.element.setAttribute('data-show-all', 'false');
		this.toggleButtonText();
	}
}

document.querySelectorAll('.o-list-events[data-show-all]').forEach((element) => new OListEvents(element));
