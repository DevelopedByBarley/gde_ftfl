<div class="banner-wrapper gradient-bg-horizontal">
    <div class="container px-0">
        <div class="text-white">
            <div class="container pt-5">
                <div class="row align-items-center justify-content-between g-3 g-md-4">
                    <div class="col-12 col-md-3">
                        <div class="d-flex align-items-center">
                            <img style="width: 300px" src="<?= public_file('images/base/GDE_logo_wht_RGB_vedett.png') ?> "
                                alt="">
                        </div>
                    </div>

                    <div class="col-12 col-md-8 order-1 order-md-3">
                        <div class="d-flex flex-column align-items-start align-items-md-end">
                            <div class="d-inline-flex align-items-center gap-2 bg-white rounded-pill px-2 py-1 mb-2 overflow-hidden">
                                <form action="/lang" method="POST" class="d-inline">
                                    <?= csrf() ?>
                                    <input type="hidden" name="lang" value="en">
                                    <button type="submit"
                                        class="btn rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-2 <?= ($_COOKIE['lang'] ?? '') === 'en' ? 'bg-main-blue text-white' : 'btn-light text-info' ?>">
                                        <span class="fs-6">
                                            <img src="<?= public_file('images/base/eng_flag.png') ?>"
                                                class="rounded rounded" style="width: 25px;" alt="">
                                        </span>
                                        <span class="small"><?= lang('banner__lang.en_label') ?></span>
                                    </button>
                                </form>
                                <form action="/lang" method="POST" class="d-inline">
                                    <?= csrf() ?>
                                    <input type="hidden" name="lang" value="hu">
                                    <button type="submit"
                                        class="btn rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-2 <?= ($_COOKIE['lang'] ?? '') === 'hu' ? 'bg-main-blue text-white' : 'btn-light text-info' ?>">
                                        <span class="fs-6">
                                            <img src="<?= public_file('images/base/hun_flag.png') ?>"
                                                class="rounded" style="width: 25px;" alt="">
                                        </span> <span class="small"><?= lang('banner__lang.hu_label') ?></span>
                                    </button>
                                </form>
                            </div>
                            <div class="my-2">
                                <h1 class="text-4xl fw-bold text-lg-end">
                                    <?= lang('banner__title') ?>
                                </h1>
                            </div>
                            <div class="d-flex align-items-center gap-2 p-2">
                                <div class="fw-semibold text-end">
                                    <h4>
                                        <?= lang('banner__date_range') ?>
                                        <br>
                                        <?= lang('banner__city') ?>
                                    </h4>

                                </div>
                                <div class="h1 text-7xl fw-bold mb-0"><?= lang('banner__year') ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
