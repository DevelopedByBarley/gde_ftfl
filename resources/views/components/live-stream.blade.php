<?php
// ─── Beállítások ────────────────────────────────────────────────────────────
$streamUrl   = 'https://www.youtube.com/embed/NGAkp4HB6jY?si=35M1wVIYBigtTMA4&autoplay=1';
$streamStart = '2026-05-19 09:00:00'; // Budapest idő szerint (ÉÉÉÉ-HH-NN ÓÓ:PP:MM)
$streamEnd   = '2026-05-19 18:00:00'; // Budapest idő szerint
// ────────────────────────────────────────────────────────────────────────────

$tz   = new DateTimeZone('Europe/Budapest');
$now  = new DateTime('now', $tz);
$from = new DateTime($streamStart, $tz);
$to   = new DateTime($streamEnd, $tz);

if ($now >= $from && $now <= $to):
?>
<div class="ratio ratio-16x9 shadow rounded-3 overflow-hidden">
    <iframe
        src="<?= $streamUrl ?>"
        title="Live Stream"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen>
    </iframe>
</div>
<?php endif; ?>
