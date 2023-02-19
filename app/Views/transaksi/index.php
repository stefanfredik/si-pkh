<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<?php $transaksiModel = new App\Models\TransaksiModel() ?>

<!-- <a href="/<?= $info['url']; ?>/tambah" class="btn btn-outline-white">Tambah Data <?= $info['title']; ?></a> -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-bold">Dana Bantuan Tunai</div>
            <div class="card-body border rounded">
                <div class="row mt-1">
                    <div class="col">Jumlah Dana Awal</div>
                    <div class="col text-bold"><?= rupiah($totalDana) ?></div>
                </div>

                <div class="row mt-1">
                    <div class="col">Dana Terpakai</div>
                    <div class="col text-bold"><?php $danaterpakai = $transaksiModel->allDanaTerpakai()['jumlah'];
                                                echo rupiah($danaterpakai) ?></div>
                </div>

                <div class="row mt-1">
                    <div class="col">Sisa Dana</div>
                    <div class="col text-bold"><?= rupiah($totalDana - $danaterpakai); ?></div>
                </div>

                <div class="row mt-1">
                    <div class="col">Jumlah Peserta yang telah menerima Dana Tunai</div>
                    <div class="col text-bold"><?= $jumPenerima ?> Peserta</div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mt-2">
                    <a href="/dana" class="badge bg-primary">Kelola Dana</a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Bantuan Tunai</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Bantuan Lansia</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Bantuan Disabilitas</button>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <a href="/bantuantunai/transaksi/tambah" class="m-2 btn bg-primary btn-outline-white">Transaksi Baru</a>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?= $title; ?></h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2  ">
                <div class="table-responsive p-0">
                    <table id="table" class="table align-items-center mb-0 border">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Transaksi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pendamping</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Rekening</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Transaksi</th>
                                <th width="150px" class="text-uppercase  text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            helper('rupiah');
                            $no = 1;
                            foreach ($dataTransaksi as $dt) :  ?>
                                <tr>
                                    <td class="text-secondary text-xs"><?= $no++; ?></td>
                                    <td class="text-secondary text-xs"><?= str_pad($dt['id'], 4, '0', STR_PAD_LEFT); ?></td>
                                    <td class="text-secondary text-xs"><?= $dt['no_nik']; ?></td>
                                    <td class="text-secondary text-xs"><?= $dt['nama_lengkap']; ?></td>
                                    <td class="text-secondary text-xs"><?= $dt['nama_pendamping']; ?></td>
                                    <td class="text-secondary text-xs"><?= $dt['no_rek']; ?></td>
                                    <td class="text-secondary text-xs"><?= rupiah($dt['jumlah']); ?></td>
                                    <td class="text-secondary text-xs" class=""><?= $dt['tanggal_transaksi']; ?></td>
                                    <?= view_cell('\App\Libraries\Widget::tombolAksi', ['url' => 'bantuantunai/transaksi', 'id' => $dt['id']]); ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <a href="/lansia/transaksi/tambah" class="m-2 btn bg-primary btn-outline-white">Transaksi Baru</a>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?= $title; ?></h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2  ">
                <div class="table-responsive p-0">
                    <table id="table" class="table align-items-center mb-0 border rounded">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Pendamping</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                <th width="150px" class="text-secondary opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dataLansia as $dt) : ?>
                                <tr>
                                    <td class="text-secondary text-sm"><?= $no++; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['nama_lengkap']; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['no_nik']; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['nama_pendamping']; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['keterangan']; ?></td>
                                    <?= view_cell('\App\Libraries\Widget::tombolAksi', ['url' => 'lansia/transaksi', 'id' => $dt['id']]); ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <a href="/disabilitas/transaksi/tambah" class="m-2 btn bg-primary btn-outline-white">Transaksi Baru</a>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?= $title; ?></h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2  ">
                <div class="table-responsive p-0">
                    <table id="table" class="table align-items-center mb-0 border rounded">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Pendamping</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                <th width="150px" class="text-secondary opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dataDisabilitas as $dt) : ?>
                                <tr>
                                    <td class="text-secondary text-sm"><?= $no++; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['nama_lengkap']; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['no_nik']; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['nama_pendamping']; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['keterangan']; ?></td>
                                    <?= view_cell('\App\Libraries\Widget::tombolAksi', ['url' => 'disabilitas/transaksi', 'id' => $dt['id']]); ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>


<?= $this->section('script') ?>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah anda yakin untuk menghapus?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
</script>
<?= $this->endSection(); ?>