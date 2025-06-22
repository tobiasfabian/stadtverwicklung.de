<?php
/** @var Block $block */
?>
<figure class="m-cite">
	<blockquote>
		<?= $block->text() ?>
	</blockquote>
	<?php if ($block->author()->isNotEmpty()): ?>
		<figcaption class="a-caption">
			<?= $block->author() ?>
		</figcaption>
	<?php endif; ?>
</figure>
