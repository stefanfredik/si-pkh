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
                    <p class="text-uppercase text-sm"><?= $info['title']; ?></p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Bantuan</label>
                                <input required name="nama_bantuan" class="form-control" type="text" placeholder="Masukan Nama Bantuan">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Pengurus</label>
                                <select name="id_pengurus" class="form-control">
                                    <option value="">Pilih Pengurus</option>
                                    <?php foreach ($dataPengurus as $dt) : ?>
                                        <option value="<?= $dt['id']; ?>"><?= $dt['nama_user']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Keterangan</label>
                                <input required name="keterangan" class="h-5 form-control" type="text" placeholder="Keterangan">
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