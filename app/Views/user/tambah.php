<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <?= form_open("/user", ['class' => "needs-validation"]); ?>
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah User</p>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Data User</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama User</label>
                                <input required name="nama_user" class="form-control <?= $validation->hasError('nama_user') ? 'is-invalid' : ''; ?> " type="text" placeholder="Masukan Nama User" value="<?= set_value('nama_user'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_user'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input required name="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?> " type="text" placeholder="Masukan User Name" value="<?= set_value('username'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jabatan</label>
                                <select required name="jabatan" id="" class="form-control">
                                    <option value="">Masukan Jabatan</option>
                                    <option <?= set_value('jabatan') == 'admin' ? 'selected' : ''; ?> value="admin">Admin</option>
                                    <option <?= set_value('jabatan') == 'pendamping' ? 'selected' : ''; ?> value="pendamping">Pendamping</option>
                                    <option <?= set_value('jabatan') == 'pengurus' ? 'selected' : ''; ?> value="pengurus">Pengurus</option>
                                    <option <?= set_value('jabatan') == 'kepaladesa' ? 'selected' : ''; ?> value="kepaladesa">Kepala Desa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Password</label>
                                <input required name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?> " placeholder="Masukan Password" type="password">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Ulangi Password</label>
                                <input required name="password2" class="form-control <?= $validation->hasError('password2') ? 'is-invalid' : ''; ?> " type="password" placeholder="Ulangi Password">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password2'); ?>
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