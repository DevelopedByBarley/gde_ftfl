<?php
$statCards = [
  [
    'label' => 'Adminok',
    'value' => $stats['admins'] ?? 0,
    'icon' => 'bi-people',
    'color' => 'primary',
  ],
  [
    'label' => 'Feliratkozók',
    'value' => $stats['subscribers'] ?? 0,
    'icon' => 'bi-envelope-paper',
    'color' => 'success',
  ],
  [
    'label' => 'Absztraktok',
    'value' => $stats['abstracts'] ?? 0,
    'icon' => 'bi-file-earmark-text',
    'color' => 'info',
  ],
  [
    'label' => 'Aktivitások',
    'value' => $stats['activities'] ?? 0,
    'icon' => 'bi-activity',
    'color' => 'warning',
  ],
];
?>

<div class="container p-0">
  <div class="d-flex flex-column h-lg-full">
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
      <?php require_once view_path('components/heading'); ?>

      <main class="pt-4 pb-6 bg-surface-secondary">
        <div class="container-fluid px-3 px-lg-5">
          <div class="row g-3 g-lg-4 mb-5">
            <?php foreach ($statCards as $card): ?>
            <div class="col-12 col-sm-6 col-xl-3">
              <div class="card shadow-sm border-0 h-100 hover-lift">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                  <div>
                    <span class="text-muted text-uppercase fw-semibold small"><?= $card['label'] ?></span>
                    <div class="fs-3 fw-bold mb-0"><?= (int) $card['value'] ?></div>
                  </div>
                  <div class="icon icon-shape bg-<?= $card['color'] ?> text-white rounded-circle p-3">
                    <i class="bi <?= $card['icon'] ?>"></i>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <div class="row g-4 mb-5">
            <div class="col-12 col-xl-8">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                  <div>
                    <h5 class="mb-1 fw-bold">Legutóbbi feliratkozók</h5>
                    <p class="text-muted small mb-0">A legfrissebb konferencia feliratkozások.</p>
                  </div>
                  <a href="/admin/subscribers" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-arrow-right-short"></i>Összes feliratkozó
                  </a>
                </div>
                <div class="table-responsive">
                  <table class="table align-middle mb-0">
                    <thead class="table-light">
                      <tr>
                        <th class="py-3">Név</th>
                        <th class="py-3">Email</th>
                        <th class="py-3">Létrehozva</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (empty($recentSubscribers)): ?>
                      <tr>
                        <td colspan="3" class="text-center text-muted py-5">Nincs megjeleníthető feliratkozó.</td>
                      </tr>
                      <?php else: ?>
                      <?php foreach ($recentSubscribers as $subscriber): ?>
                      <tr>
                        <td class="fw-semibold py-3"><?= htmlspecialchars($subscriber->name ?? '—') ?></td>
                        <td class="py-3"><?= htmlspecialchars($subscriber->email ?? '—') ?></td>
                        <td class="py-3">
                          <?= !empty($subscriber->created_at) ? date('Y.m.d H:i', strtotime($subscriber->created_at)) : '—' ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-12 col-xl-4">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                  <h5 class="mb-0 fw-bold">Legutóbbi absztraktok</h5>
                  <a href="/admin/abstracts" class="btn btn-outline-secondary btn-sm">Lista</a>
                </div>
                <div class="list-group list-group-flush">
                  <?php if (empty($recentAbstracts)): ?>
                  <div class="list-group-item text-muted text-center py-5">Nincs megjeleníthető absztrakt.</div>
                  <?php else: ?>
                  <?php foreach ($recentAbstracts as $abstract): ?>
                  <div class="list-group-item d-flex justify-content-between align-items-start py-3">
                    <div class="me-2">
                      <div class="fw-semibold"><?= htmlspecialchars($abstract->name ?? '—') ?></div>
                      <div class="text-muted small"><?= htmlspecialchars($abstract->email ?? '') ?></div>
                      <div class="text-muted small">
                        <?= htmlspecialchars($abstract->originalFileName ?? $abstract->fileName ?? '') ?>
                      </div>
                    </div>
                    <div class="text-end">
                      <div class="text-muted small">
                        <?= !empty($abstract->created_at) ? date('Y.m.d', strtotime($abstract->created_at)) : '' ?>
                      </div>
                      <a href="/admin/abstracts/download/<?= $abstract->id ?>" class="btn btn-sm btn-outline-primary mt-2">
                        <i class="bi bi-download"></i>
                      </a>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-4">
            <div class="col-12 col-xl-8">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                  <div>
                    <h5 class="mb-1 fw-bold">Legutóbbi aktivitások</h5>
                    <p class="text-muted small mb-0">Admin műveletek és rendszer események.</p>
                  </div>
                  <a href="/admin/activities" class="btn btn-outline-primary btn-sm">Naplók</a>
                </div>
                <div class="table-responsive">
                  <table class="table align-middle mb-0">
                    <thead class="table-light">
                      <tr>
                        <th class="py-3">Akció</th>
                        <th class="py-3">Státusz</th>
                        <th class="py-3">Leírás</th>
                        <th class="py-3">Létrehozva</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (empty($recentActivities)): ?>
                      <tr>
                        <td colspan="4" class="text-center text-muted py-5">Nincs aktivitás bejegyzés.</td>
                      </tr>
                      <?php else: ?>
                      <?php foreach ($recentActivities as $activity): ?>
                      <?php
                        $status = strtolower($activity->status ?? '');
                        if ($status === 'success') {
                          $badgeClass = 'bg-success-subtle text-success border-success-subtle';
                        } elseif ($status === 'failed' || $status === 'error') {
                          $badgeClass = 'bg-danger-subtle text-danger border-danger-subtle';
                        } else {
                          $badgeClass = 'bg-secondary-subtle text-secondary border-secondary-subtle';
                        }
                      ?>
                      <tr>
                        <td class="fw-semibold py-3"><?= htmlspecialchars($activity->action ?? '—') ?></td>
                        <td class="py-3">
                          <span class="badge <?= $badgeClass ?> border"><?= $activity->status ?? '—' ?></span>
                        </td>
                        <td class="py-3 text-truncate" style="max-width: 260px;">
                          <?= htmlspecialchars($activity->description ?? '—') ?>
                        </td>
                        <td class="py-3">
                          <?= !empty($activity->created_at) ? date('Y.m.d H:i', strtotime($activity->created_at)) : '—' ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-12 col-xl-4">
              <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                  <h5 class="mb-0 fw-bold">Legutóbbi adminok</h5>
                  <a href="/admins" class="btn btn-outline-secondary btn-sm">Lista</a>
                </div>
                <div class="list-group list-group-flush">
                  <?php if (empty($recentAdmins)): ?>
                  <div class="list-group-item text-muted text-center py-5">Nincs admin felhasználó.</div>
                  <?php else: ?>
                  <?php foreach ($recentAdmins as $admin): ?>
                  <div class="list-group-item d-flex justify-content-between align-items-start py-3">
                    <div class="me-2">
                      <div class="fw-semibold"><?= htmlspecialchars($admin->name ?? '—') ?></div>
                      <div class="text-muted small"><?= htmlspecialchars($admin->email ?? '') ?></div>
                    </div>
                    <div class="text-end">
                      <span class="badge bg-light text-dark border"><?= htmlspecialchars($admin->role ?? '—') ?></span>
                      <div class="text-muted small">
                        <?= !empty($admin->created_at) ? date('Y.m.d', strtotime($admin->created_at)) : '' ?>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</div>
