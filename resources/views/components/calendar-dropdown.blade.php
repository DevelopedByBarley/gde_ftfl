<?php
/**
 * Calendar Dropdown Component
 *
 * Hívás előtt be kell állítani a $calendarData változót.
 * Az adatok forrása: config/calendar.php
 *
 * $calendarData = [
 *   'uid'         => string,   // pl. 'fifi-2026@horizons.gde.hu'
 *   'title'       => string,   // esemény neve
 *   'description' => string,   // leírás
 *   'location'    => string,   // helyszín
 *   'date'        => string,   // '2026-05-18'
 *   'start_time'  => string,   // '09:00'
 *   'end_time'    => string,   // '18:00'
 *   'timezone'    => string,   // 'Europe/Budapest' (opcionális, alapértelmezett: Europe/Budapest)
 * ]
 */

$_calCfg  = require __DIR__ . '/../../../config/calendar.php';
$_calConf = $_calCfg['conferences']['ftfl'];
$calendarData = [
    'uid'         => $_calConf['uid'],
    'title'       => $_calConf['title'],
    'description' => $_calConf['description'],
    'location'    => $_calCfg['location'],
    'date'        => $_calConf['date'],
    'start_time'  => $_calConf['start_time'],
    'end_time'    => $_calConf['end_time'],
    'timezone'    => $_calCfg['timezone'],
];

if (!function_exists('_cal_to_utc_str')) {
    function _cal_to_utc_str(string $date, string $time, string $timezone): string
    {
        // Google Calendar URL-hez: UTC Z formátum (pl. 20260518T080000Z)
        $dt = new DateTime($date . ' ' . $time, new DateTimeZone($timezone));
        $dt->setTimezone(new DateTimeZone('UTC'));
        return $dt->format('Ymd\THis\Z');
    }
    function _cal_to_local_ics(string $date, string $time): string
    {
        // ICS fájlhoz és Outlookhoz: helyi idő (pl. 20260518T100000)
        return str_replace('-', '', $date) . 'T' . str_replace(':', '', $time) . '00';
    }
    function _cal_to_offset(string $date, string $time, string $timezone): string
    {
        // Outlook URL-hez: ISO 8601 offset (pl. 2026-05-18T10:00:00+02:00)
        $dt = new DateTime($date . ' ' . $time, new DateTimeZone($timezone));
        return $dt->format('Y-m-d\TH:i:sP');
    }
}

$isHu = ($_COOKIE['lang'] ?? 'hu') === 'hu';

$_cdTitle = htmlspecialchars_decode(strip_tags($calendarData['title']));
$_cdDesc  = htmlspecialchars_decode(strip_tags(str_replace(['<br/>', '<br />', '<br>'], ' ', $calendarData['description'] ?? '')));
$_cdLoc   = $calendarData['location'];
$_cdUid   = $calendarData['uid'];
$_cdTz    = $calendarData['timezone'] ?? 'Europe/Budapest';
$_cdStart = _cal_to_local_ics($calendarData['date'], $calendarData['start_time']);
$_cdEnd   = _cal_to_local_ics($calendarData['date'], $calendarData['end_time']);

// Google Calendar URL – floating time (timezone nélkül), mindenkinél 10:00-17:00 jelenik meg
$_googleUrl = 'https://calendar.google.com/calendar/render?action=TEMPLATE'
    . '&text='     . rawurlencode($_cdTitle)
    . '&dates='    . $_cdStart . '/' . $_cdEnd
    . '&details='  . rawurlencode($_cdDesc)
    . '&location=' . rawurlencode($_cdLoc);

// Outlook Calendar URL – ISO 8601 offset (pl. +02:00)
$_outlookUrl = 'https://outlook.live.com/calendar/0/deeplink/compose?path=/calendar/action/compose&rru=addevent'
    . '&subject='  . rawurlencode($_cdTitle)
    . '&startdt='  . rawurlencode(_cal_to_offset($calendarData['date'], $calendarData['start_time'], $_cdTz))
    . '&enddt='    . rawurlencode(_cal_to_offset($calendarData['date'], $calendarData['end_time'],   $_cdTz))
    . '&body='     . rawurlencode($_cdDesc)
    . '&location=' . rawurlencode($_cdLoc);

