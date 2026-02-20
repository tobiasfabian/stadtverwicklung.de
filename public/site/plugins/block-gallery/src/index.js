import EnhancedKGallery from "./components/EnhancedKGallery.vue";

window.panel.plugin('tobiaswolf/block-gallery', {
	components: {
		'k-block-type-gallery': {
			extends: EnhancedKGallery,
		},
	},
});
