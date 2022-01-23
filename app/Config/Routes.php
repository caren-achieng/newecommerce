<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Categories;

$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// client routes
$routes->get('/', 'LogIn::index');
$routes->get('/register', 'Users::index');
$routes->post('/register','Users::store');
$routes->post('/login','LogIn::loginAuth');
$routes->get('/index', 'Home::index');
$routes->get('/logout', 'LogIn::logout');



//admin routes
$routes->get('admin/login', 'LogIn::index');
$routes->get('admin/register', 'Admin::register');
$routes->post('admin/register','Admin::store');
$routes->post('admin/login','LogIn::loginAuth');
$routes->get('clients','Admin::clients');
$routes->get('clients/edit/(:num)','Admin::edit/$1');
$routes->get('clients/delete/(:num)','Admin::delete/$1');
$routes->post('client/update/(:num)','Admin::update/$1');
$routes->get('admins','Admin::admins');
$routes->get('admins/edit/(:num)','Admin::edit/$1');
$routes->get('admins/delete/(:num)','Admin::delete/$1');
$routes->post('admins/update/(:num)','Admin::update/$1');

//categories routes
$routes->get('/categories','Categories::index');
$routes->post('/categories','Categories::store');
$routes->get('categories/edit/(:num)','Category::edit/$1');
$routes->get('categories/delete/(:num)','Category::delete/$1');
$routes->post('categories/update/(:num)','Category::update/$1');

//subcategories routes
$routes->get('/subcategories','Subcategories::index');
$routes->post('/subcategories','Subcategories::store');
$routes->get('subcategories/edit/(:num)','Subcategories::edit/$1');
$routes->get('subcategories/delete/(:num)','Subcategories::delete/$1');
$routes->post('subcategories/update/(:num)','Subcategories::update/$1');
$routes->get('/products/(:num)','Products::getSubcategory/$1');

//products routes
$routes->get('/product','Products::index');
$routes->post('/products','Products::store');
$routes->get('products/edit/(:num)','Products::edit/$1');
$routes->get('products/delete/(:num)','Products::delete/$1');
$routes->post('products/update/(:num)','Products::update/$1');
$routes->post('products/store','Products::store');

//clients
$routes->get('customerproducts','Customers::index');
$routes->get('/allproducts/(:num)','Customers::getProducts/$1');

//all routes
//$routes->get('/', 'Profiles::index',['filter' => 'authGuard']);


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
