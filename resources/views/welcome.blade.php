<!-- Hero Section -->
<div class="text-dark mb-5 py-5 bg-light" style="display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="text-center">
                    <h1 class="display-4 fw-bold mb-2 text-main-blue">
                        <?= lang('welcome__landing.hero.title') ?>
                    </h1>
                    <h2 class="h4 fw-semibold mb-2 text-main-blue">
                        <?= lang('welcome__landing.hero.subtitle') ?>
                    </h2>
                    <h5 class="h4 text-muted fw-semibold mb-4 text-secondary">
                        <?= lang('welcome__landing.hero.subsubtitle') ?>
                    </h5>

                    <hr class="bg-main-blue w-25 mx-auto" style="height: 3px; opacity: 1;">
                    <div class="bg-light d-flex justify-content-center pb-4">
                        <?php require_once view_path('components/calendar-dropdown'); ?>
                    </div>

                    <div class="row">
                        <div class="col-12 col-xl-6 d-flex align-items-center justify-content-center p-0 m-0">
                            <img src="<?= public_file('images/base/flyer_' . ($_COOKIE['lang'] ?? 'hu') . '.jpg') ?>"
                                class="img-fluid p-0 m-0" alt="">
                        </div>
                        <div class="col-12 col-xl-6 p-lg-4">
                            <p class="h5 fw-normal mb-4" style="line-height: 1.6; text-align: justify;">
                                <?= lang('welcome__landing.hero.description') ?>
                            </p>
                        </div>
                    </div>
                    <div class="small mb-4 mt-3">
                        <span class="me-3 text-main-blue"><i class="bi bi-calendar"></i>
                            <?= lang('welcome__landing.hero.date') ?></span>
                        <span class="me-3 text-main-blue"><i class="bi bi-geo-alt"></i>
                            <?= lang('welcome__landing.hero.location') ?></span>
                        <span class="text-main-blue"><i class="bi bi-globe"></i>
                            <?= lang('welcome__landing.hero.language') ?></span>
                    </div>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="http://horizons.gde.hu"
                            class="btn bg-main-blue text-white fw-bold px-5 py-3 rounded-pill">
                            <?= lang('welcome__landing.hero.cta') ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="my-5">
        <?php include view_path('components/program-schedule'); ?>
    </div>
    <div class="my-4">
        <?php include view_path('components/program-sections'); ?>
    </div>
    <?php include view_path('components/plenary-section'); ?>

</div>

<div class="container">
    <?php include view_path('components/abstract-download')?>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 d-flex">
            <div class="text-center px-4 py-5">
                <h3 class="fw-bold mb-4"><?= lang('welcome__landing.alert.title') ?></h3>
                <p class="text-muted mb-4" style="text-align: justify;"><?= lang('welcome__landing.alert.body') ?></p>
                <ul class="list-unstyled">
                    <?php foreach (lang('welcome__landing.alert.list') as $item): ?>
                    <li class="mb-2">
                        <i class="bi bi-check-circle-fill text-primary me-2"></i><?= $item ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-6">
            <div id="welcomeMediaCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php foreach (public_gallery_images('images/base/gallery') as $index => $_): ?>
                    <button type="button" data-bs-target="#welcomeMediaCarousel" data-bs-slide-to="<?= $index ?>"
                        class="<?= $index === 0 ? 'active' : '' ?>" <?= $index === 0 ? 'aria-current="true"' : '' ?>
                        aria-label="Slide <?= $index + 1 ?>"></button>
                    <?php endforeach; ?>
                </div>

                <div class="carousel-inner rounded-3 overflow-hidden shadow-sm">
                    <?php foreach (public_gallery_images('images/base/gallery') as $index => $imagePath): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img src="<?= public_file($imagePath) ?>" class="d-block w-100"
                            style="height: 500px; object-fit: cover;" alt="Conference visual <?= $index + 1 ?>">
                    </div>
                    <?php endforeach; ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#welcomeMediaCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#welcomeMediaCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-lg-6">

        </div>
    </div>
</div>



