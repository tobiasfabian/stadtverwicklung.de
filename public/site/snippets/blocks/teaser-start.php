<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php
$image = $block->image()->toFile();
$link = $block->link()->toObject();

if ($image === null) {
	return;
}
?>
<div class=m-teaser-start>
		<?php if ($image): ?>
			<?php snippet('image', [
				'image' => $image,
				'srcset' => 'm-teaser-start',
				'sizes' => '100vw',
			]) ?>
		<?php endif ?>
		<div class="m-teaser-start__overlay" data-variant="mask"></div>
		<div class="m-teaser-start__overlay"></div>
		<div class=m-teaser-start__text>
			<h1 class=a-heading><?= $block->title() ?></h1>
		</div>
		<?php if ($block->text()->isNotEmpty()): ?>
			<div class="m-teaser-start__bubble">
				<p><?= $block->text() ?></p>
				<?php if ($link->isNotEmpty()): ?>
					<a <?= attr([
						'class' => 'a-button',
						'href' => $link->link()->toUrl(),
						'data-kind' => 'transparent-dark',
						'target' => $link->newWindow()->toBool() ? '_blank' : null,
					]) ?>><?= $link->text() ?></a>
				<?php endif ?>
			</div>
		<?php endif ?>
</div>

