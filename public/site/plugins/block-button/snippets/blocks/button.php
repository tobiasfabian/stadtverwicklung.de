<?php
$href = $block->link()->toUrl();
?>

<?php if (!empty($href)): ?>
	<div class=m-text>
		<a
			class=a-button
			href=<?= $href ?>
		>
			<?= $block->text() ?>
		</a>
	</div>
<?php endif; ?>
