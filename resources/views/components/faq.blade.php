    <div class="row justify-content-center">
        <div class="col-12">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 my-5">
                <div class="h4 fw-bold text-main-blue mb-4"><?= lang('welcome__info.title') ?></div>
                <div class="accordion" id="faqAccordion">
                    <?php foreach (lang('welcome__info.faq') as $index => $item): ?>
                    <div class="accordion-item border-0 mb-2">
                        <h2 class="accordion-header" id="heading<?= $index ?>">
                            <button class="accordion-button collapsed bg-light text-main-blue fw-semibold" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" 
                                    aria-expanded="false" aria-controls="collapse<?= $index ?>">
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