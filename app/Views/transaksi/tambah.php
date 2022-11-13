<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <?= form_open("/" . $info['url'], ['class' => "needs-validation"]); ?>
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0"><?= $title; ?></p>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Profil</p>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Pendamping</label>
                                <select required name="pendamping" class="form-control" type="text">
                                    <option value="">Pilih Warga</option>
                                    <?php foreach ($dataWarga as $dt) : ?>
                                        <option value="<?= $dt['id']; ?>"><?= $dt['nama_lengkap']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jenis Bantuan</label>
                                <select required name="pendamping" class="form-control" type="text">
                                    <option value="">Pilih Bantuan</option>
                                    <option value="">Bantuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Periode</label>
                                <input required name="nama_lengkap" class="form-control" type="text" placeholder="Masukan Nama User">
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark my-1">

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