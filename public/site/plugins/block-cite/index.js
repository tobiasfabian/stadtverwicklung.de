panel.plugin("tobiaswolf/cite-block", {
	blocks: {
		cite: `
			<figure @dblclick="open" class="k-cite">
        <div v-if="content.text">
          <blockquote>
            <span v-html="content.text"></span>
          </blockquote>
          <figcaption v-if="content.author" v-html="content.author"></figcaption>
        </div>
        <k-info-field v-else theme="empty" text="Zitat eingeben…" />
			</figure>
		`
	}
});
