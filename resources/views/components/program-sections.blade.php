<?php
$sections = lang('plenary__program.sections');
$label    = lang('plenary__program.sections_label');
?>

<div class="accordion shadow" id="programSectionsAccordion" style="border-radius: 0.75rem; overflow: hidden;">
    <div class="accordion-item border-0">
        <h2 class="accordion-header" id="programSectionsHeading">
            <button class="accordion-button collapsed fw-bold text-white fs-5 py-4 px-4"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#programSectionsCollapse"
                aria-expanded="false"
                aria-controls="programSectionsCollapse"
                style="background: #0099ba; border-radius: 0;">
                <?= $label ?>
            </button>
        </h2>
        <div id="programSectionsCollapse" class="accordion-collapse collapse"
            aria-labelledby="programSectionsHeading"
            data-bs-parent="#programSectionsAccordion">
            <div class="accordion-body p-4" style="background: #f8feff;">

                <?php foreach ($sections as $section): ?>
                <div class="mb-5">

                    <h5 class="fw-bold mb-3" style="color:#0099ba;">
                        <?= $section['number'] ?>. <?= $section['title'] ?>
                    </h5>

                    <?php if (!empty($section['moderator'])): ?>
                    <p class="small mb-1"><span class="text-muted">Szekcióvezető:</span> <strong><?= $section['moderator'] ?></strong></p>
                    <?php endif; ?>
                    <?php if (!empty($section['room'])): ?>
                    <p class="small text-muted mb-2"><?= $section['room'] ?></p>
                    <?php endif; ?>

                    <div class="table-responsive mb-3">
                        <table class="table align-middle mb-0"
                            style="border-collapse: separate; border-spacing: 0; border-radius: 0.5rem; overflow: hidden; border: 2px solid #0099ba;">
                            <tbody>
                                <?php foreach ($section['speakers'] as $i => $spk): ?>
                                <?php if (!empty($spk['break'])): ?>
                                <tr style="background:#fff3cd;">
                                    <td class="px-3 py-2 text-nowrap fw-semibold" style="border-color:#ffe69c; color:#856404; font-size:0.85rem; width:115px;"><?= $spk['time'] ?></td>
                                    <td colspan="2" class="px-3 py-2 fw-semibold" style="border-color:#ffe69c; color:#856404;"><?= $spk['name'] ?></td>
                                </tr>
                                <?php elseif (!empty($spk['roundtable'])): ?>
                                <tr style="background:#e0f7fb;">
                                    <td class="px-3 py-2 text-nowrap fw-semibold" style="border-color:#cde8ef; color:#006f88; font-size:0.85rem; width:115px;"><?= $spk['time'] ?></td>
                                    <td class="px-3 py-2" style="border-color:#cde8ef;">
                                        <div class="fw-semibold" style="color:#006f88;"><?= $spk['name'] ?></div>
                                        <?php if (!empty($spk['role'])): ?><div class="small text-muted"><?= $spk['role'] ?></div><?php endif; ?>
                                    </td>
                                    <td class="px-3 py-2" style="border-color:#cde8ef;"></td>
                                </tr>
                                <?php else: ?>
                                <tr style="background: <?= $i % 2 === 0 ? '#ffffff' : '#eaf9fc' ?>;">
                                    <td class="px-3 py-3 text-nowrap fw-semibold" style="border-color:#cde8ef; color:#006f88; font-size:0.85rem; width:115px;"><?= $spk['time'] ?? '' ?></td>
                                    <td class="px-3 py-3" style="border-color:#cde8ef;">
                                        <div class="fw-semibold" style="color:#006f88;">
                                            <?= $spk['name'] ?>
                                            <?php if (!empty($spk['online'])): ?><span class="badge ms-1" style="background:#0099ba; font-size:0.7rem;">online</span><?php endif; ?>
                                        </div>
                                        <div class="small text-muted"><?= $spk['role'] ?><?= !empty($spk['institution']) ? ' · ' . $spk['institution'] : '' ?></div>
                                    </td>
                                    <td class="px-3 py-3" style="border-color:#cde8ef;"><?= $spk['talk_title'] ?? '' ?></td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
