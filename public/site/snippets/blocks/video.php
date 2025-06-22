<?php

use Kirby\Http\Remote;
use Kirby\Http\Uri;
use Kirby\Toolkit\Str;

$block = $block ?? null;

if ($block?->isHidden() ?? false) {
	return;
}
$url = $block?->url() ?? $url ?? false;
$startTime = $startTime ?? null;

$isYoutubeId = function (string|null $id = null): bool {
	if (empty($id) === true) {
		return false;
	}
	return preg_match('!^[a-zA-Z0-9_-]+$!', $id);
};

$provider = null;
$youtubeId = null;
if (preg_match('!youtu!i', $url) === 1) {
	$provider = 'YouTube';

	$uri    = new Uri($url);
	$path   = $uri->path();
	$query  = $uri->query();
	$first  = $path->first();
	$second = $path->nth(1);
	$host   = 'https://' . $uri->host() . '/embed';
	$src    = null;

	if ($path->toString() === 'watch') {
		if ($isYoutubeId($query->v) === true) {
			$youtubeId = $query->v;
		}
	} elseif (
		Str::contains($uri->host(), 'youtu.be') === true &&
		$isYoutubeId($first) === true
	) {
		$youtubeId = $first;
	}

	$response = Remote::get('https://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $youtubeId . '&format=json');
	$videoTitle = $response->json(true)['title'] ?? 'Video';
}
if (preg_match('!vimeo!i', $url) === 1) {
	$provider = 'Vimeo';
}
?>
<?php if ($url->isNotEmpty()) : ?>
<figure class="m-video">
	<div>
		<?= Str::replace(video($url, [
			'youtube' => [
				'rel' => 0,
				'modestbranding' => 1,
				'color' => 'white',
				'listType' => 'user_uploads',
				'autoplay' => 1,
			],
		], [
			'hidden' => true,
			'loading' => 'lazy',
			'allow' => 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture; fullscreen',
		]), ['https://www.youtube.com', 'src="'], ['https://www.youtube-nocookie.com', 'data-src="']) ?>
		<?php $formId = Str::random(8, 'alpha'); ?>
		<div class="m-video__cookie-banner">
			<?php if ($youtubeId): ?>
				<div class="m-video__preview">
					<img src="<?= url('youtube-thumbnail/' . $youtubeId) ?>" alt="">
				</div>
			<?php endif; ?>
			<button class="m-video__button-play" aria-label="Video anschauen: <?= $videoTitle ?>">
				<?= svg('assets/images/play-button.svg') ?>
			</button>
			<div class="m-video__legal-info">
				Dieses Video wird mit Ihrer Zustimmung von YouTube geladen. <a href="<?= $site->privacyPage()->url() ?>">Mehr erfahren…</a>
			</div>
		</div>
	</div>
	<?php if ($block?->caption()->isNotEmpty()) : ?>
		<figcaption class="a-caption"><?= $block?->caption() ?></figcaption>
	<?php endif ?>
</figure>
<?php endif ?>
