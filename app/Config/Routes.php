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


$routes->get('/', 'Home::index');

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
    $router->get('/', 'Warga::index');
    $router->get('tambah', 'Warga::tambah');
    $router->get('edit/(:num)', 'Warga::edit/$1');
    $router->get('detail/(:num)', 'Warga::detail/$1');
    $router->get('delete/(:num)', 'Warga::delete/$1');
    $router->get('password/(:num)', 'Warga::password/$1');

    $router->post("/", "Warga::add");
    $router->post("(:num)", "Warga::update/$1");
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

$routes->group('transaksi', static function ($router) {
    $router->get('/', 'Transaksi::index');
    $router->get('tambah', 'Transaksi::tambah');
    $router->get('edit/(:num)', 'Danabantuan::edit/$1');
    $router->get('detail/(:num)', 'Danabantuan::detail/$1');
    $router->get('delete/(:num)', 'Danabantuan::delete/$1');
    $router->get('password/(:num)', 'Danabantuan::password/$1');

    $router->post("/", "Danabantuan::add");
    $router->post("(:num)", "Danabantuan::update/$1");
});

$routes->group('coba', static function ($router) {
    $router->get('/', 'Coba::index');
    $router->post('data', 'Coba::ambilData');
});


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
