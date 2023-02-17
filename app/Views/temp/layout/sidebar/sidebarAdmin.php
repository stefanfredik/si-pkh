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
        <a class="nav-link <?= url_is('datawarga*') ? 'active' : ''; ?>" href="/datawarga">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-shop text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Warga</span>
        </a>
    </li>

    <hr class="horizontal dark mt-0" />

    <li class="nav-item">
        <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link  <?= url_is('*warga') ? 'active' : ''; ?> collapsed" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-shop text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Warga</span>
        </a>
        <div class="collapse" id="dashboardsExamples">
            <ul class="nav ms-4">
                <li class="nav-item active">
                    <a class="nav-link <?= url_is('/bantuantunai/warga') ? 'active' : ''; ?>" href="/bantuantunai/warga">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal"> Bantuan Tunai </span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link <?= url_is('/disabilitas/warga') ? 'active' : ''; ?>" href="/disabilitas/warga">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal"> Bantuan Disabilitas </span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link <?= url_is('/lansia/warga') ? 'active' : ''; ?>" href="/lansia/warga">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal"> Bantuan Lansia </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>


    <li class="nav-item">
        <a data-bs-toggle="collapse" href="#transaksi" class="nav-link <?= url_is('*transaksi') ? 'active' : ''; ?>" collapsed" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                <i class="ni ni-shop text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Transaksi</span>
        </a>
        <div class="collapse" id="transaksi">
            <ul class="nav ms-4">
                <li class="nav-item active">
                    <a class="nav-link <?= url_is('/bantuantunai/transaksi') ? 'active' : ''; ?>" href="/bantuantunai/transaksi">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal"> Bantuan Tunai </span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link <?= url_is('/disabilitas/transaksi') ? 'active' : ''; ?>" href="/disabilitas/transaksi">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal"> Bantuan Disabilitas </span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link <?= url_is('/lansia/transaksi') ? 'active' : ''; ?>" href="/lansia/transaksi">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal"> Bantuan Lansia </span>
                    </a>
                </li>
            </ul>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link <?= url_is('laporan*') ? 'active' : ''; ?>" href="/laporan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-bullet-list-67 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan</span>
        </a>
    </li>