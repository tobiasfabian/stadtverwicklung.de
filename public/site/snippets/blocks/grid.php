<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php $items = $block->items()->toStructure() ?>
<div class=m-grid <?= attr([
	'data-text-align' => $block->textAlign()->value() !== 'start' ? $block->textAlign()->value() : null,
]) ?>>
	<div class=m-text>
		<?= $block->text() ?>
	</div>
	<?php if ($items->count() > 0): ?>
		<ul>
			<?php foreach ($items as $item): ?>
				<?php
				$image = $item->image()->toFile();
				?>
				<li class=m-grid__item>
					<?php if ($image): ?>
						<?php snippet('image', [
							'image' => $image,
							'srcset' => 'card',
							'loading' => 'lazy',
						]) ?>
					<?php endif ?>
					<h3><?= $item->title() ?></h3>
					<div class=m-text data-text-size=small>
						<?= $item->text() ?>
					</div>
				</li>
			<?php endforeach ?>
		</ul>
	<?php endif ?>
</div>
