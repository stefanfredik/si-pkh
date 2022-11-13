<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid py-4">
    <div class="row">
        <?= $validation->listErrors(); ?>
        <div class="col-md-8">
            <div class="card">
                <?= form_open("/user/password/" . $user['id']); ?>
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0"><?= $title; ?></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Password</label>
                                <input required name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?> " type="text" placeholder="Masukan Password Baru">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="/user" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>