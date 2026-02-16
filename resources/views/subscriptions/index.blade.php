<div class="bg-main-blue gradient-bg-vertical my-5">
    <form enctype="multipart/form-data" method="POST" style="background: url('<?= public_file('images/base/cover.png') ?>') center center/cover no-repeat;">
        <?= csrf() ?>
        <div class="row justify-content-center py-5">
            <div class="col-12 col-lg-6">
                <div class="bg-white rounded-4 shadow p-4 p-md-5">
                    <div class="text-center fw-bold h1 text-main-blue mb-4"><?= lang('welcome__registration.title') ?>
                    </div>

                   

                    <div class="btn-group btn-group-toggle d-flex gap-2 mb-3" role="group">
                        <input type="radio" class="btn-check" name="registration_type" id="attendeeRegistration" value="attendee" autocomplete="off" required>
                        <label class="btn border border-main-blue text-main-blue flex-grow-1 text-center" for="attendeeRegistration">
                            <?= lang('welcome__registration.attendee') ?>
                        </label>

                        <input type="radio" class="btn-check" name="registration_type" id="speakerRegistration" value="speaker" autocomplete="off" required>
                        <label class="btn border border-main-blue text-main-blue flex-grow-1 text-center" for="speakerRegistration">
                            <?= lang('welcome__registration.speaker') ?>
                        </label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-main-blue"
                            for="regName"><?= lang('welcome__registration.name') ?></label>
                        <input class="form-control" id="regName" name="name" type="text" required
                            placeholder="<?= lang('welcome__registration.name') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-main-blue"
                            for="regEmail"><?= lang('welcome__registration.email') ?></label>
                        <input class="form-control" id="regEmail" name="email" type="email" required
                            placeholder="<?= lang('welcome__registration.email') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-main-blue"
                            for="regCompany"><?= lang('welcome__registration.company') ?></label>
                        <input class="form-control" id="regCompany" name="company" type="text" required
                            placeholder="<?= lang('welcome__registration.company') ?>">
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-main-blue"
                            for="regPhone"><?= lang('welcome__registration.phone') ?></label>
                        <input class="form-control" id="regPhone" name="phone" type="tel" required
                            placeholder="<?= lang('welcome__registration.phone') ?>">
                    </div>

                    <div id="speakerFields" class="mb-4 d-none">
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-main-blue" for="">
                                <?= lang('welcome__registration.speaker_talk_title') ?>
                            </label>
                            <input class="form-control" id="speaker_talk_title" name="speaker_talk_title" type="text" required
                                placeholder="<?= lang('welcome__registration.speaker_talk_title') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-main-blue" for="speaker_talk_summary">
                                <?= lang('welcome__registration.speaker_talk_summary') ?>
                            </label>
                            <textarea class="form-control" id="speaker_talk_summary" name="speaker_talk_summary" rows="3" required
                                placeholder="<?= lang('welcome__registration.speaker_talk_summary') ?>" required></textarea>
                        </div>
                    </div>

                    <div class="fw-semibold text-center mb-3 text-main-blue">
                        <?= lang('welcome__registration.select_conferences') ?>
                    </div>

                    <div class="d-flex flex-column gap-3 text-main-blue">
                        <?php foreach (lang('welcome__registration.conf_items') as $index => $item): ?>
                        <div class="d-flex align-items-center gap-3 border rounded-3 p-2">
                            <input class="form-check-input m-0 conf-check" type="checkbox" id="conf<?= $index + 1 ?>" name="conferences[]" value="<?= $item['value'] ?>" checked>
                            <div class="bg-main-blue text-main-blue rounded-3 px-3 py-2 fw-bold">
                                <img style="width: 50px;" src="<?= public_file('images/base/' . $item['fileName']) ?>"
                                    alt="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold"><?= $item['title'] ?></div>
                                <div class="small text-main-blue"><?= $item['meta'] ?></div>
                            </div>
                            <div class="small fw-semibold text-main-blue"><?= $item['date'] ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="form-check mt-4 text-main-blue">
                        <input class="form-check-input" type="checkbox" id="terms_agree" name="terms_agree" value="1" required>
                        <label class="form-check-label"
                            for="terms_agree"><?= lang('welcome__registration.agree') ?></label>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-lg text-white px-5 bg-main-blue rounded-pill" type="submit">
                            <?= lang('welcome__registration.submit') ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    (function() {
        var attendee = document.getElementById('attendeeRegistration');
        var speaker = document.getElementById('speakerRegistration');
        var speakerFields = document.getElementById('speakerFields');
        var speakerInputs = speakerFields ? speakerFields.querySelectorAll('input, textarea') : [];
        var confChecks = document.querySelectorAll('.conf-check');

        function updateConfRequired() {
            if (!confChecks.length) return;
            var anyChecked = Array.prototype.some.call(confChecks, function(el) {
                return el.checked;
            });
            confChecks[0].required = !anyChecked;
        }

        function setSpeakerMode(isSpeaker) {
            if (!speakerFields) return;
            speakerFields.classList.toggle('d-none', !isSpeaker);
            speakerInputs.forEach(function(el) {
                el.required = isSpeaker;
            });
        }

        if (attendee) {
            attendee.addEventListener('change', function() {
                if (attendee.checked) setSpeakerMode(false);
            });
        }

        if (speaker) {
            speaker.addEventListener('change', function() {
                if (speaker.checked) setSpeakerMode(true);
            });
        }

        setSpeakerMode(speaker && speaker.checked);
        updateConfRequired();

        confChecks.forEach(function(el) {
            el.addEventListener('change', updateConfRequired);
        });
    })();
</script>