// JSON az ICS letöltéshez (JS-ben használjuk)
$_calJson = htmlspecialchars(json_encode([
    'uid'   => $_cdUid,
    'title' => $_cdTitle,
    'desc'  => $_cdDesc,
    'loc'   => $_cdLoc,
    'start' => $_cdStart,
    'end'   => $_cdEnd,
    'tz'    => $_cdTz,
]), ENT_QUOTES, 'UTF-8');
?>

<div class="dropdown">
    <button class="btn btn-sm rounded-pill px-3 py-2 fw-semibold"
            style="background:#0099ba; color:#fff; border:none;"
            type="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            title="<?= $isHu ? 'Hozzáadás a naptárhoz' : 'Add to calendar' ?>">
        <i class="bi bi-calendar-plus me-2" style="font-size:1.1rem; vertical-align:-2px;"></i><?= $isHu ? 'Hozzáadás a naptárhoz' : 'Add to calendar' ?>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="min-width:220px;">
        <li>
            <a class="dropdown-item small py-2"
               href="<?= $_outlookUrl ?>"
               target="_blank"
               rel="noopener noreferrer">
                <i class="bi bi-microsoft me-2" style="color:#0078d4;"></i>
                <?= $isHu ? 'Hozzáadás Outlook naptárhoz' : 'Add to Outlook Calendar' ?>
            </a>
        </li>
        <li>
            <a class="dropdown-item small py-2"
               href="<?= $_googleUrl ?>"
               target="_blank"
               rel="noopener noreferrer">
                <i class="bi bi-google me-2" style="color:#ea4335;"></i>
                <?= $isHu ? 'Hozzáadás Google naptárhoz' : 'Add to Google Calendar' ?>
            </a>
        </li>
        <li><hr class="dropdown-divider my-1"></li>
        <li>
            <a class="dropdown-item small py-2"
               href="#"
               onclick="calDropdownDownloadIcs(<?= $_calJson ?>); return false;">
                <i class="bi bi-file-earmark-arrow-down me-2 text-secondary"></i>
                <?= $isHu ? 'Letöltés (.ics fájl)' : 'Download (.ics file)' ?>
            </a>
        </li>
    </ul>
</div>

<?php if (!defined('_CAL_DROPDOWN_JS_LOADED')): define('_CAL_DROPDOWN_JS_LOADED', true); ?>
<script>
function calDropdownDownloadIcs(d) {
    var now = new Date().toISOString().replace(/[-:]/g, '').replace(/\.\d+/, '') + 'Z';
    var lines = [
        'BEGIN:VCALENDAR',
        'VERSION:2.0',
        'PRODID:-//GDE//Digital Horizons Week//EN',
        'CALSCALE:GREGORIAN',
        'METHOD:PUBLISH',
        'BEGIN:VEVENT',
        'UID:' + d.uid,
        'DTSTAMP:' + now,
        'DTSTART;TZID=' + d.tz + ':' + d.start,
        'DTEND;TZID=' + d.tz + ':' + d.end,
        'SUMMARY:' + d.title.replace(/[,;\\]/g, function(c){ return '\\' + c; }),
        'DESCRIPTION:' + d.desc.replace(/[,;\\]/g, function(c){ return '\\' + c; }).replace(/\n/g, '\\n'),
        'LOCATION:' + d.loc.replace(/[,;\\]/g, function(c){ return '\\' + c; }),
        'END:VEVENT',
        'END:VCALENDAR'
    ];
    var blob = new Blob([lines.join('\r\n')], { type: 'text/calendar;charset=utf-8' });
    var url  = URL.createObjectURL(blob);
    var a    = document.createElement('a');
    a.href     = url;
    a.download = d.uid.split('@')[0] + '.ics';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}
</script>
<?php endif; ?>
