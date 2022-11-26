<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid py-4">
    <div class="row">
        <?= $validation->listErrors(); ?>
        <div class="col-md-8">
            <div class="card">
                <?= form_open("/user/" . $user['id']); ?>
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
                                <input required name="nama_user" class="form-control <?= $validation->hasError('nama_user') ? 'is-invalid' : ''; ?> " type="text" placeholder="Masukan Nama User" value="<?= empty(set_value('nama_user')) ? $user['nama_user'] : set_value('nama_user');  ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_user'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama NIK</label>
                                <input required name="no_nik" class="form-control <?= $validation->hasError('no_nik') ? 'is-invalid' : ''; ?> " type="text" placeholder="Masukan NIK" value="<?= empty(set_value('no_nik')) ? $user['no_nik'] : set_value('no_nik');  ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('no_nik'); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                                <select required name="jenis_kelamin" id="" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option <?= $user['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''; ?> value="Laki-Laki">Laki-Laki</option>
                                    <option <?= $user['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenis_kelamin'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jabatan</label>
                                <select name="jabatan" id="" class="form-control" required>
                                    <option value="" selected>Masukan Jabatan</option>
                                    <?php foreach ($role as $r) : ?>
                                        <option <?= $user['jabatan'] == $r['name'] ? 'selected' : ''; ?> value="<?= $r['id']; ?>"><?= $r['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Alamat</label>
                                <input required name="alamat" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?> " type="text" placeholder="Alamat" value="<?= empty(set_value('alamat')) ? $user['alamat'] : set_value('alamat');  ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor Telepon</label>
                                <input required name="telepon" class="form-control <?= $validation->hasError('telepon') ? 'is-invalid' : ''; ?> " type="text" placeholder="Masukan Nomor Telepon" value="<?= empty(set_value('nama_user')) ? $user['telepon'] : set_value('telepon');  ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('telepon'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input required name="username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?> " type="text" placeholder="Masukan User Name" value="<?= empty(set_value('nama_user')) ? $user['username'] : set_value('username');  ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
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