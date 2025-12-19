<ul class="m-list-logos">
	<?php foreach ($logos as $item): ?>
		<?php if ($image = $item->image()->toFile()): ?>
			<li>
				<?php if ($link = $item->link()->toUrl()): ?>
					<a href=<?= $link ?> target=_blank>
				<?php endif ?>
					<img src=<?= $image->url() ?> alt="<?= $item->text() ?>" width=<?= (int)($item->height()->toFloat() * $image->ratio()) ?> height=<?= $item->height() ?>>
				<?php if ($link = $item->link()->toUrl()): ?>
					</a>
				<?php endif ?>
			</li>
		<?php endif ?>
	<?php endforeach ?>
</ul>
