<?php /** @var \Kirby\Cms\Block $block */ ?>
<div class="m-grid" <?= attr([
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
			<li class="m-grid__item">
				<?php if ($image): ?>
					<?php snippet('image', [
						'image' => $image,
						'srcset' => '3/2',
						'sizes' => 336 / 16 . 'rem',
					]) ?>
				<?php endif ?>
				<h3><?= $item->title() ?></h3>
				<p><?= $item->text() ?></p>
			</li>
		<?php endforeach ?>
	</ul>
</div>
