<li class="nav-item">
    <a class="nav-link <?= url_is('dashboard*') ? 'active' : ''; ?>" href="/dashboard">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="bi bi-house text-primary text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Dashboard</span>
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