<!-- Hero Banner -->
<div class="gradient-bg-vertical my-6" style="height: 400px;">
    <div class="wrapper h-100 w-100" style="background: url('<?= public_file('images/base/cover.png') ?>') center center/cover no-repeat;">
        <div class="container h-100" id="parallaxHero">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h1 class="text-center text-white fw-bold display-4 mb-3"><?= lang('welcome__registration.title') ?></h1>
                    <p class="text-center text-white lead mb-4">Csatlakozz a 2024-es év legnagyobb tech konferenciájához és fedezd fel az innováció jövőjét.</p>
                    <div class="text-center text-white-50 small mb-4">2024. június 15-17 · Budapest, Magyarország · Magyar & Angol</div>
                    <div class="text-center">
                        <a href="#registration" class="btn btn-lg bg-main-blue text-white rounded-pill px-5 me-3">Regisztrálj most</a>
                        <a href="#agenda" class="btn btn-lg border border-white text-white rounded-pill px-5">Program megtekintése</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Key Topics -->
<div class="container py-5 bg-light">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-main-blue mb-3">Konferencia Témái</h2>
                <p class="text-secondary">Fedezd fel az idei konferencia legfontosabb témaköreit</p>
            </div>

            <div class="row text-center g-4">
                <?php foreach (lang('welcome__topics') as $topic): ?>
                <div class="col-12 col-md-3">
                    <div class="fw-semibold text-main-blue mb-3"><?= $topic['title'] ?></div>
                    <div class="bg-main-blue text-white rounded-3 p-4 h-100 d-flex align-items-center justify-content-center">
                        <img style="width: 80px;" src="<?= public_file('images/base/' . $topic['fileName']) ?>" alt="">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Who Should Attend -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="bg-main-blue text-white rounded-4 p-5">
                <h3 class="fw-bold mb-3">Kinek szól a konferencia?</h3>
                <p class="mb-2">Szoftverfejlesztőknek, mérnököknek, product managereknek és tech vezetőknek, akik szeretnék felgyorsítani a digitális transzformációjukat. Ideális azok számára, akik az iparág legfrissebb trendjeivel és legjobb gyakorlataival szeretnének megismerkedni.</p>
                <p>Akár kezdő vagy tapasztalt szakember vagy, találsz majd olyan szekciót, amely releváns számodra.</p>
            </div>
        </div>
    </div>
</div>

<!-- Agenda Section -->
<div class="container py-5 bg-light">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <h2 class="text-center fw-bold text-main-blue mb-5" id="agenda">Program</h2>

            <div class="row g-4">
                <?php foreach (lang('welcome__conference_cards') as $card): ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="fw-bold text-main-blue mb-2"><?= $card['date'] ?></div>
                            <h5 class="card-title fw-bold text-main-blue"><?= $card['title'] ?></h5>
                            <p class="card-text small text-secondary"><?= $card['description'] ?></p>
                            <a href="#" class="btn btn-sm bg-main-blue text-white rounded-pill">Részletek</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Speakers Section -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-main-blue" id="speakers">Előadóink</h2>
        <p class="text-secondary">Hallgasd az iparág vezető szakértőit</p>
    </div>

    <div class="row g-4">
        <?php foreach (lang('welcome__speakers.cards') as $speaker): ?>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="rounded-circle bg-light mx-auto mb-3" style="width:96px;height:96px;"></div>
                    <div class="fw-bold"><?= $speaker['name'] ?></div>
                    <div class="text-main-blue small mb-2 fw-semibold"><?= $speaker['role'] ?></div>
                    <p class="small text-secondary mb-3"><?= $speaker['bio'] ?></p>
                    <a href="#" class="link-info small text-decoration-none"><?= $speaker['link'] ?></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Registration Section -->
