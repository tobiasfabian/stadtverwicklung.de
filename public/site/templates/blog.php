<?php
/** @var EventsPage|\Kirby\Cms\Page $page */

use Kirby\Exception\Exception;

?>
<?php snippet('head'); ?>
<body>
	<?php snippet('o-header') ?>
	<main class="o-blog">
		<div class="m-teaser">
			<h1 class="a-heading"><?= $page->alternativeTitle()->or($page->title()) ?></h1>
			<?php if ($page->teaserText()->isNotEmpty()): ?>
				<p class="m-text"><?= $page->teaserText() ?></p>
			<?php endif ?>
			<?php if ($teaserImage = $page->teaserImage()->toFile()): ?>
				<?php snippet('image', [
					'image' => $teaserImage,
					'sizes' => 516 / 16 . 'em',
				]) ?>
			<?php endif ?>
		</div>
		<?php try {
			echo snippet('o-list-blog', [
				'entries' => collection('blog-entries')->listed(),
			]);
		} catch (Exception $exception) {
			echo $exception->getMessage();
		}
		?>
	</main>
	<?php snippet('o-footer') ?>
</body>
<?php snippet('foot'); ?>
