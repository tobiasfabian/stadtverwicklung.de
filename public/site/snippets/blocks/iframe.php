<?php /** @var \Kirby\Cms\Block $block */

use Kirby\Toolkit\Str;

$provider = $block->provider()->toString();
$html = $block->html()->toString();
?>
<figure class="m-iframe" data-provider="<?= Str::slug($provider) ?>">
	<button aria-label="Externen Inhalt von <?= $provider ?> laden"></button>
	<p>
		<?= Str::template('Mit Ihrer Zustimmung wird externer Inhalt von „{ provider }“ geladen. Dabei werden Daten an { provider } übertragen.', ['provider' => $provider]) ?>
		<a href="<?= $site->privacyPage()->url() ?>" title="<?= $site->privacyPage()->title() ?>">Mehr erfahren…</a>
	</p>
	<?= Str::replace($html, [' src='], [' data-src=']) ?>
</figure>
