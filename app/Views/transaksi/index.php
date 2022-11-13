<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>


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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Penamping</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                                <th width="150px" class="text-secondary opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
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