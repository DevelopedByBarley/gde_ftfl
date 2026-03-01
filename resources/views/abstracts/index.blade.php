<div class="bg-main-blue gradient-bg-vertical my-5">
    <form enctype="multipart/form-data" method="POST"
        style="background: url('<?= public_file('images/base/cover.png') ?>') center center/cover no-repeat;">
        <?= csrf() ?>
        <div class="row justify-content-center py-5">
            <div class="col-12 col-lg-6">
                <div class="bg-white rounded-4 shadow p-4 p-md-5">
                    <div class="text-center fw-bold h1 text-main-blue mb-4">Absztrakt feltöltés</div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-main-blue" for="abstractName">Név</label>
                        <input class="form-control" id="abstractName" name="name" type="text"
                            value="<?= old('name') ?>" required placeholder="Név">
                        <?= errors('name', session('errors')) ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-main-blue" for="abstractEmail">Email</label>
                        <input class="form-control" id="abstractEmail" name="email" type="email"
                            value="<?= old('email') ?>" required placeholder="Email">
                        <?= errors('email', session('errors')) ?>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fw-semibold text-main-blue" for="abstractFile">Absztrakt (PDF vagy Word)</label>
                        <input class="form-control" id="abstractFile" name="abstract_file" type="file" required
                            accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                        <?= errors('abstract_file', session('errors')) ?>
                    </div>
                    <div class="small text-main-blue mb-4">Max. 3 MB</div>

                    <div class="text-center mt-4">
                        <button class="btn btn-lg text-white px-5 bg-main-blue rounded-pill" type="submit">
                            Feltöltés
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

