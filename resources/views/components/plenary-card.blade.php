<?php if (!empty($speaker['coming_soon'])): ?>

<div class="<?= $cardColor ?> text-white rounded-4 p-4 d-flex flex-column align-items-center text-center shadow gap-2 h-100 opacity-75">
  <div class="rounded-circle d-flex align-items-center justify-content-center bg-white bg-opacity-25" style="width:160px; height:160px;">
    <i class="fa-solid fa-user fs-1 opacity-50"></i>
  </div>
  <div class="mt-2 grow d-flex flex-column justify-content-center">
    <p class="fw-semibold fst-italic mb-0 opacity-75"><?= lang('plenary__coming_soon') ?></p>
  </div>
</div>

<?php else: ?>

<div class="<?= $cardColor ?> text-white rounded-4 p-4 d-flex flex-column align-items-center text-center shadow gap-2 h-100"
     role="button"
     style="cursor:pointer;"
     data-bs-toggle="modal"
     data-bs-target="#plenary-modal"
     data-name="<?= htmlspecialchars($speaker['name']) ?>"
     data-title="<?= htmlspecialchars($speaker['title']) ?>"
     data-institution="<?= htmlspecialchars($speaker['institution']) ?>"
     data-image="<?= public_file('images/plenary/' . $speaker['image']) ?>"
     data-bio="<?= htmlspecialchars($speaker['bio']) ?>"
     data-color="<?= $cardColor ?>">
  <?php if (!empty($speaker['image_scale']) && (int)$speaker['image_scale'] < 100): ?>
  <div class="rounded-circle border-3 border-white border-opacity-25 overflow-hidden" style="width:180px; height:180px; flex-shrink:0; background-color:rgba(255,255,255,0.15);">
    <img src="<?= public_file('images/plenary/' . $speaker['image']) ?>" alt="<?= htmlspecialchars($speaker['name']) ?>"
         style="width:100%; height:100%; object-fit:contain; object-position:<?= htmlspecialchars($speaker['image_position'] ?? 'center top') ?>;">
  </div>
  <?php else: ?>
  <div class="rounded-circle border-3 border-white border-opacity-25"
       style="width:180px; height:180px; flex-shrink:0;
              background-image: url('<?= public_file('images/plenary/' . $speaker['image']) ?>');
              background-size: cover;
              background-position: <?= htmlspecialchars($speaker['image_position'] ?? 'center center') ?>;
              background-repeat: no-repeat;">
  </div>
  <?php endif; ?>
  <div class="mt-2 grow d-flex flex-column justify-content-center gap-1">
    <h5 class="fw-bold text-uppercase mb-0"><?= htmlspecialchars($speaker['name']) ?></h5>
    <p class="small mb-0 opacity-75"><?= htmlspecialchars($speaker['title']) ?></p>
    <p class="small fw-semibold text-uppercase mb-0 opacity-75"><?= htmlspecialchars($speaker['institution']) ?></p>
  </div>
  <span class="btn btn-outline-light btn-sm mt-2 d-flex align-items-center gap-2">
    <i class="fa-solid fa-circle-info"></i> <?= lang('plenary__details') ?>
  </span>
</div>

<?php endif; ?>
