<?php $abs = lang('welcome__abstract_volume'); ?>

<div class="text-center py-4 my-5">
    <h4 class="fw-bold text-main-blue mb-1"><?= $abs['title'] ?></h4>
    <p class="text-muted small mb-3"><?= $abs['subtitle'] ?></p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="/public/documents/abstracts/FSFT-2026-HUN.pdf"
           target="_blank"
           class="btn bg-main-blue text-white fw-semibold px-4 py-2 rounded-pill">
            <i class="bi bi-file-earmark-pdf me-2"></i><?= $abs['btn_hu'] ?>
        </a>
        <a href="/public/documents/abstracts/FSFT-2026-ENG.pdf"
           target="_blank"
           class="btn btn-outline-secondary fw-semibold px-4 py-2 rounded-pill">
            <i class="bi bi-file-earmark-pdf me-2"></i><?= $abs['btn_en'] ?>
        </a>
    </div>
</div>
