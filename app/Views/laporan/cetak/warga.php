<?= $this->extend('temp/layout/cetak/index'); ?>
<?= $this->section("table"); ?>

<table class="table table-border">
    <thead>
        <tr>
            <th class="text-uppercase">No.</th>
            <th class="text-uppercase">Nama Lengkap</th>
            <th class="text-uppercase">Jenis Kelamin</th>
            <th class="text-uppercase">No Telepon</th>
            <th class="text-uppercase">Alamat</th>
            <th class="text-uppercase">Tahun</th>
            <th class="text-uppercase">Periode</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($dataWarga as $dt) : ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-capitalize"><?= $dt['nama_lengkap']; ?></td>
                <td class="text-capitalize"><?= $dt['jenis_kelamin']; ?></td>
                <td class="text-capitalize"><?= $dt['no_telepon']; ?></td>
                <td class="text-capitalize"><?= $dt['alamat']; ?></td>
                <td class="text-capitalize"><?= $dt['tahun']; ?></td>
                <td class="text-capitalize"><?= $dt['periode']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>