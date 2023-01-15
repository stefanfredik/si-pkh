<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<a href="/laporan/cetak/bantuantunai" class="btn btn-white text-primary"><i class="bi bi-printer-fill"></i> Cetak Laporan</a>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?= $title; ?></h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2  ">
                <div class="table-responsive p-0">
                    <table id="table" class="table align-items-center mb-0 border rounded">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Transaksi</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penamping</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Rekening</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Transaksi</th>
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