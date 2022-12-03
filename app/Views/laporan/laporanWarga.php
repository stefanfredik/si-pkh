<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>

<a href="/laporan/cetak/warga" class="btn btn-white text-primary"><i class="bi bi-printer-fill"></i> Cetak Laporan</a>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6><?= $title; ?></h6>
            </div>
            <div class="card-body px-4 pt-0 pb-2  ">
                <div class="table-responsive p-0">
                    <table id="table2" class=" display table align-items-center mb-0 border rounded">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Telepon</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Periode</th>
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


    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#table2 thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#table2 thead');

        var table = $('#table2').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function() {
                var api = this.api();
                api
                    .columns([1, 2, 3, 4])
                    .eq(0)
                    .each(function(colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );

                        var title = $(cell).text();
                        $(cell).html('<input class="form-control" type="text" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('change', function(e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value + ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    });
</script>


<?= $this->endSection(); ?>