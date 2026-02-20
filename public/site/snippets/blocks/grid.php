<?php
/** @var \Kirby\Cms\Block $block */
$columns = (int)$block->columns()->value();

$srcset = 'card';
$sizes = '100vw';
$textAlign = $block->textAlign()->value() !== 'start' ? $block->textAlign()->value() : null;

if ($columns === 2) {
	$srcset = 'default';
	$sizes = '(min-width: 69rem) 33.75, (min-width: 23.5rem) 50vw, 100vw';
}
?>
<?php $items = $block->items()->toStructure() ?>
<div class=m-grid <?= attr([
	'data-text-align' => $textAlign,
	'data-columns' => $columns !== 3 || empty($columns) ? $columns : null,
]) ?>>
	<div class=m-text>
		<?= $block->text() ?>
	</div>
	<?php if ($items->count() > 0): ?>
		<ul>
			<?php foreach ($items as $item): ?>
				<li class=m-grid__item>
					<?php if ($image = $item->image()->toFile()): ?>
						<figure class="m-figure" data-caption-align="<?= $textAlign === null ? 'end' : $textAlign ?>"">
							<?php snippet('image', [
								'image' => $image,
								'srcset' => $srcset,
								'loading' => 'lazy',
							]) ?>
							<?php if ($item->caption()->isNotEmpty()): ?>
								<figcaption data-kind=secondary>
									<?= $item->caption() ?>
								</figcaption>
							<?php endif ?>
						</figure>
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
