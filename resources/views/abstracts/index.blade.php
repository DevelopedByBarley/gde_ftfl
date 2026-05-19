<div class="bg-main-blue gradient-bg-vertical my-5">
    <form enctype="multipart/form-data" method="POST"
        style="background: url('<?= public_file('images/base/cover.png') ?>') center center/cover no-repeat;">
        <?= csrf() ?>
        <div class="row justify-content-center py-5">
            <div class="col-12 col-lg-6">
                <div class="bg-white rounded-4 shadow p-4 p-md-5">
                    <div class="text-center fw-bold h1 text-main-blue mb-4"><?= lang('abstract__title') ?></div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-main-blue"
                            for="abstractName"><?= lang('abstract__fields.name') ?></label>
                        <input class="form-control" id="abstractName" name="name" type="text"
                            data-validate="required|string|min:3|max:100" value="<?= old('name') ?>" required
                            placeholder="<?= lang('abstract__placeholders.name') ?>">
                        <?= errors('name', session('errors')) ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-main-blue"
                            for="abstractEmail"><?= lang('abstract__fields.email') ?></label>
                        <input class="form-control" id="abstractEmail" name="email" type="email"
                            data-validate="required|email|max:255" value="<?= old('email') ?>" required
                            placeholder="<?= lang('abstract__placeholders.email') ?>">
                        <?= errors('email', session('errors')) ?>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fw-semibold text-main-blue"
                            for="abstractFile"><?= lang('abstract__fields.file') ?></label>
                        <input class="form-control" id="abstractFile" name="abstract_file" type="file" required
                            accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                        <?= errors('abstract_file', session('errors')) ?>
                    </div>
                    <div class="small text-main-blue mb-4"><?= lang('abstract__file_size') ?></div>

                    <hr class="my-3">

                    <div class="mb-4">
                        <h6 class="fw-bold text-main-blue mb-2"><?= lang('speakerInfo__abstract.guide.title') ?></h6>
                        <p class="text-secondary small mb-3"><?= lang('speakerInfo__abstract.guide.description') ?></p>
                        <a href="/public/documents/<?= lang('speakerInfo__abstract.guide.fileName') ?>" target="_blank"
                            class="btn btn-outline-secondary btn-sm rounded-pill" download>
                            <i class="bi bi-download me-1"></i><?= lang('speakerInfo__abstract.guide.button') ?>
                        </a>
                    </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-lg text-white px-5 bg-main-blue rounded-pill" type="submit">
                            <?= lang('abstract__submit') ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
