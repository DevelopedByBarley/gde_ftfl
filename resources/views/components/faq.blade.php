    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 mb-5 mt-3">
            <!-- Előadói információ -->
            <div class="accordion mb-3" id="speakerInfoAccordion">
                <div class="accordion-item border-0 shadow-sm">
                    <h2 class="accordion-header" id="speakerInfoHeading">
                        <button class="accordion-button collapsed fw-bold text-main-blue text-3xl mt-5" type="button"
                            data-bs-toggle="collapse" data-bs-target="#speakerInfoCollapse" aria-expanded="false"
                            aria-controls="speakerInfoCollapse">
                            <?= lang('speakerInfo__title') ?>
                        </button>
                    </h2>
                    <div id="speakerInfoCollapse" class="accordion-collapse collapse"
                        aria-labelledby="speakerInfoHeading" data-bs-parent="#speakerInfoAccordion">
                        <div class="accordion-body">
                            <!-- Absztrakt feltöltés -->
                            <div class="mb-4">
                                <h5 class="fw-bold text-main-blue mb-3"><?= lang('speakerInfo__abstract.upload.title') ?></h5>
                                <p class="text-secondary mb-3"><?= lang('speakerInfo__abstract.upload.description') ?></p>
                                <a href="<?= lang('speakerInfo__abstract.upload.url') ?>"
                                    class="btn bg-main-blue text-white fw-semibold px-4 py-2 rounded-pill">
                                    <?= lang('speakerInfo__abstract.upload.button') ?>
                                </a>
                            </div>

                            <!-- Absztrakt segédlet -->
                            <div>
                                <h5 class="fw-bold text-main-blue mb-3"><?= lang('speakerInfo__abstract.guide.title') ?></h5>
                                <p class="text-secondary mb-3"><?= lang('speakerInfo__abstract.guide.description') ?></p>
                                <a href="/public/documents/<?= lang('speakerInfo__abstract.guide.fileName') ?>" target="_blank"
                                    class="btn bg-main-blue text-white fw-semibold px-4 py-2 rounded-pill" download>
                                    <i class="bi bi-download me-2"></i><?= lang('speakerInfo__abstract.guide.button') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Gyakori kérdések -->
        <div class="col-12 col-lg-10 mt-2">
            <div class="accordion mb-3" id="mainFaqAccordion">
                <div class="accordion-item border-0 shadow-sm">
                    <h2 class="accordion-header" id="faqHeading">
                        <button class="accordion-button collapsed fw-bold text-main-blue text-3xl" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faqCollapse" aria-expanded="false"
                            aria-controls="faqCollapse">
                            <?= lang('welcome__info.title') ?>
                        </button>
                    </h2>
                    <div id="faqCollapse" class="accordion-collapse collapse" aria-labelledby="faqHeading"
                        data-bs-parent="#mainFaqAccordion">
                        <div class="accordion-body">
                            <div class="accordion" id="faqAccordion">
                                <?php foreach (lang('welcome__info.faq') as $index => $item): ?>
                                <div class="accordion-item border-0 mb-2">
                                    <h2 class="accordion-header" id="heading<?= $index ?>">
                                        <button class="accordion-button collapsed bg-light text-main-blue fw-semibold"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?= $index ?>" aria-expanded="false"
                                            aria-controls="collapse<?= $index ?>">
                                            <?= $item['question'] ?>
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $index ?>" class="accordion-collapse collapse"
                                        aria-labelledby="heading<?= $index ?>" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-secondary">
                                            <?= $item['answer'] ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
