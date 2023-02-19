<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>
<?php $transaksiModel = new App\Models\TransaksiModel() ?>
<a href="/<?= $info['url']; ?>/tambah" class="btn btn-outline-white">Tambah Data <?= $info['title']; ?></a>
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Periode</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Dana Awal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dana Terpakai</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dana Tersisa</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                <th width="150px" class="text-secondary opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dana as $dt) : ?>
                                <tr>
                                    <td class="text-secondary text-sm"><?= $no++; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['periode']; ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['tahun']; ?></td>
                                    <td class="text-secondary text-sm"><?= rupiah($dt['dana_awal']); ?></td>
                                    <td class="text-secondary text-sm"><?php $danaTerpakai =  $transaksiModel->danaTerpakai($dt['periode'], $dt['tahun'])['jumlah'];
                                                                        echo rupiah($danaTerpakai); ?></td>
                                    <td class="text-secondary text-sm"><?= rupiah($dt['dana_awal'] - $danaTerpakai); ?></td>
                                    <td class="text-secondary text-sm"><?= $dt['keterangan']; ?></td>
                                    <?= view_cell('\App\Libraries\Widget::tombolAksi', ['url' => $info['url'], 'id' => $dt['id']]); ?>
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