<div class="container-fluid px-3 px-lg-5 py-4">

  <!-- Fejléc -->
  <div class="mb-4">
    <h2 class="fw-bold mb-0"><?= strtoupper(str_replace('_', ' ', EVENT_TYPE)) ?></h2>
    <p class="text-muted mb-0">Regisztrációs összesítő</p>
  </div>

  <!-- Stat kártyák -->
  <div class="row g-3 mb-4">
    <div class="col-12 col-sm-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center gap-3 py-3">
          <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="width:48px;height:48px;flex-shrink:0;">
            <i class="fa-solid fa-users text-secondary fs-5"></i>
          </div>
          <div>
            <div class="text-muted small">Összes regisztráció</div>
            <div class="fw-bold fs-3 lh-1"><?= $totalCount ?></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center gap-3 py-3">
          <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="width:48px;height:48px;flex-shrink:0;">
            <i class="fa-solid fa-microphone text-primary fs-5"></i>
          </div>
          <div>
            <div class="text-muted small">Előadók</div>
            <div class="fw-bold fs-3 lh-1 text-primary"><?= $speakerCount ?></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center gap-3 py-3">
          <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="width:48px;height:48px;flex-shrink:0;">
            <i class="fa-solid fa-ticket text-success fs-5"></i>
          </div>
          <div>
            <div class="text-muted small">Résztvevők</div>
            <div class="fw-bold fs-3 lh-1 text-success"><?= $attendeeCount ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-3">
    <!-- Megoszlás progress -->
    <div class="col-12 col-lg-5">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white border-bottom">
          <h6 class="mb-0 fw-semibold">Résztvevők megoszlása</h6>
        </div>
        <div class="card-body d-flex flex-column gap-4 py-4">
          <?php
          $total = $totalCount ?: 1;
          $speakerPct  = round($speakerCount  / $total * 100);
          $attendeePct = round($attendeeCount / $total * 100);
          $otherCount  = $totalCount - $speakerCount - $attendeeCount;
          $otherPct    = max(0, 100 - $speakerPct - $attendeePct);
          ?>
          <div>
            <div class="d-flex justify-content-between small mb-1">
              <span class="text-muted"><i class="fa-solid fa-microphone me-1 text-primary"></i>Előadók</span>
              <span class="fw-semibold"><?= $speakerCount ?> <span class="text-muted fw-normal">(<?= $speakerPct ?>%)</span></span>
            </div>
            <div class="progress" style="height:10px;border-radius:6px;">
              <div class="progress-bar bg-primary" style="width:<?= $speakerPct ?>%;border-radius:6px;"></div>
            </div>
          </div>
          <div>
            <div class="d-flex justify-content-between small mb-1">
              <span class="text-muted"><i class="fa-solid fa-ticket me-1 text-success"></i>Résztvevők</span>
              <span class="fw-semibold"><?= $attendeeCount ?> <span class="text-muted fw-normal">(<?= $attendeePct ?>%)</span></span>
            </div>
            <div class="progress" style="height:10px;border-radius:6px;">
              <div class="progress-bar bg-success" style="width:<?= $attendeePct ?>%;border-radius:6px;"></div>
            </div>
          </div>
          <?php if ($otherCount > 0) : ?>
          <div>
            <div class="d-flex justify-content-between small mb-1">
              <span class="text-muted"><i class="fa-solid fa-circle-question me-1 text-secondary"></i>Egyéb</span>
              <span class="fw-semibold"><?= $otherCount ?> <span class="text-muted fw-normal">(<?= $otherPct ?>%)</span></span>
            </div>
            <div class="progress" style="height:10px;border-radius:6px;">
              <div class="progress-bar bg-secondary" style="width:<?= $otherPct ?>%;border-radius:6px;"></div>
            </div>
          </div>
          <?php endif; ?>

          <hr class="my-2">

          <?php
          $inPersonPct = round($inPersonCount / $total * 100);
          $onlinePct   = round($onlineCount   / $total * 100);
          ?>
          <div>
            <div class="d-flex justify-content-between small mb-1">
              <span class="text-muted"><i class="fa-solid fa-building me-1 text-warning"></i>In-Person</span>
              <span class="fw-semibold"><?= $inPersonCount ?> <span class="text-muted fw-normal">(<?= $inPersonPct ?>%)</span></span>
            </div>
            <div class="progress" style="height:10px;border-radius:6px;">
              <div class="progress-bar bg-warning" style="width:<?= $inPersonPct ?>%;border-radius:6px;"></div>
            </div>
          </div>
          <div>
            <div class="d-flex justify-content-between small mb-1">
              <span class="text-muted"><i class="fa-solid fa-laptop me-1 text-info"></i>Online</span>
              <span class="fw-semibold"><?= $onlineCount ?> <span class="text-muted fw-normal">(<?= $onlinePct ?>%)</span></span>
            </div>
            <div class="progress" style="height:10px;border-radius:6px;">
              <div class="progress-bar bg-info" style="width:<?= $onlinePct ?>%;border-radius:6px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Napi regisztrációk chart -->
    <div class="col-12 col-lg-7">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-header bg-white border-bottom">
          <h6 class="mb-0 fw-semibold">Napi regisztrációk (utolsó 14 nap)</h6>
        </div>
        <div class="card-body">
          <canvas id="dailyChart" height="160"></canvas>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
(function () {
  const labels = <?= json_encode(array_keys($dailyCounts)) ?>;
  const data   = <?= json_encode(array_values($dailyCounts)) ?>;

  new Chart(document.getElementById('dailyChart'), {
    type: 'bar',
    data: {
      labels,
      datasets: [{
        label: 'Regisztrációk',
        data,
        backgroundColor: 'rgba(13,110,253,0.15)',
        borderColor: 'rgba(13,110,253,0.8)',
        borderWidth: 2,
        borderRadius: 6,
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { precision: 0 },
          grid: { color: 'rgba(0,0,0,0.05)' }
        },
        x: {
          grid: { display: false },
          ticks: {
            maxRotation: 45,
            callback: function(val, i) {
              return labels[i] ? labels[i].slice(5) : '';
            }
          }
        }
      }
    }
  });
})();
</script>
