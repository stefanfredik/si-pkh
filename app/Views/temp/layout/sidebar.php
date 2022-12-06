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
            <?php
            if (in_groups("Admin")) echo $this->include("/temp/layout/sidebar/sidebarAdmin");
            if (in_groups("Pengurus")) echo $this->include("/temp/layout/sidebar/sidebarPengurus");
            if (in_groups("Pendamping")) echo $this->include("/temp/layout/sidebar/sidebarPendamping");
            ?>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 p-3">
        <a class="btn btn-primary btn-sm mb-0 w-100" href="/logout" type=" button"><i class="ni ni-button-power mx-2"></i> Logout</a>
    </div>
</aside>