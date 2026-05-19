<?php

/**
 * Naptár konfiguráció
 *
 * Aloldalra másolásnál (pl. gde_ai):
 *   1. Másold át: config/calendar.php
 *   2. Másold át: resources/views/components/calendar-dropdown.blade.php
 *   3. Módosítsd itt az adatokat – a 'conferences' tömbben csak az adott oldal
 *      konferenciája szerepeljen, a többi kulcsot hagyd változatlanul.
 *   4. A bannerben/navbarban hívd meg a komponenst (lásd a banner.blade.php példát).
 */

return [

    'location' => '1119 Budapest, Fejér Lipót utca 70.',

    'timezone' => 'Europe/Budapest',

    'conferences' => [

        'fifi' => [
            'uid'         => 'fifi-2026@horizons.gde.hu',
            'title'       => 'FIFI2026 – The Future of Intelligence',
            'description' => 'The Future of Intelligence. The Future of Implementations.',
            'date'        => '2026-05-18',
            'start_time'  => '09:00',
            'end_time'    => '17:00',
        ],

        'fsft' => [
            'uid'         => 'fsft-2026@horizons.gde.hu',
            'title'       => 'FSFT2026 – The Future of Security',
            'description' => 'The Future of Security. The Future of Trust.',
            'date'        => '2026-05-19',
            'start_time'  => '09:00',
            'end_time'    => '17:00',
        ],

        'fdfv' => [
            'uid'         => 'fdfv-2026@horizons.gde.hu',
            'title'       => 'FDFV2026 – The Future of Dronedata',
            'description' => 'The Future of Dronedata. The Future of Vision.',
            'date'        => '2026-05-20',
            'start_time'  => '09:00',
            'end_time'    => '17:00',
        ],

        'ftfl' => [
            'uid'         => 'ftfl-2026@horizons.gde.hu',
            'title'       => 'FTFL2026 – The Future of Teaching',
            'description' => 'The Future of Teaching. The Future of Learning.',
            'date'        => '2026-05-21',
            'start_time'  => '09:00',
            'end_time'    => '17:00',
        ],

    ],

];
