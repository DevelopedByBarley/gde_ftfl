<?php $program = lang('plenary__program'); ?>

<div class="accordion shadow" id="programScheduleAccordion" style="border-radius: 0.75rem; overflow: hidden;">
    <div class="accordion-item border-0">
        <h2 class="accordion-header" id="programScheduleHeading">
            <button class="accordion-button collapsed fw-bold text-white fs-5 py-4 px-4"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#programScheduleCollapse"
                aria-expanded="false"
                aria-controls="programScheduleCollapse"
                style="background: #0099ba; border-radius: 0;">
                <?= $program['toggle_label'] ?>
            </button>
        </h2>
        <div id="programScheduleCollapse" class="accordion-collapse collapse"
            aria-labelledby="programScheduleHeading"
            data-bs-parent="#programScheduleAccordion">
            <div class="accordion-body p-4" style="background: #f8feff;">

                <?php if (!empty($program['moderator'])): ?>
                <p class="small mb-3"><span class="text-muted">Moderátor:</span> <strong><?= $program['moderator'] ?></strong></p>
                <?php endif; ?>

                <?php foreach ($program['schedule'] as $item): ?>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="badge fw-semibold px-3 py-2 text-white"
                        style="background:#0099ba; min-width:115px; font-size:0.85rem; border-radius:2rem;">
                        <?= $item['time'] ?>
                    </span>
                    <span class="fw-semibold"><?= $item['title'] ?></span>
                    <?php if (!empty($item['speaker'])): ?>
                    <span class="fw-semibold">– <?= $item['speaker'] ?></span>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>

                <div class="table-responsive my-4">
                    <table class="table align-middle mb-0"
                        style="border-collapse: separate; border-spacing: 0; border-radius: 0.5rem; overflow: hidden; border: 2px solid #0099ba;">
                        <tbody>
                            <?php foreach ($program['plenary_talks'] as $i => $talk): ?>
                            <tr style="background: <?= $i % 2 === 0 ? '#ffffff' : '#eaf9fc' ?>;">
                                <?php if (!empty($talk['time'])): ?>
                                <td class="px-3 py-3 text-nowrap fw-semibold" style="border-color:#cde8ef; color:#006f88; font-size:0.85rem; width:115px;">
                                    <?= $talk['time'] ?>
                                </td>
                                <?php endif; ?>
                                <td class="px-3 py-3" style="border-color:#cde8ef;">
                                    <div class="fw-semibold" style="color:#006f88;"><?= $talk['speaker'] ?></div>
                                    <div class="small text-muted"><?= $talk['title'] ?></div>
                                </td>
                                <?php if (!empty($talk['talk_title'])): ?>
                                <td class="px-3 py-3" style="border-color:#cde8ef;">
                                    <?= $talk['talk_title'] ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php if (!empty($program['schedule_middle'])): ?>
                <?php foreach ($program['schedule_middle'] as $item): ?>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="badge fw-semibold px-3 py-2 text-white"
                        style="background:#0099ba; min-width:115px; font-size:0.85rem; border-radius:2rem;">
                        <?= $item['time'] ?>
                    </span>
                    <span class="fw-semibold"><?= $item['title'] ?></span>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>

                <?php if (!empty($program['plenary_talks_after'])): ?>
                <div class="table-responsive my-4">
                    <table class="table align-middle mb-0"
                        style="border-collapse: separate; border-spacing: 0; border-radius: 0.5rem; overflow: hidden; border: 2px solid #0099ba;">
                        <tbody>
                            <?php foreach ($program['plenary_talks_after'] as $i => $talk): ?>
                            <tr style="background: <?= $i % 2 === 0 ? '#ffffff' : '#eaf9fc' ?>;">
                                <?php if (!empty($talk['time'])): ?>
                                <td class="px-3 py-3 text-nowrap fw-semibold" style="border-color:#cde8ef; color:#006f88; font-size:0.85rem; width:115px;">
                                    <?= $talk['time'] ?>
                                </td>
                                <?php endif; ?>
                                <td class="px-3 py-3" style="border-color:#cde8ef;">
                                    <div class="fw-semibold" style="color:#006f88;"><?= $talk['speaker'] ?></div>
                                    <?php if (!empty($talk['title'])): ?>
                                    <div class="small text-muted"><?= $talk['title'] ?></div>
                                    <?php endif; ?>
                                </td>
                                <?php if (!empty($talk['talk_title'])): ?>
                                <td class="px-3 py-3" style="border-color:#cde8ef;">
                                    <?= $talk['talk_title'] ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>

                <?php foreach ($program['schedule_after'] as $item): ?>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="badge fw-semibold px-3 py-2 text-white"
                        style="background:#0099ba; min-width:115px; font-size:0.85rem; border-radius:2rem;">
                        <?= $item['time'] ?>
                    </span>
                    <span class="fw-semibold"><?= $item['title'] ?></span>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
