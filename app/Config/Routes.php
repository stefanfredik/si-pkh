<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Dashboard::index');

$routes->group('dashboard', static function ($router) {
    $router->get('/', 'Dashboard::index');
});

$routes->group('user', static function ($router) {
    $router->get('/', 'User::index');
    $router->get('tambah', 'User::tambah');
    $router->get('edit/(:num)', 'User::edit/$1');
    $router->get('delete/(:num)', 'User::delete/$1');
    $router->get('password/(:num)', 'User::password/$1');

    $router->post("/", "User::add");
    $router->post("(:num)", "User::update/$1");
    $router->post('password/(:num)', 'User::gantiPassword/$1');
});

$routes->group('warga', static function ($router) {
    // $router->get('bantuantunai', 'Warga::bantuantunai');

    $router->get('/', 'Warga::index');
    $router->get('tambah', 'Warga::tambah');

    $router->get('(:any)', 'Warga::index/$1');

    $router->get('edit/(:num)', 'Warga::edit/$1');
    $router->get('detail/(:num)', 'Warga::detail/$1');
    $router->get('delete/(:num)', 'Warga::delete/$1');
    $router->get('password/(:num)', 'Warga::password/$1');

    $router->post("/", "Warga::add");
    $router->post("(:num)", "Warga::update/$1");
});


$routes->group("bantuantunai/warga", static function ($router) {
    $router->get("/", 'WargaBantuantunai::index');
    $router->get("tambah", 'WargaBantuantunai::tambah');
    $router->get('edit/(:num)', 'WargaBantuantunai::edit/$1');
    $router->get('detail/(:num)', 'WargaBantuantunai::detail/$1');

    $router->get('delete/(:num)', 'WargaBantuantunai::delete/$1');

    $router->post("/", "WargaBantuantunai::add");
    $router->post("(:num)", "WargaBantuantunai::update/$1");
});

$routes->group("disabilitas/warga", static function ($router) {
    $router->get("/", 'WargaDisabilitas::index');
    $router->get("tambah", 'WargaDisabilitas::tambah');
    $router->get('edit/(:num)', 'WargaDisabilitas::edit/$1');
    $router->get('detail/(:num)', 'WargaDisabilitas::detail/$1');

    $router->get('delete/(:num)', 'WargaDisabilitas::delete/$1');

    $router->post("/", "WargaDisabilitas::add");
    $router->post("(:num)", "WargaDisabilitas::update/$1");
});


$routes->group("lansia/warga", static function ($router) {
    $router->get("/", 'WargaLansia::index');
    $router->get("tambah", 'WargaLansia::tambah');
    $router->get('edit/(:num)', 'WargaLansia::edit/$1');
    $router->get('detail/(:num)', 'WargaLansia::detail/$1');

    $router->get('delete/(:num)', 'WargaLansia::delete/$1');

    $router->post("/", "WargaLansia::add");
    $router->post("(:num)", "WargaLansia::update/$1");
});

$routes->group("bantuantunai/transaksi", static function ($router) {
    $router->get("/", 'TransaksiBantuantunai::index');
    $router->get("tambah", 'TransaksiBantuantunai::tambah');
    $router->get('edit/(:num)', 'TransaksiBantuantunai::edit/$1');
    $router->get('detail/(:num)', 'TransaksiBantuantunai::detail/$1');

    $router->get('delete/(:num)', 'TransaksiBantuantunai::delete/$1');

    $router->post("/", "TransaksiBantuantunai::add");
    $router->post("(:num)", "TransaksiBantuantunai::update/$1");
});


$routes->group("lansia/transaksi", static function ($router) {
    $router->get("/", 'TransaksiLansia::index');
    $router->get("tambah", 'TransaksiLansia::tambah');
    $router->get('edit/(:num)', 'TransaksiLansia::edit/$1');
    $router->get('detail/(:num)', 'TransaksiLansia::detail/$1');

    $router->get('delete/(:num)', 'TransaksiLansia::delete/$1');

    $router->post("/", "TransaksiLansia::add");
    $router->post("(:num)", "TransaksiLansia::update/$1");
});


$routes->group("disabilitas/transaksi", static function ($router) {
    $router->get("/", 'TransaksiDisabilitas::index');
    $router->get("tambah", 'TransaksiDisabilitas::tambah');
    $router->get('edit/(:num)', 'TransaksiDisabilitas::edit/$1');
    $router->get('detail/(:num)', 'TransaksiDisabilitas::detail/$1');

    $router->get('delete/(:num)', 'TransaksiDisabilitas::delete/$1');

    $router->post("/", "TransaksiDisabilitas::add");
    $router->post("(:num)", "TransaksiDisabilitas::update/$1");
});



