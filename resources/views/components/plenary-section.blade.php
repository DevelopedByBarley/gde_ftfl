<?php
$speakers = lang('plenary__speakers');
$colors = ['bg-teal-500', 'bg-main-blue', 'bg-main-green'];
?>

<div class="row justify-content-center g-4">
  <?php foreach ($speakers as $i => $speaker): ?>
    <?php $cardColor = $colors[$i % count($colors)]; ?>
    <div class="col-12 col-md-4">
      <?php require view_path('components/plenary-card') ?>
    </div>
  <?php endforeach; ?>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('plenary-modal');
    modal.addEventListener('show.bs.modal', function (e) {
      const card = e.relatedTarget;
      modal.querySelector('#plenary-modal-name').textContent        = card.dataset.name;
      modal.querySelector('#plenary-modal-title').textContent       = card.dataset.title;
      modal.querySelector('#plenary-modal-institution').textContent = card.dataset.institution;
      modal.querySelector('#plenary-modal-bio').textContent         = card.dataset.bio;
      modal.querySelector('#plenary-modal-img').src                 = card.dataset.image;
      modal.querySelector('#plenary-modal-img').alt                 = card.dataset.name;
      const header = modal.querySelector('#plenary-modal-header');
      header.className = header.className.replace(/bg-\S+/g, '');
      header.classList.add(card.dataset.color, 'text-white');
    });
  });
</script>

<!-- Plenary speaker modal -->
<div class="modal fade" id="plenary-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 rounded-4 overflow-hidden">
      <div class="modal-header text-white border-0 pb-2" id="plenary-modal-header">
        <div class="d-flex align-items-center gap-3">
          <img id="plenary-modal-img" src="" alt="" class="rounded-circle object-fit-cover" style="width:70px;height:70px;">
          <div>
            <h5 class="modal-title fw-bold text-uppercase mb-0" id="plenary-modal-name"></h5>
            <p class="small mb-0 opacity-75" id="plenary-modal-title"></p>
            <p class="small fw-semibold text-uppercase mb-0 opacity-75" id="plenary-modal-institution"></p>
          </div>
        </div>
        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-0 px-4 pb-4">
        <hr class="border-white opacity-25 mt-0">
        <p class="mb-0" id="plenary-modal-bio"></p>
      </div>
    </div>
  </div>
</div>
