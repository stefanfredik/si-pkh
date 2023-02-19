<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <?= form_open("/" . $info['url'] . "/" . $dana['id'], ['class' => "needs-validation"]); ?>
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0"><?= $title; ?></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Periode</label>
                                <select required name="periode" class="form-control" data-live-search="true" type="text">
                                    <option value="">Pilih Periode</option>
                                    <option <?= $dana['periode'] === 'Periode 1' ? 'selected' : ''; ?> value="Periode 1">Periode 1</option>
                                    <option <?= $dana['periode'] === 'Periode 2' ? 'selected' : ''; ?> value="Periode 2">Periode 2</option>
                                    <option <?= $dana['periode'] === 'Periode 3' ? 'selected' : ''; ?> value="Periode 3">Periode 3</option>
                                    <option <?= $dana['periode'] === 'Periode 4' ? 'selected' : ''; ?> value="Periode 4">Periode 4</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tahun</label>
                                <input required name="tahun" class="form-control" type="text" placeholder="Tahun" value="<?= $dana['tahun']; ?>">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jumlah Dana Awal</label>
                                <input required name="dana_awal" class="form-control" type="text" value="<?= $dana['dana_awal']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="" rows="5"><?= $dana['keterangan']; ?></textarea>
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