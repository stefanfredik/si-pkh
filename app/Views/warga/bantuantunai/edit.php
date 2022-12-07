<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <?= form_open("/" . $info['url'] . '/' . $warga['id']); ?>
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0"><?= $title; ?></p>
                    </div>
                </div>

                <div class="card-body">
                    <p class="text-uppercase text-sm">Periode Bantuan</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jenis Periode</label>
                                <select class="form-control" name="periode" id="">
                                    <option value="" selected>Pilih Periode</option>
                                    <option <?= $warga['periode'] == 'Periode 1' ? 'selected' : ''; ?> value="Periode 1">Periode 1</option>
                                    <option <?= $warga['periode'] == 'Periode 2' ? 'selected' : ''; ?> value="Periode 2">Periode 2</option>
                                    <option <?= $warga['periode'] == 'Periode 3' ? 'selected' : ''; ?> value="Periode 3">Periode 3</option>
                                    <option <?= $warga['periode'] == 'Periode 4' ? 'selected' : ''; ?> value="Periode 4">Periode 4</option>
                                    <option <?= $warga['periode'] == 'Periode 5' ? 'selected' : ''; ?> value="Periode 5">Periode 5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tahun</label>
                                <input value="<?= $warga['tahun']; ?>" required name="tahun" class="form-control" type="number" placeholder="Masukan Tahun">
                            </div>
                        </div>
                    </div>

                    <p class="text-uppercase text-sm">Profil</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Lengkap</label>
                                <input value="<?= $warga['nama_lengkap']; ?>" required name="nama_lengkap" class="form-control" type="text" placeholder="Masukan Nama User">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jenis</label>
                                <select class="form-control" name="jenis_kelamin" id="">
                                    <option value="" selected>Pilih Jenis Kelamin</option>
                                    <option <?= ($warga['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''); ?> value="Perempuan">Perempuan</option>
                                    <option <?= ($warga['jenis_kelamin'] == 'Laki-Laki' ? 'selected' : ''); ?> value="Laki-Laki">Laki-Laki</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                                <input value="<?= $warga['tanggal_lahir']; ?>" required name="tanggal_lahir" class="form-control" type="date">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">NIK</label>
                                <input value="<?= $warga['no_nik']; ?>" required name="no_nik" class="form-control" type="number">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor KK</label>
                                <input value="<?= $warga['no_kk']; ?>" required name="no_kk" class="form-control" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Telepon</label>
                                <input value="<?= $warga['no_telepon']; ?>" required name="no_telepon" class="form-control" type="number">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">No Rekening</label>
                                <input value="<?= $warga['no_rek']; ?>" required name="no_rek" class="form-control" type="number">
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark my-1">
                    <p class="text-uppercase text-sm">Informasi Alamat</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Alamat</label>
                                <input value="<?= $warga['alamat']; ?>" required name="alamat" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">RT/RW</label>
                                <input value="<?= $warga['rt_rw']; ?>" required name="rt_rw" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Desa</label>
                                <input value="<?= $warga['desa']; ?>" required name="desa" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kecamamatan</label>
                                <input value="<?= $warga['kecamatan']; ?>" required name="kecamatan" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kabupaten</label>
                                <input value="<?= $warga['kabupaten']; ?>" required name="kabupaten" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Provinsi</label>
                                <input value="<?= $warga['provinsi']; ?>" required name="provinsi" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kode Pos</label>
                                <input value="<?= $warga['kode_pos']; ?>" required name="kode_pos" class="form-control" type="number">
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark my-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Pendamping</label>
                                <select required name="pendamping" class="form-control" type="text">
                                    <option value="">Pilih Pendamping</option>
                                    <?php foreach ($dataPendamping as $dt) : ?>
                                        <option <?= ($warga['pendamping'] == $dt['id']) ? 'selected' : ''; ?> value="<?= $dt['id']; ?>"><?= $dt['nama_user']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="/<?= ($info['url']) ?>" class=" btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>