$routes->group('pendamping', static function ($router) {
    $router->get('/', 'Pendamping::index');
    $router->get('tambah', 'Pendamping::tambah');
    $router->get('edit/(:num)', 'Warga::edit/$1');
    $router->get('detail/(:num)', 'Warga::detail/$1');
    $router->get('delete/(:num)', 'Warga::delete/$1');
    $router->get('password/(:num)', 'Warga::password/$1');

    $router->post("/", "Warga::add");
    $router->post("(:num)", "Warga::update/$1");
});


$routes->group('pengurus', static function ($router) {
    $router->get('/', 'Pengurus::index');
    $router->get('tambah', 'Pengurus::tambah');
    $router->get('edit/(:num)', 'Warga::edit/$1');
    $router->get('detail/(:num)', 'Warga::detail/$1');
    $router->get('delete/(:num)', 'Warga::delete/$1');
    $router->get('password/(:num)', 'Warga::password/$1');

    $router->post("/", "Warga::add");
    $router->post("(:num)", "Warga::update/$1");
});


$routes->group('danabantuan', static function ($router) {
    $router->get('/', 'Danabantuan::index');
    $router->get('tambah', 'Danabantuan::tambah');
    $router->get('edit/(:num)', 'Danabantuan::edit/$1');
    $router->get('detail/(:num)', 'Danabantuan::detail/$1');
    $router->get('delete/(:num)', 'Danabantuan::delete/$1');
    $router->get('password/(:num)', 'Danabantuan::password/$1');

    $router->post("/", "Danabantuan::add");
    $router->post("(:num)", "Danabantuan::update/$1");
});

// $routes->group('transaksi', static function ($router) {
//     $router->get('/', 'Transaksi::index');
//     $router->get('tambah', 'Transaksi::tambah');
//     $router->get('edit/(:num)', 'Transaksi::edit/$1');
//     $router->get('detail/(:num)', 'Transaksi::detail/$1');
//     $router->get('delete/(:num)', 'Transaksi::delete/$1');

//     $router->post("/", "Transaksi::add");
//     $router->post("(:num)", "Transaksi::update/$1");
// });


// $routes->group('disabilitas', static function ($router) {
//     $router->get('/', 'Disabilitas::index');
//     $router->get('tambah', 'Disabilitas::tambah');
//     $router->get('edit/(:num)', 'Disabilitas::edit/$1');
//     $router->get('detail/(:num)', 'Disabilitas::detail/$1');
//     $router->get('delete/(:num)', 'Disabilitas::delete/$1');

//     $router->post("/", "Disabilitas::add");
//     $router->post("(:num)", "Disabilitas::update/$1");
// });


// $routes->group('lansia', static function ($router) {
//     $router->get('/', 'Lansia::index');
//     $router->get('tambah', 'Lansia::tambah');
//     $router->get('edit/(:num)', 'Lansia::edit/$1');
//     $router->get('detail/(:num)', 'Lansia::detail/$1');
//     $router->get('delete/(:num)', 'Lansia::delete/$1');

//     $router->post("/", "Lansia::add");
//     $router->post("(:num)", "Lansia::update/$1");
// });

$routes->group('coba', static function ($router) {
    $router->get('/', 'Coba::index');
    $router->post('data', 'Coba::ambilData');
});


$routes->group('laporan', static function ($router) {
    $router->get('/', 'Laporan::index');
    $router->get('pendamping', 'Laporan::pendamping');
    $router->get('warga', 'Laporan::warga');
    $router->get('danabantuan', 'Laporan::danabantuan');
    $router->get('pengurus', 'Laporan::pengurus');

    $router->get('bantuantunai', 'Laporan::bantuantunai');
    $router->get('disabilitas', 'Laporan::disabilitas');
    $router->get('lansia', 'Laporan::lansia');

    $router->get('cetak/pendamping', 'Laporan::cetak/pendamping');
    $router->get('cetak/pengurus', 'Laporan::cetak/pengurus');
    $router->get('cetak/warga', 'Laporan::cetak/warga');

    $router->get('cetak/bantuantunai', 'Laporan::cetak/bantuantunai');
    $router->get('cetak/disabilitas', 'Laporan::cetak/disabilitas');
    $router->get('cetak/lansia', 'Laporan::cetak/lansia');


    $router->post('cetak', 'Laporan::cetak');
});


// $routes->group('datawarga', static function ($router) {
//     $router->get('/', 'Warga::index');
// });

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
