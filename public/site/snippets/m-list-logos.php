<ul class="m-list-logos">
	<?php foreach ($logos as $item): ?>
		<?php if ($image = $item->image()->toFile()): ?>
			<?php
				$height = (int)$item->height()->toFloat();
				$width = (int)($height * $image->ratio());
				$size = [
					'width' => $width,
					'height' => $height,
					'crop' => true,
				];
				$size2x = [
					'2x' =>[
						'width' => $width * 2,
						'height' => $height * 2,
						'crop' => true,
						'format' => 'webp',
					],
				];
			?>
			<li>
				<?php if ($link = $item->link()->toUrl()): ?>
					<a href=<?= $link ?> target=_blank>
				<?php endif ?>
					<img <?= attr([
						'src' => $image->thumb($size)->url(),
						'srcset' => $image->srcset($size2x),
						'sizes' => $width . 'px',
						'alt' => $item->text(),
						'width' => $width ,
						'height' => $height,
						'loading' => 'lazy',
					]) ?>>
				<?php if ($link = $item->link()->toUrl()): ?>
					</a>
				<?php endif ?>
			</li>
		<?php endif ?>
	<?php endforeach ?>
</ul>
