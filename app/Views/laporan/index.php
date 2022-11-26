<?= $this->extend("temp/layout/index"); ?>
<?= $this->section("content"); ?>
<div class="row">
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body d-flex flex-row justify-content-between">
                <h5 class="card-title ">Laporan Pendamping</h5>
                <a href="/laporan/pendamping" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body d-flex flex-row justify-content-between">
                <h5 class="card-title">Laporan Pengurus</h5>
                <a href="/laporan/pengurus" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body d-flex flex-row justify-content-between">
                <h5 class="card-title">Laporan warga</h5>
                <a href="/laporan/pengurus" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body d-flex flex-row justify-content-between align-middle">
                <h5 class="card-title">Laporan dana Bantuan</h5>
                <a href="/laporan/pengurus" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>