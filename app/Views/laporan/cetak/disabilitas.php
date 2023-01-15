<?= $this->extend('temp/layout/cetak/index'); ?>
<?= $this->section("table"); ?>


<div class="table-responsive">
    <table id="table" class="table align-items-center mb-0 border rounded">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Penamping</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>