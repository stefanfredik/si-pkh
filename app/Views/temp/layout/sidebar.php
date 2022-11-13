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
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/dashboard">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
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
                <a class="nav-link" href="/user">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <hr class="horizontal dark mt-0" />
            <li class="nav-item">
                <a class="nav-link" href="/pendamping">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Pendamping</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/pengurus">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Pengurus</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/warga">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Warga</span>
                </a>
            </li>

            <hr class="horizontal dark mt-0" />
            <li class="nav-item">
                <a class="nav-link" href="/danabantuan">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Dana Bantuan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/transaksi">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data Transaksi</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3">
        <a class="btn btn-primary btn-sm mb-0 w-100" href="/logout" type=" button">Logout</a>
    </div>
</aside>