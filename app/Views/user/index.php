<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<a href="/user/tambah" class="btn btn-outline-white">Tambah Data User</a>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?= $title; ?></h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2  ">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0 border rounded">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama User</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jabatan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telepon</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                <th width="150px" class="text-secondary opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataUser as $dt) : ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <i class="text-primary fa-lg bi bi-person-circle mx-3"></i>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?= $dt['nama_user']; ?></h6>
                                                <p class="text-xs text-secondary mb-0">Username : <?= $dt['username']; ?></p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle">
                                        <span class="text-secondary text-xs font-weight-bold"><?= $dt['no_nik']; ?></span>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= @ucwords($dt['jabatan']); ?></p>
                                        <p class="text-xs text-secondary mb-0">Created At : <?= $dt['created_at']; ?></p>
                                    </td>

                                    <td class="align-middle">
                                        <span class="text-secondary text-xs font-weight-bold"><?= $dt['telepon']; ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-secondary text-xs font-weight-bold"><?= $dt['alamat']; ?></span>
                                    </td>

                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/user/password/<?= $dt['id']; ?>" class="btn btn-sm btn-secondary"><i class="bi bi-key"></i></a>
                                            <a href="/user/edit/<?= $dt['id']; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></a>
                                            <button onclick="confirmDelete('/user/delete/<?= $dt['id']; ?>')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>

                                        </div>
                                    </td>
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