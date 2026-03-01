<?php
$confItems = lang('welcome__registration.all_conf_items') ?? [];
$valueToTitle = [];
foreach ($confItems as $item) {
  if (isset($item['value'], $item['title'])) {
    $valueToTitle[$item['value']] = $item['title'];
  }
}
$confValues = json_decode($subscriber->conferences ?? '[]', true);
$confValues = is_array($confValues) ? $confValues : [];
$confTitles = array_map(function ($value) use ($valueToTitle) {
  return $valueToTitle[$value] ?? $value;
}, $confValues);
?>

<div class="container py-3">
  <?php require_once view_path('components/heading'); ?>
</div>

<div class="container-fluid pb-5 px-3 px-md-4">
  <div class="row justify-content-center">
    <div class="col-xl-9 col-xxl-8">
      <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
          <div>
            <p class="text-uppercase text-muted small mb-1">Feliratkozó</p>
            <h4 class="mb-1 fw-bold d-flex align-items-center gap-2">
              <i class="bi bi-person-badge text-primary"></i>
              <span><?= htmlspecialchars($subscriber->name ?? 'Feliratkozó') ?></span>
            </h4>
            <p class="text-muted small mb-0 d-flex align-items-center gap-1">
              <i class="bi bi-envelope"></i>
              <?= htmlspecialchars($subscriber->email ?? '') ?>
            </p>
          </div>
          <div class="d-flex gap-2">
            <a href="/admin/subscribers" class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-arrow-left"></i> Vissza
            </a>
          </div>
        </div>
        <div class="card-body bg-light-subtle">
          <div class="row g-4">
            <div class="col-lg-7">
              <div class="mb-3">
                <h6 class="fw-bold">Alap adatok</h6>
                <ul class="list-unstyled mb-0 text-muted">
                  <li><strong>Név:</strong> <?= htmlspecialchars($subscriber->name ?? '—') ?></li>
                  <li><strong>Email:</strong> <?= htmlspecialchars($subscriber->email ?? '—') ?></li>
                  <li><strong>Cég:</strong> <?= htmlspecialchars($subscriber->company ?? '—') ?></li>
                  <li><strong>Telefon:</strong> <?= htmlspecialchars($subscriber->phone ?? '—') ?></li>
                  <li><strong>Típus:</strong>
                    <span class="badge bg-light text-dark border"><?= htmlspecialchars($subscriber->registration_type ?? '—') ?></span>
                  </li>
                </ul>
              </div>

              <div class="mb-0">
                <h6 class="fw-bold">Konferenciák</h6>
                <div class="d-flex flex-wrap gap-2">
                  <?php if (empty($confTitles)) : ?>
                  <span class="text-muted">—</span>
                  <?php else : ?>
                  <?php foreach ($confTitles as $title) : ?>
                  <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">
                    <?= htmlspecialchars($title) ?>
                  </span>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="col-lg-5">
              <div class="mb-3">
                <h6 class="fw-bold">Meta</h6>
                <ul class="list-unstyled mb-0 text-muted">
                  <li><strong>ID:</strong> <?= htmlspecialchars($subscriber->id ?? '—') ?></li>
                  <li><strong>Létrehozva:</strong> <?= htmlspecialchars($subscriber->created_at ?? '—') ?></li>
                </ul>
              </div>

              <?php if (!empty($subscriber->speaker_talk_title) || !empty($subscriber->speaker_talk_summary)) : ?>
              <div class="mb-0">
                <h6 class="fw-bold">Előadás adatok</h6>
                <ul class="list-unstyled mb-0 text-muted">
                  <li><strong>Cím:</strong> <?= htmlspecialchars($subscriber->speaker_talk_title ?? '—') ?></li>
                  <li><strong>Összefoglaló:</strong> <?= htmlspecialchars($subscriber->speaker_talk_summary ?? '—') ?></li>
                </ul>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
