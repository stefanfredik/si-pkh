<?= $this->extend('temp/layout/cetak/index'); ?>
<?= $this->section("table"); ?>


<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-uppercase">No</th>
            <th class="text-uppercase">Nama Lengkap</th>
            <th class="text-uppercase">NIK</th>
            <th class="text-uppercase">ID Penamping</th>
            <th class="text-uppercase">Alamat</th>
            <th class="text-uppercase">Telepon</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1;
        foreach ($dataPendamping as $dt) : ?>
            <tr>
                <th><?= $no++; ?></th>
                <td class="text-capitalize"><?= $dt['nama_user']; ?></td>
                <td><?= $dt['no_nik']; ?></td>
                <td><?= 'PD-' . str_pad($dt['id'], 4, '0', STR_PAD_LEFT); ?></td>
                <td><?= $dt['alamat']; ?></td>
                <td><?= $dt['telepon']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?= $this->endSection(); ?>