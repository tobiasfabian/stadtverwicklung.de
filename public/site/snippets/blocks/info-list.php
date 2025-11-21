<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$items = $block->items()->toStructure();
if ($items->count() === 0) return;
?>
<div class="m-info-list">
	<?php if ($block->headline()->isNotEmpty()): ?>
		<h2 class="a-heading"><?= $block->headline() ?></h2>
	<?php endif ?>
	<ul>
		<?php foreach($items as $item): ?>
			<li>
				<?php if ($item->type()->value() === 'text'): ?>
					<p><?= $item->text()->kti() ?></p>
				<?php elseif ($item->type()->value() === 'link'): ?>
					<?php $linkObject = $item->link()->toObject(); ?>
					<a href="<?= $linkObject->link()->toUrl() ?>">
						<strong><?= $linkObject->text() ?></strong>
						<?php if ($linkObject->info()->isNotEmpty()): ?>
							<?= $linkObject->info() ?>
						<?php endif ?>
					</a>
				<?php endif ?>
			</li>
		<?php endforeach ?>
	</ul>
</div>
