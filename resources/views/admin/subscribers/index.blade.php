<?php
$confItems = lang('welcome__registration.all_conf_items') ?? [];
$valueToTitle = [];
foreach ($confItems as $item) {
    if (isset($item['value'], $item['title'])) {
        $valueToTitle[$item['value']] = $item['title'];
    }
}
?>

<div class="container">
    <div class="d-flex flex-column h-lg-full">
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php require_once view_path('components/heading'); ?>

            <main class="pt-3 pb-5 bg-surface-secondary">
                <div class="container-fluid px-3 px-lg-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-2">
                                <a href="/admin/subscribers/export/attendees" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-download me-1"></i><?= EVENT_TYPE ?> Résztvevők exportálása
                                </a>
                                <a href="/admin/subscribers/export/speakers" class="btn btn-outline-info btn-sm">
                                    <i class="bi bi-download me-1"></i><?= EVENT_TYPE ?> Előadók exportálása
                                </a>
                                <a href="/admin/subscribers/export/full"
                                    class="btn btn-outline-success btn-sm">
                                    <i class="bi bi-download me-1"></i><?= EVENT_TYPE ?> összes exportálása
                                </a>
                                <a href="/admin/subscribers/export/all" class="btn btn-primary btn-sm">
                                    <i class="bi bi-download me-1"></i>Összes event export
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm mb-4">
                        <div
                            class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between bg-white">
                            <div>
                                <h5 class="mb-1">Feliratkozók</h5>
                                <p class="text-muted small mb-0">Konferencia feliratkozók listája és exportálása.</p>
                            </div>
                            <form class="d-flex" method="GET" action="">
                                <input type="text" name="search" class="form-control form-control-sm me-2"
                                    placeholder="Keresés név, email, cég, telefon"
                                    value="<?= htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                <button class="btn btn-outline-secondary btn-sm d-flex" type="submit">
                                    <i class="bi bi-search me-1"></i>Keresés
                                </button>
                            </form>
                        </div>


                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Név</th>
                                        <th>Email</th>
                                        <th>Cég</th>
                                        <th>Telefon</th>
                                        <th>Típus</th>
                                        <th>Konferenciák</th>
                                        <th>Létrehozva</th>
                                        <th class="text-end">Műveletek</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($subscribers->data)) : ?>
                                    <tr>
                                        <td colspan="9" class="text-center py-4 text-muted">Nincs megjeleníthető
                                            feliratkozó.</td>
                                    </tr>
                                    <?php else : ?>
                                    <?php foreach ($subscribers->data as $subscriber) : ?>
                                    <?php
                                    $confValues = json_decode($subscriber->conferences ?? '[]', true);
                                    $confValues = is_array($confValues) ? $confValues : [];
                                    $confTitles = array_map(function ($value) use ($valueToTitle) {
                                        return $valueToTitle[$value] ?? $value;
                                    }, $confValues);
                                    ?>
                                    <tr>
                                        <td>#<?= $subscriber->id ?></td>
                                        <td class="fw-semibold"><?= htmlspecialchars($subscriber->name ?? '—') ?></td>
                                        <td><?= htmlspecialchars($subscriber->email ?? '—') ?></td>
                                        <td><?= htmlspecialchars($subscriber->company ?? '—') ?></td>
                                        <td><?= htmlspecialchars($subscriber->phone ?? '—') ?></td>
                                        <td>
                                            <span class="badge bg-light text-dark border">
                                                <?= htmlspecialchars($subscriber->registration_type ?? '—') ?>
                                            </span>
                                        </td>
                                        <td><?= htmlspecialchars(implode(', ', $confTitles) ?: '—') ?></td>
                                        <td><?= !empty($subscriber->created_at) ? date('Y.m.d H:i', strtotime($subscriber->created_at)) : '—' ?>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-1">
                                                <!-- <a href="/admin/subscribers/<?= $subscriber->id ?>" class="btn btn-outline-primary btn-sm">
                          <i class="bi bi-eye"></i>
                        </a> -->
                                                <!--
                        <form action="/admin/subscribers/<?= $subscriber->id ?>" method="POST" class="d-inline">
                          <?= csrf() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-outline-danger btn-sm"
                            onclick="return confirm('Biztosan törlöd?');">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                        -->
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                            <?php if (!empty($subscribers->data)) : ?>
                            <div
                                class="card-footer border-0 py-4 d-flex flex-column flex-md-row align-items-center justify-content-between">
                                <?= paginate($subscribers) ?>
                                <span class="text-muted text-sm mt-2 mt-md-0">
                                    Showing <?= $subscribers->current_page ?> / <?= $subscribers->total_pages ?> items
                                    out of <?= $subscribers->total_records ?> results found
                                </span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
