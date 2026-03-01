<div class="container">
    <div class="d-flex flex-column h-lg-full">
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php require_once view_path('components/heading'); ?>

            <main class="pt-3 pb-5 bg-surface-secondary">
                <div class="container-fluid px-3 px-lg-5">
                    <div class="card border-0 shadow-sm mb-4">
                        <div
                            class="card-header d-flex flex-column flex-md-row align-items-md-center justify-content-between bg-white">
                            <div>
                                <h5 class="mb-1">Absztraktok</h5>
                                <p class="text-muted small mb-0">Beküldött absztraktok listája.</p>
                            </div>
                            <div>
                                <a href="/admin/abstracts/export" class="btn btn-outline-secondary">
                                    <i class="bi bi-file-earmark-spreadsheet me-2"></i>
                                    Exportálás Excelbe
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Név</th>
                                        <th>Email</th>
                                        <th>Típus</th>
                                        <th>Fájl</th>
                                        <th>Létrehozva</th>
                                        <th class="text-end">Műveletek</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($abstracts->data)) : ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">Nincs megjeleníthető
                                            absztrakt.</td>
                                    </tr>
                                    <?php else : ?>
                                    <?php foreach ($abstracts->data as $abstract) : ?>
                                    <tr>
                                        <td>#<?= $abstract->id ?></td>
                                        <td class="fw-semibold"><?= htmlspecialchars($abstract->name ?? '—') ?></td>
                                        <td><?= htmlspecialchars($abstract->email ?? '—') ?></td>
                                        <td>
                                            <span class="badge bg-light text-dark border">
                                                <?= htmlspecialchars($abstract->type ?? '—') ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?= htmlspecialchars($abstract->originalFileName ?? $abstract->fileName ?? '—') ?>
                                        </td>
                                        <td><?= !empty($abstract->created_at) ? date('Y.m.d H:i', strtotime($abstract->created_at)) : '—' ?>
                                        </td>
                                        <td class="text-end">
                                            <a href="/admin/abstracts/download/<?= $abstract->id ?>" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-download"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                            <?php if (!empty($abstracts->data)) : ?>
                            <div
                                class="card-footer border-0 py-4 d-flex flex-column flex-md-row align-items-center justify-content-between">
                                <?= paginate($abstracts) ?>
                                <span class="text-muted text-sm mt-2 mt-md-0">
                                    Showing <?= $abstracts->current_page ?> / <?= $abstracts->total_pages ?> items out
                                    of <?= $abstracts->total_records ?> results found
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
