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
$routes->get('/menu', 'Home::menu');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/book-table', 'Home::bookTable');
$routes->get('/cart', 'Home::cart');
$routes->get('/checkout/success', 'Home::checkoutSuccess');
$routes->get('/checkout/cancel', 'Home::checkoutCancel');
$routes->get('/checkout/thank-you/(:segment)', 'Home::orderThankYou/$1');
$routes->get('/product/(:segment)', 'Home::product/$1');
$routes->post('/book-table', 'Home::submitReservation');
$routes->post('/enquiry', 'Home::submitEnquiry');
$routes->post('/cart/checkout', 'Home::submitOrder');

$routes->group('admin', static function ($routes) {
    $routes->get('login', 'Admin\AuthController::login');
    $routes->post('login', 'Admin\AuthController::attemptLogin');
    $routes->get('logout', 'Admin\AuthController::logout');
});

$routes->group('admin', ['filter' => 'adminauth'], static function ($routes) {
    $routes->get('/', 'Admin\DashboardController::index');
    $routes->get('settings', 'Admin\SettingsController::index');
    $routes->post('settings', 'Admin\SettingsController::save');

    $routes->get('categories', 'Admin\CategoriesController::index');
    $routes->get('categories/create', 'Admin\CategoriesController::create');
    $routes->post('categories/store', 'Admin\CategoriesController::store');
    $routes->get('categories/edit/(:num)', 'Admin\CategoriesController::edit/$1');
    $routes->post('categories/update/(:num)', 'Admin\CategoriesController::update/$1');
    $routes->post('categories/delete/(:num)', 'Admin\CategoriesController::delete/$1');

    $routes->get('products', 'Admin\ProductsController::index');
    $routes->get('products/create', 'Admin\ProductsController::create');
    $routes->post('products/store', 'Admin\ProductsController::store');
    $routes->get('products/edit/(:num)', 'Admin\ProductsController::edit/$1');
    $routes->post('products/update/(:num)', 'Admin\ProductsController::update/$1');
    $routes->post('products/delete/(:num)', 'Admin\ProductsController::delete/$1');

    $routes->get('hero-slides', 'Admin\HeroSlidesController::index');
    $routes->get('hero-slides/create', 'Admin\HeroSlidesController::create');
    $routes->post('hero-slides/store', 'Admin\HeroSlidesController::store');
    $routes->get('hero-slides/edit/(:num)', 'Admin\HeroSlidesController::edit/$1');
    $routes->post('hero-slides/update/(:num)', 'Admin\HeroSlidesController::update/$1');
    $routes->post('hero-slides/delete/(:num)', 'Admin\HeroSlidesController::delete/$1');

    $routes->get('offers', 'Admin\OffersController::index');
    $routes->get('offers/create', 'Admin\OffersController::create');
    $routes->post('offers/store', 'Admin\OffersController::store');
    $routes->get('offers/edit/(:num)', 'Admin\OffersController::edit/$1');
    $routes->post('offers/update/(:num)', 'Admin\OffersController::update/$1');
    $routes->post('offers/delete/(:num)', 'Admin\OffersController::delete/$1');

    $routes->get('gallery', 'Admin\GalleryController::index');
    $routes->get('gallery/create', 'Admin\GalleryController::create');
    $routes->post('gallery/store', 'Admin\GalleryController::store');
    $routes->get('gallery/edit/(:num)', 'Admin\GalleryController::edit/$1');
    $routes->post('gallery/update/(:num)', 'Admin\GalleryController::update/$1');
    $routes->post('gallery/delete/(:num)', 'Admin\GalleryController::delete/$1');

    $routes->get('testimonials', 'Admin\TestimonialsController::index');
    $routes->get('testimonials/create', 'Admin\TestimonialsController::create');
    $routes->post('testimonials/store', 'Admin\TestimonialsController::store');
    $routes->get('testimonials/edit/(:num)', 'Admin\TestimonialsController::edit/$1');
    $routes->post('testimonials/update/(:num)', 'Admin\TestimonialsController::update/$1');
    $routes->post('testimonials/delete/(:num)', 'Admin\TestimonialsController::delete/$1');

    $routes->get('orders', 'Admin\OrdersController::index');
    $routes->get('orders/(:num)', 'Admin\OrdersController::show/$1');
    $routes->post('orders/status/(:num)', 'Admin\OrdersController::updateStatus/$1');

    $routes->get('reservations', 'Admin\ReservationsController::index');
    $routes->post('reservations/status/(:num)', 'Admin\ReservationsController::updateStatus/$1');

    $routes->get('enquiries', 'Admin\EnquiriesController::index');
    $routes->get('enquiries/(:num)', 'Admin\EnquiriesController::show/$1');
    $routes->post('enquiries/status/(:num)', 'Admin\EnquiriesController::updateStatus/$1');
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