<div class="gradient-bg-horizontal py-5 my-6" style="height: auto;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="bg-white rounded-4 shadow p-4 p-md-5">
                    <h3 class="text-center fw-bold h4 text-main-blue mb-4" id="registration">Regisztrálj most!</h3>

                    <form enctype="multipart/form-data" method="POST">
                        <?= csrf() ?>

                        <div class="btn-group btn-group-toggle d-flex gap-2 mb-3" role="group">
                            <input type="radio" class="btn-check" name="registration_type" id="attendeeRegistration" value="attendee" autocomplete="off" required>
                            <label class="btn border border-main-blue text-main-blue flex-grow-1 text-center" for="attendeeRegistration">
                                <?= lang('welcome__registration.attendee') ?>
                            </label>

                            <input type="radio" class="btn-check" name="registration_type" id="speakerRegistration" value="speaker" autocomplete="off" required>
                            <label class="btn border border-main-blue text-main-blue flex-grow-1 text-center" for="speakerRegistration">
                                <?= lang('welcome__registration.speaker') ?>
                            </label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-main-blue" for="regName"><?= lang('welcome__registration.name') ?></label>
                            <input class="form-control" id="regName" name="name" type="text" required placeholder="<?= lang('welcome__registration.name') ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-main-blue" for="regEmail"><?= lang('welcome__registration.email') ?></label>
                            <input class="form-control" id="regEmail" name="email" type="email" required placeholder="<?= lang('welcome__registration.email') ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-main-blue" for="regCompany"><?= lang('welcome__registration.company') ?></label>
                            <input class="form-control" id="regCompany" name="company" type="text" required placeholder="<?= lang('welcome__registration.company') ?>">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-main-blue" for="regPhone"><?= lang('welcome__registration.phone') ?></label>
                            <input class="form-control" id="regPhone" name="phone" type="tel" required placeholder="<?= lang('welcome__registration.phone') ?>">
                        </div>

                        <div id="speakerFields" class="mb-4 d-none">
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-main-blue"><?= lang('welcome__registration.speaker_talk_title') ?></label>
                                <input class="form-control" name="speaker_talk_title" type="text" placeholder="<?= lang('welcome__registration.speaker_talk_title') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-main-blue"><?= lang('welcome__registration.speaker_talk_summary') ?></label>
                                <textarea class="form-control" name="speaker_talk_summary" rows="3" placeholder="<?= lang('welcome__registration.speaker_talk_summary') ?>"></textarea>
                            </div>
                        </div>

                        <div class="fw-semibold text-center mb-3 text-main-blue"><?= lang('welcome__registration.select_conferences') ?></div>

                        <div class="d-flex flex-column gap-3 text-main-blue mb-4">
                            <?php foreach (lang('welcome__registration.conf_items') as $index => $item): ?>
                            <div class="d-flex align-items-center gap-3 border rounded-3 p-2">
                                <input class="form-check-input m-0 conf-check" type="checkbox" id="conf<?= $index + 1 ?>" name="conferences[]" value="<?= $item['title'] ?>">
                                <div class="bg-main-blue text-main-blue rounded-3 px-3 py-2 fw-bold">
                                    <img style="width: 50px;" src="<?= public_file('images/base/' . $item['fileName']) ?>" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold"><?= $item['title'] ?></div>
                                    <div class="small text-main-blue"><?= $item['meta'] ?></div>
                                </div>
                                <div class="small fw-semibold text-main-blue"><?= $item['date'] ?></div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="form-check mt-4 text-main-blue mb-4">
                            <input class="form-check-input" type="checkbox" id="terms_agree" name="terms_agree" value="1" required>
                            <label class="form-check-label" for="terms_agree"><?= lang('welcome__registration.agree') ?></label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-lg text-white px-5 bg-main-blue rounded-pill" type="submit">
                                <?= lang('welcome__registration.submit') ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="container py-5 bg-light">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <h2 class="text-center fw-bold text-main-blue mb-5" id="faq">Gyakran Feltett Kérdések</h2>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item border-main-blue">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-light text-main-blue fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Milyen a konferencia hossza?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            A konferencia 3 napig tart, június 15-17 között. Napi 4-5 szekcióból választhatsz.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-main-blue">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-light text-main-blue fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Szükséges valamit előre tanulmányozni?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Nem, a konferencia kezdőknek és tapasztalt szakembereknek egyaránt alkalmas. Azonban ajánlott az alapvető ismeretek.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-main-blue">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-light text-main-blue fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Van kedvezmény csapatoknak?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Igen, 5+ fős csapatoknak 15% kedvezmény jár. Vedd fel velünk a kapcsolatot: info@gdeconf.hu
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Section -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                <h4 class="fw-bold text-main-blue mb-4">Fontos Információk</h4>
                <div class="row g-4">
                    <div class="col-12 col-md-4">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-geo-alt-fill text-main-blue fs-5"></i>
                            <div>
                                <div class="fw-semibold text-main-blue">Helyszín</div>
                                <div class="small text-secondary">Budapest Convention Center, Fej ér Lipót u. 70</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-calendar-check text-main-blue fs-5"></i>
                            <div>
                                <div class="fw-semibold text-main-blue">Dátumok</div>
                                <div class="small text-secondary">2024. június 15-17, 09:00-17:00</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="d-flex align-items-start gap-3">
                            <i class="bi bi-clock text-main-blue fs-5"></i>
                            <div>
                                <div class="fw-semibold text-main-blue">Regisztráció</div>
                                <div class="small text-secondary">Nyitva: május 1. - június 14.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.164662355034!2d19.0345913128662!3d47.46538867105697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741ddbc0d16c253%3A0x22ff878b51b66df6!2sBudapest%2C%20Fej%C3%A9r%20Lip%C3%B3t%20u.%2070%2C%201119!5e1!3m2!1shu!2shu!4v1770116675474!5m2!1shu!2shu" style="border:0; width: 100%; height: 500px; border-radius: 1rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="gradient-bg-horizontal text-white mt-5">
    <div class="container py-5">
        <div class="row g-4 align-items-start mb-4">
            <div class="col-12 col-lg-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="bg-white text-main-blue rounded-3 px-3 py-2 fw-bold">GDE</div>
                    <div class="fw-semibold">Global Developer Conference</div>
                </div>
                <div class="small">Az iparág vezető tech konferenciája, ahol a legfrissebb innovációk és legjobb gyakorlatok találkoznak.</div>
            </div>
            <div class="col-6 col-lg-2">
                <div class="fw-bold mb-3">Gyorsmenü</div>
                <div class="d-flex flex-column gap-2 small">
                    <a class="text-white text-decoration-none" href="#agenda">Program</a>
                    <a class="text-white text-decoration-none" href="#speakers">Előadók</a>
                    <a class="text-white text-decoration-none" href="#registration">Regisztráció</a>
                    <a class="text-white text-decoration-none" href="#faq">GYIK</a>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="fw-bold mb-3">Kapcsolat</div>
                <div class="small">
                    <div class="mb-2">info@gdeconf.hu</div>
                    <div class="mb-2">+36 1 123 4567</div>
                    <div>Budapest, Magyarország</div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="fw-bold mb-3">Newsletter</div>
                <div class="small mb-2">Iratkozz fel, és kapj friss híreket a konferenciáról.</div>
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="E-mail cím">
                    <button class="btn btn-light text-main-blue fw-semibold" type="button">Feliratkozás</button>
                </div>
            </div>
        </div>
        <hr class="border-white border-opacity-25">
        <div class="d-flex flex-column flex-md-row justify-content-between small">
            <div>&copy; 2024 Global Developer Conference. Minden jog fenntartva.</div>
            <div class="d-flex gap-3 mt-3 mt-md-0">
                <a class="text-white text-decoration-none" href="#">Adatvédelem</a>
                <a class="text-white text-decoration-none" href="#">Felhasználási feltételek</a>
            </div>
        </div>
    </div>
</footer>

<script>
    (function() {
        var attendee = document.getElementById('attendeeRegistration');
        var speaker = document.getElementById('speakerRegistration');
        var speakerFields = document.getElementById('speakerFields');
        var speakerInputs = speakerFields ? speakerFields.querySelectorAll('input, textarea') : [];

        function setSpeakerMode(isSpeaker) {
            if (!speakerFields) return;
            speakerFields.classList.toggle('d-none', !isSpeaker);
            speakerInputs.forEach(function(el) {
                el.required = isSpeaker;
            });
        }

        if (attendee) {
            attendee.addEventListener('change', function() {
                if (attendee.checked) setSpeakerMode(false);
            });
        }

        if (speaker) {
            speaker.addEventListener('change', function() {
                if (speaker.checked) setSpeakerMode(true);
            });
        }

        setSpeakerMode(speaker && speaker.checked);
    })();

    // Parallax effect
    const parallaxHero = document.getElementById('parallaxHero');

    window.addEventListener('scroll', function() {
        const elementTop = parallaxHero.offsetTop;
        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;

        const distance = scrollY - (elementTop + windowHeight);
        const offset = -distance * 0.100;

        parallaxHero.style.transform = `translateY(${offset}px)`;
    });
</script>
