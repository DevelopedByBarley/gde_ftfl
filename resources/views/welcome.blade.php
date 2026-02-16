<!-- Hero Section -->
<div class="text-dark my-5" style="display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="text-center">
                    <h1 class="display-4 fw-bold mb-4 text-main-blue">
                        <?= lang('welcome__landing.hero.title') ?>
                    </h1>
                    <p class="h5 fw-normal mb-4" style="line-height: 1.6;">
                        <?= lang('welcome__landing.hero.description') ?>
                    </p>
                    <div class="small mb-4">
                        <span class="me-3 text-main-blue"><i class="bi bi-calendar"></i> <?= lang('welcome__landing.hero.date') ?></span>
                        <span class="me-3 text-main-blue"><i class="bi bi-geo-alt"></i> <?= lang('welcome__landing.hero.location') ?></span>
                        <span class="text-main-blue"><i class="bi bi-globe"></i> <?= lang('welcome__landing.hero.language') ?></span>
                    </div>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="http://localhost:9090/" class="btn bg-main-blue text-white fw-bold px-5 py-3 rounded-pill">
                            <?= lang('welcome__landing.hero.cta') ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Key Topics Section -->
<div class="container py-6">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <h2 class="h3 fw-bold mb-5 text-main-blue"><?= lang('welcome__landing.topics.title') ?></h2>
            <div class="row g-4">
                <?php foreach (lang('welcome__landing.topics.items') as $topic): ?>
                <div class="col-12 col-md-6">
                    <div class="d-flex gap-3">
                        <div>
                            <i class="bi <?= $topic['icon'] ?> text-main-blue" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-main-blue mb-2"><?= $topic['title'] ?></h5>
                            <?php if (!empty($topic['note'])): ?>
                            <p class="small text-secondary mb-0"><?= $topic['note'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Who Should Attend Section -->
<div class="gradient-bg-horizontal py-6 text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <h2 class="h3 fw-bold mb-4"><?= lang('welcome__landing.audience.title') ?></h2>
                <p class="lead">
                    <?= lang('welcome__landing.audience.description') ?>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Agenda Section -->
<div class="container py-6">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <h2 class="h3 fw-bold mb-5 text-main-blue"><?= lang('welcome__landing.agenda.title') ?></h2>
            <div class="row">
                <div class="col-12">
                    <div class="timeline">
                        <?php foreach (lang('welcome__landing.agenda.items') as $index => $item): ?>
                        <div class="d-flex gap-4 <?= $index < count(lang('welcome__landing.agenda.items')) - 1 ? 'mb-5' : '' ?>">
                            <div style="min-width: 120px;">
                                <div class="fw-bold text-main-blue"><?= $item['date'] ?></div>
                                <div class="small text-secondary"><?= $item['time'] ?></div>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2"><?= $item['title'] ?></h5>
                                <p class="text-secondary small mb-0"><?= $item['description'] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Speakers Section -->
<div class="bg-light py-6">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-10">
                <h2 class="h3 fw-bold text-main-blue"><?= lang('welcome__landing.speakers.title') ?></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row g-4">
                    <?php foreach (lang('welcome__landing.speakers.items') as $speaker): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="bg-main-blue" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-person-circle text-white" style="font-size: 4rem;"></i>
                            </div>
                            <div class="card-body text-center p-4">
                                <h5 class="fw-bold mb-1"><?= $speaker['name'] ?></h5>
                                <div class="text-main-blue small fw-semibold mb-3"><?= $speaker['role'] ?></div>
                                <p class="small text-secondary mb-3"><?= $speaker['bio'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="bg-light py-6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <h2 class="h3 fw-bold mb-5 text-main-blue"><?= lang('welcome__landing.faq.title') ?></h2>
                <div class="accordion" id="faqAccordion">
                    <?php foreach (lang('welcome__landing.faq.items') as $index => $faq): ?>
                    <div class="accordion-item border-0 <?= $index < count(lang('welcome__landing.faq.items')) - 1 ? 'mb-3' : '' ?> shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= $index > 0 ? 'collapsed' : '' ?> fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $index + 1 ?>">
                                <?= $faq['question'] ?>
                            </button>
                        </h2>
                        <div id="faq<?= $index + 1 ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                <?= $faq['answer'] ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="gradient-bg-horizontal text-white mt-5">
    <div class="container py-5">
        <div class="row g-4 align-items-start justify-content-between">
            <div class="col-12 col-lg-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="bg-white text-main-blue rounded-3 px-3 py-2 fw-bold">GDE</div>
                    <div class="fw-semibold"><?= lang('welcome__footer.about_title') ?></div>
                </div>
                <div class="small"><?= lang('welcome__footer.about_text') ?></div>
            </div>
            <div class="col-12 col-lg-4 md-text-end">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="fw-bold mb-2"><?= lang('welcome__footer.quick_links') ?></div>
                        <div class="d-flex flex-column gap-2 small">
                            <?php foreach (lang('welcome__footer.quick_order') as $linkKey): ?>
                            <a class="text-white text-decoration-none" href="#"><?= lang('welcome__footer.links.' . $linkKey) ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="fw-bold mb-2"><?= lang('welcome__footer.contact_title') ?></div>
                        <div class="small">
                            <div><?= lang('welcome__footer.contact_city') ?></div>
                            <div><?= lang('welcome__footer.contact_email') ?></div>
                            <div><?= lang('welcome__footer.contact_phone') ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="border-white border-opacity-25 my-4">
        <div class="d-flex flex-column flex-md-row justify-content-between small">
            <div><?= lang('welcome__footer.copyright') ?></div>
            <div class="d-flex gap-3">
                <?php foreach (lang('welcome__footer.legal_order') as $linkKey): ?>
                <a class="text-white text-decoration-none" href="#"><?= lang('welcome__footer.links.' . $linkKey) ?></a>
                <?php endforeach; ?>
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
