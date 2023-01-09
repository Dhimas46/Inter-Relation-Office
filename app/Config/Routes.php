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
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/dashboard', 'User::index');
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/', 'Home::home');
$routes->get('/Blog-detail', 'Blog::index');
$routes->get('blog/(:num)', 'Blog::detail/$1');

$routes->get('/userlist', 'Admin::index');
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->put('admin/(:any)', 'Admin::update/$1');

$routes->get('/About', 'About::index');

$routes->get('course', 'Course::index');
$routes->get('course/add', 'Course::create', ['filter' => 'role:admin']);
$routes->post('course/save', 'Course::save', ['filter' => 'role:admin']);
$routes->get('course/details/(:any)', 'Course::details/$1');
$routes->get('course/edit/(:any)', 'Course::edit/$1', ['filter' => 'role:admin']);
$routes->put('course/(:any)', 'Course::update/$1', ['filter' => 'role:admin']);
//$routes->delete('course/(:segment)', 'Course::destroy/$1');
$routes->get('course/hapus/(:segment)', 'Course::destroy/$1', ['filter' => 'role:admin']);

$routes->get('content', 'Content::index');
$routes->get('content/add', 'Content::create', ['filter' => 'role:admin']);
$routes->post('content', 'Content::save', ['filter' => 'role:admin']);
$routes->get('content/details/(:any)', 'Content::details/$1');
$routes->get('content/(:any)', 'Content::edit/$1', ['filter' => 'role:admin']);
$routes->put('content/(:any)', 'Content::update/$1', ['filter' => 'role:admin']);
//$routes->delete('content/(:segment)', 'Content::destroy/$1');
$routes->get('hapus/(:segment)', 'Content::destroy/$1', ['filter' => 'role:admin']);

 $routes->get('announcement/', 'Pengumuman::index');
 $routes->get('pengumuman/add', 'Pengumuman::create', ['filter' => 'role:admin']);
 $routes->post('pengumuman/save', 'Pengumuman::save', ['filter' => 'role:admin']);
 //$routes->get('pengumuman/details/(:any)', 'Pengumuman::details/$1');
 $routes->get('pengumuman/(:any)', 'Pengumuman::edit/$1', ['filter' => 'role:admin']);
 $routes->put('pengumuman/(:any)', 'Pengumuman::update/$1', ['filter' => 'role:admin']);
  $routes->get('/deletepengumuman/(:segment)', 'Pengumuman::destroy/$1', ['filter' => 'role:admin']);

$routes->get('profil/(:any)', 'User::profil/$1');
// $routes->get('course/add', 'Course::create', ['filter' => 'role:admin']);
// $routes->post('course', 'Course::store', ['filter' => 'role:admin']);
//$routes->get('profil/edit/(:any)', 'Course::edit/$1', ['filter' => 'role:admin']);
 $routes->put('profil/(:any)', 'User::update/$1');
// $routes->delete('course/(:segment)', 'Course::destroy/$1');

$routes->get('aktivitas', 'Aktivitas::index');
$routes->get('aktivitas/add', 'Aktivitas::create', ['filter' => 'role:admin']);
$routes->post('aktivitas', 'Aktivitas::save', ['filter' => 'role:admin']);
$routes->get('aktivitas/details/(:any)', 'Aktivitas::details/$1');
$routes->get('editact/(:any)', 'Aktivitas::edit/$1', ['filter' => 'role:admin']);
$routes->put('aktivitas/(:any)', 'Aktivitas::update/$1', ['filter' => 'role:admin']);
//$routes->delete('content/(:segment)', 'Content::destroy/$1');
$routes->get('hapusact/(:segment)', 'Aktivitas::destroy/$1', ['filter' => 'role:admin']);
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
