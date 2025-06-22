<?php /** @var \Kirby\Cms\Block $block */ ?>
<div class="m-bricks" <?= attr([
	'data-text-align' => $block->textAlign()->value() !== 'start' ? $block->textAlign()->value() : null,
]) ?>>
	<div class="m-text">
		<?= $block->text() ?>
	</div>
	<ul>
		<?php foreach ($block->items()->toStructure() as $item): ?>
			<?php
			$image = $item->image()->toFile();
			?>
			<li>
				<?php if ($image): ?>
					<img src="<?= $image->thumb([
						'width' => 325 * 2,
					])->url() ?>" alt="<?= $image->alt() ?>" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
				<?php endif ?>
				<h3><?= $item->title() ?></h3>
				<p><?= $item->text() ?></p>
			</li>
		<?php endforeach ?>
	</ul>
</div>