<!-- Key Topics Section -->
<div class="container mt-6 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-lg-10">
            <h2 class="text-center h3 fw-bold text-main-blue"><?= lang('welcome__landing.topics.title') ?></h2>
            <!--<p class="mb-5 text-center"><?= lang('welcome__landing.invitation.desc') ?></p>-->

            <?php
            $topics = lang('welcome__landing.topics.items');
            $half = (int) ceil(count($topics) / 2);
            $leftTopics = array_slice($topics, 0, $half);
            $rightTopics = array_slice($topics, $half);
            ?>
            <div class="d-block d-lg-none">
                <?php foreach ($topics as $index => $topic): ?>
                <div class="d-flex gap-3 <?= $index < count($topics) - 1 ? 'mb-4' : '' ?>">
                    <div>
                        <i class="bi <?= $topic['icon'] ?> text-main-blue" style="font-size: 1.25rem;"></i>
                    </div>
                    <div>
                        <p class="fw-bold text-main-blue mb-2"><?= $topic['title'] ?></p>
                        <?php if (!empty($topic['note'])): ?>
                        <p class="small text-secondary mb-0"><?= $topic['note'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="row g-4 align-items-center d-none d-lg-flex">
                <div class="col-12 col-lg-4">
                    <?php foreach ($leftTopics as $index => $topic): ?>
                    <div class="<?= $index < count($leftTopics) - 1 ? 'mb-4' : '' ?>">
                        <div>
                            <p style="font-size: 1.2rem;" class="fw-bold text-main-blue text-end mb-2">
                                <?= $topic['title'] ?></p>
                            <?php if (!empty($topic['note'])): ?>
                            <p class="small text-secondary mb-0"><?= $topic['note'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="col-12 col-lg-4 text-center d-none d-lg-block">
                    <img src="<?= public_file('images/base/brain.png') ?>" alt="Topics image"
                        class="img-fluid rounded-3 w-100">
                </div>

                <div class="col-12 col-lg-4">
                    <?php foreach ($rightTopics as $index => $topic): ?>
                    <div class="<?= $index < count($rightTopics) - 1 ? 'mb-4' : '' ?>">
                        <div>
                            <p style="font-size: 1.2rem;" class="fw-bold text-main-blue mb-2"><?= $topic['title'] ?>
                            </p>
                            <?php if (!empty($topic['note'])): ?>
                            <p class="small text-secondary mb-0"><?= $topic['note'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>


                <div class="col-12 text-center mt-5">
                    <a href="/subscription"
                        class="btn btn-lg bg-main-blue text-white rounded-pill"><?= lang('navbar__links.registration') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Who Should Attend Section -->
<div class="my-6">
    <div class="wrapper h-100 w-100 d-flex align-items-center justify-content-center py-5 text-white"
        style="background: url('<?= public_file('images/base/banner_2.png') ?>') center center/cover no-repeat;">
        <div class="container">
            <div class="row justify-content-center align-items-center g-4">
                <div class="col-12 col-lg-4">
                    <img src="<?= public_file('images/base/robot.jpg') ?>" alt="Audience section image"
                        class="img-fluid rounded-3 shadow-sm w-100 rounded">
                </div>
                <div class="col-12 col-lg-8">
                    <h2 class="h3 fw-bold mb-4"><?= lang('welcome__landing.audience.title') ?></h2>
                    <p class="lead mb-0">
                        <?= lang('welcome__landing.audience.description') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- FAQ Section -->
<div class="container">
    <div class="row">
        <div class="col-12 col-xl-6">
            <p class="fw-semibold text-main-blue mt-5 mb-2"><?= lang('welcome__landing.youtube_label') ?></p>
            <iframe class="w-100 h-500" height="315"
                src="https://www.youtube.com/embed/svWzNievmDg?si=D0E2tylUU8sqQk-g" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <div class="col-12 col-xl-6">
            <!-- Agenda Section -->
            <?php if (EVENT_STARTED): ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="accordion" id="agendaAccordion">
                            <div class="accordion-item border-0 shadow-sm mb-3">
                                <h2 class="accordion-header" id="agendaHeading">
                                    <button class="accordion-button collapsed fw-bold text-main-blue text-3xl"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#agendaCollapse"
                                        aria-expanded="false" aria-controls="agendaCollapse">
                                        <?= lang('welcome__landing.agenda.title') ?>
                                    </button>
                                </h2>
                                <div id="agendaCollapse" class="accordion-collapse collapse"
                                    aria-labelledby="agendaHeading" data-bs-parent="#agendaAccordion">
                                    <div class="accordion-body">
                                        <div class="timeline">
                                            <?php foreach (lang('welcome__landing.agenda.items') as $index => $item): ?>
                                            <div
                                                class="d-flex align-items-center gap-4 <?= $index < count(lang('welcome__landing.agenda.items')) - 1 ? 'mb-4' : '' ?>">
                                                <div class="fw-bold text-main-blue"
                                                    style="min-width: 130px; font-size: 0.95rem;"><?= $item['time'] ?>
                                                </div>
                                                <div class="fw-semibold"><?= $item['title'] ?></div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php include base_path('resources/views/components/faq.blade.php'); ?>
        </div>
    </div>

</div>

<footer class="gradient-bg-horizontal text-white mt-5">
    <div class="container py-5">
        <div class="row g-4 align-items-start justify-content-between">
            <div class="col-12 col-lg-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="bg-white text-main-blue rounded-3 px-3 py-2 fw-bold">GDU</div>
                    <div class="fw-semibold"><?= lang('welcome__footer.about_title') ?></div>
                </div>
                <div class="small"><?= lang('welcome__footer.about_text') ?></div>
            </div>
            <div class="col-12 col-lg-4 md-text-end">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="fw-bold mb-2"><?= lang('welcome__footer.quick_links') ?></div>
                        <div class="d-flex flex-column gap-2 small">
                            <a class="text-white text-decoration-none"
                                href="<?= lang('welcome__footer.links.home.url') ?>"><?= lang('welcome__footer.links.home.label') ?></a>
                            <a class="text-white text-decoration-none"
                                href="<?= lang('welcome__footer.links.registration.url') ?>"><?= lang('welcome__footer.links.registration.label') ?></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="fw-bold mb-2"><?= lang('welcome__footer.contact_title') ?></div>
                        <div class="small">
                            <div><?= lang('welcome__footer.contact_email') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="border-white border-opacity-25 my-4">
        <div class="d-flex flex-column flex-md-row justify-content-between small">
            <div><?= lang('welcome__footer.copyright') ?></div>
            <div class="d-flex gap-3">
                <a class="text-white text-decoration-none"
                    href="<?= lang('welcome__footer.links.privacy.url') ?>"><?= lang('welcome__footer.links.privacy.label') ?></a>
                <!--
                <a class="text-white text-decoration-none"
                    href="<?= lang('welcome__footer.links.terms.url') ?>"><?= lang('welcome__footer.links.terms.label') ?></a>
                -->
            </div>
        </div>
    </div>
</footer>

<script>
    const parallaxHero = document.getElementById('parallaxHero');

    window.addEventListener('scroll', function() {
        const elementTop = parallaxHero.offsetTop;
        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;
        const elementCenter = elementTop + parallaxHero.offsetHeight / 2;

        const distance = scrollY - (elementTop + windowHeight);
        const offset = -distance * 0.100;

        parallaxHero.style.transform = `translateY(${offset}px)`;
    });
</script>
