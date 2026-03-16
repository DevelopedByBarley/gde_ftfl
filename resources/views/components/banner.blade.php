<div class="banner-wrapper position-relative"
    style="background-image: url('<?= public_file('images/base/banner_bg.png') ?>'); background-size: cover; background-position: center;">

    <?php
    $conferenceTopics = lang('navbar__topics');
    $previousConferenceTopics = array_slice($conferenceTopics, 0, 1);
    $previousConferenceLabel = ($_COOKIE['lang'] ?? 'hu') === 'en' ? 'Previous conferences' : 'Korábbi konferenciák';
    ?>

    <style>
        .banner-lang-switcher {
            position: static;
            text-align: center;
            margin: 0 auto;
            width: fit-content;
        }

        .banner-prev-conferences {
            position: static;
            margin: 0.75rem auto 0;
            width: fit-content;
        }

        @media (min-width: 992px) {
            .banner-lang-switcher {
                position: absolute;
                left: 0;
                top: 0;
                margin-top: 1rem;
                margin-left: 1rem;
                margin-right: 0;
                margin-bottom: 0;
            }

            .banner-prev-conferences {
                position: absolute;
                right: 1rem;
                top: 1rem;
                margin: 0;
            }
        }
    </style>

    <div
        class="banner-lang-switcher d-flex align-items-center justify-content-center justify-content-lg-end flex-wrap gap-2 bg-white rounded-pill px-2 py-1">
        <form action="/lang" method="POST" class="d-inline">
            <?= csrf() ?>
            <input type="hidden" name="lang" value="en">
            <button type="submit"
                class="btn rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-2 <?= ($_COOKIE['lang'] ?? '') === 'en' ? 'bg-main-blue text-white' : 'btn-light text-info' ?>">
                <img src="<?= public_file('images/base/eng_flag.png') ?>" class="rounded" style="width: 25px;"
                    alt="English">
                <span class="small"><?= lang('banner__lang.en_label') ?></span>
            </button>
        </form>
        <form action="/lang" method="POST" class="d-inline">
            <?= csrf() ?>
            <input type="hidden" name="lang" value="hu">
            <button type="submit"
                class="btn rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-2 <?= ($_COOKIE['lang'] ?? '') === 'hu' ? 'bg-main-blue text-white' : 'btn-light text-info' ?>">
                <img src="<?= public_file('images/base/hun_flag.png') ?>" class="rounded" style="width: 25px;"
                    alt="Hungarian">
                <span class="small"><?= lang('banner__lang.hu_label') ?></span>
            </button>
        </form>
    </div>

    <div class="dropdown banner-prev-conferences">
        <button class="btn btn-light rounded-pill dropdown-toggle px-3 text-main-blue" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <?= $previousConferenceLabel ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
            <?php foreach ($previousConferenceTopics as $topic): ?>
            <li>
                <a class="dropdown-item" href="https://ftfl.gde.hu/2025/" target="_blank"
                    rel="noopener noreferrer"><?= $topic['label'] ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="container-fluid py-5 text-white">
        <div class="row g-4">
            <!-- Logók szekció -->
            <div
                class="col-12 col-lg-5 d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-lg-end gap-3 text-center text-lg-end">
                <div>
                    <img style="width: 100%; max-width: 250px;"
                        src="<?= public_file('images/base/gde-logo-white.png') ?>" alt="GDE Logo">
                </div>
                <div class="pe-0 pe-lg-3 py-3">
                    <a href="https://gde.hu/erasmus-week-2026" target="_blank" class="bg-white rounded p-2 d-block">
                        <img style="width: 100%; max-width: 180px;"
                            src="<?= public_file('images/base/erasmus_plus.png') ?>" alt="Erasmus+">
                    </a>
                </div>
                <div class="vr d-none d-lg-block align-self-center"
                    style="width: 4px; height: 40%; color: #fff; opacity: 1;"></div>
            </div>
            <div
                class="col-12 col-lg-4 d-flex flex-row align-items-center justify-content-center justify-content-lg-start gap-3 text-center text-lg-start">
                <div class="">
                    <h1 class="display-6 fw-bold mb-0">
                        <?= lang('banner__title') ?>
                    </h1>
                </div>
            </div>

            <div
                class="col-12 col-lg-3 d-flex flex-column align-items-center align-items-lg-start justify-content-center justify-content-lg-end pe-0 pe-lg-5 text-center text-lg-end banner-offset-lg">


                <div class="d-flex mt-6 justify-content-center justify-content-lg-end text-center text-lg-end">
                    <div class="">
                        <h4 class="mb-1 fw-semibold">
                            <?= lang('banner__date_range') ?>
                        </h4>
                        <h5 class="mb-0 fw-normal text-md">
                            <?= lang('banner__city') ?>
                        </h5>
                    </div>
                    <div class="vr d-none d-lg-block ms-2" style="width: 4px; color: #fff; opacity: 1;"></div>
                </div>
            </div>
        </div>
    </div>
</div>











<!--
             
                    <div class="col-12 col-lg-8">
                        <div class="d-flex flex-column align-items-center align-items-lg-end gap-3">

                            <div class="text-center text-lg-end">
                                <h1 class="display-5 fw-bold mb-0">
                                    <?= lang('banner__title') ?>
                                </h1>
                            </div>

                            <div
                                class="d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-lg-end gap-3 gap-sm-4 mt-2">
                                <div class="text-center text-sm-end">
                                    <h4 class="mb-1 fw-semibold">
                                        <?= lang('banner__date_range') ?>
                                    </h4>
                                    <h5 class="mb-0 fw-normal">
                                        <?= lang('banner__city') ?>
                                    </h5>
                                </div>
                                <div class="display-3 fw-bold" style="line-height: 1;">
                                    <?= lang('banner__year') ?>
                                </div>
                            </div>
                        </div>
                    </div>
-->
