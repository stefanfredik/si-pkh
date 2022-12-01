<aside class="shadow shadow-lg sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?= base_url(); ?>">

            <span class="navbar-brand-img h-100">
                <i class=" bi bi-check2-circle"></i>
            </span>
            <span class="ms-1 font-weight-bold"><?= WEBNAME; ?></span>
        </a>
    </div>
    <hr class="horizontal dark mt-0" />

    <div class="sidenav-body w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <div class="nav-link border rounded shadow">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1 text-bold"><?= user()->nama_user; ?></span>
                </div>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link <?= url_is('dashboard') ? 'active' : ''; ?>" href="/dashboard">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Data Master
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= url_is('user*') ? 'active' : ''; ?>"" href=" /user">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-badge text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <hr class="horizontal dark mt-0" />
            <li class="nav-item ">
                <a class="nav-link <?= url_is('pendamping*') ? 'active' : ''; ?>" href="/pendamping">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Pendamping</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= url_is('pengurus*') ? 'active' : ''; ?>" href="/pengurus">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-books text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Pengurus</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= url_is('danabantuan*') ? 'active' : ''; ?>" href="/danabantuan">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-diamond text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Dana Bantuan</span>
                </a>
            </li>

            <hr class="horizontal dark mt-0" />


            <li class="nav-item">
                <a class="nav-link <?= url_is('warga*') ? 'active' : ''; ?>" href="/warga">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Warga</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= url_is('transaksi*') ? 'active' : ''; ?>" href="/transaksi">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-money-coins text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Transaksi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= url_is('lansia*') ? 'active' : ''; ?>" href="/lansia">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-umbrella-13 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Lansia</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= url_is('disabilitas*') ? 'active' : ''; ?>" href="/disabilitas">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-favourite-28 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Disabilitas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= url_is('laporan*') ? 'active' : ''; ?>" href="/laporan">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 p-3">
        <a class="btn btn-primary btn-sm mb-0 w-100" href="/logout" type=" button"><i class="ni ni-button-power mx-2"></i> Logout</a>
    </div>
</aside>