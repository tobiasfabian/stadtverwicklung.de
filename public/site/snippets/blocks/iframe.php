<?php /** @var \Kirby\Cms\Block $block */

use Kirby\Toolkit\Str;

$provider = $block->provider()->toString();
$html = $block->html()->toString();
?>
<figure class=m-iframe data-provider=<?= Str::slug($provider) ?>>
	<button aria-label="Externen Inhalt von <?= $provider ?> laden"></button>
	<p>
		<?= kti(Str::template('Wir benötigen Ihre Zustimmung um externen Inhalt von **{ provider }** zu laden. Mit einem Klick erklären Sie sich damit einverstanden, dass Daten an { provider } übertragen werden.', ['provider' => $provider])) ?>
		<a href=<?= $site->privacyPage()->url() ?> title="<?= $site->privacyPage()->title() ?>">Mehr erfahren…</a>
	</p>
	<?= Str::replace($html, [' src='], [' data-src=']) ?>
</figure>
