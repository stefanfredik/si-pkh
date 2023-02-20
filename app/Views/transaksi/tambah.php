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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Warga</label>
                                <select id="'select-field'" required name="id_warga" class="form-control" data-live-search="true" type="text">
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
                                <label for="example-text-input" class="form-control-label">Pilih Jenis Transaksi</label>
                                <select required name="id_warga" class="form-control" data-live-search="true" type="text">
                                    <option value="">Pilih Transaksi</option>
                                    <option value="bantuanTunai">Bantuan Tunai</option>
                                    <option value="bantuanLansia">Bantuan Lansia</option>
                                    <option value="bantuanDisabilitas">Bantuan Disabilitas</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Jumlah Uang</label>
                                <input required name="jumlah" class="form-control" type="text" placeholder="Masukan Jumlah Uang">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tanggal Transaksi</label>
                                <input required name="tanggal_transaksi" class="form-control" type="date">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="" rows="5"></textarea>
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

<?= $this->section("script") ?>
<script>
    function pilihBantuan() {
        const jenisTransaksi = document.getElementById('jenisTransaksi');
        const inputBantuan = document.getElementById('inputbantuan');

        const bantuanTunai = document.getElementById("bantuanTunai");
        const bantuanLansia = document.getElementById("bantuanLansia");
        const bantuanDisabilitas = document.getElementById("bantuanDisabilitas");

        if (jenisBantuan.value == 'Bantuan Tunai') {
            inputBantuan.innerHTML = "";
            inputBantuan.appendChild(bantuanTunai);
            bantuanTunai.hidden = false;
        }

        if (jenisBantuan.value == 'Bantuan Disabilitas') {
            inputBantuan.innerHTML = "";

            inputBantuan.appendChild(bantuanDisabilitas);
            bantuanDisabilitas.hidden = false;
        }

        if (jenisBantuan.value == 'Bantuan Lansia') {
            inputBantuan.innerHTML = "";
            inputBantuan.appendChild(bantuanLansia);
            bantuanLansia.hidden = false;
        }

    }
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('#select-field').select2({
        theme: 'bootstrap-5'
    });
</script>
<?= $this->endSection() ?>


<?= $this->section("css") ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<?= $this->endSection() ?>