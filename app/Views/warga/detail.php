<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <?= form_open("/" . $info['url'] . '/' . $warga['id']); ?>
                <div class="card-header pb-0">
                    <div class=" text-center">
                        <p class="mb-0 font-weight-bold text-capitalize"><?= $warga['nama_lengkap']; ?></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Jenis Bantuan</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['jenis_bantuan']; ?></p>
                        </div>
                    </div>

                    <p class="text-uppercase text-sm">Profil</p>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Pendamping</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['nama_user']; ?></p>
                        </div>
                    </div>

                    <hr class="horizontal dark my-1">

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Nama Lengkap</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['nama_lengkap']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['jenis_kelamin']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Tanggal Lahir</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['tanggal_lahir']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Nomor NIK</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['no_nik']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">No Kartu Keluarga</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['no_kk']; ?></p>
                        </div>
                    </div>
                    <!-- 
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Pendidikan</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['pendidikan']; ?></p>
                        </div>
                    </div> -->

                    <!-- <div class="row">
                        <div class="col-md-4">
                            <label for="">Pekerjaan</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['pekerjaan']; ?></p>
                        </div>
                    </div> -->

                    <!-- <div class="row">
                        <div class="col-md-4">
                            <label for="">Penghasilan</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['penghasilan']; ?></p>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">No Rekening</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['no_rek']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Telepon</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['no_telepon']; ?></p>
                        </div>
                    </div>

                    <hr class="horizontal dark my-1">
                    <p class="text-uppercase text-sm">Informasi Alamat</p>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['alamat']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">RT/RW</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['rt_rw']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Desa</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['desa']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Kecamatan</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['kecamatan']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Kabupaten</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['kabupaten']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Provinsi</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['provinsi']; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Kode Pos</label>
                        </div>
                        <div class="col-md-8">
                            <p for=""><?= $warga['kode_pos']; ?></p>
                        </div>
                    </div>

                    <hr class="horizontal dark my-1">
                </div>

                <div class="card-footer">
                    <a href="/<?= ($info['url']) ?>" class=" btn btn-secondary">Kembali</a>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>