panel.plugin("tobiaswolf/button-block", {
	blocks: {
		button: `
			<div @dblclick="open">
				<span v-if="content.text" class=button>
					{{ content.text }}
				</span>
				<div v-else>
					<k-info-field theme="empty" text="Link eingeben…" />
				</div>
			</div>
		`
	}
});
