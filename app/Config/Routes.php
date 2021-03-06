<?php

namespace Config;

// Create a new instance of our RouteCollection class.

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
$routes->get('/', 'Login::index');
$routes->get('/register', 'Users::index');
$routes->post('/register','Users::store');
$routes->post('/login','Login::loginAuth');
$routes->get('/index', 'Home::index');
$routes->get('/logout', 'Login::logout');

//admin routes
$routes->get('admin/login', 'Login::index');
$routes->get('admin/register', 'Admin::register');
$routes->post('admin/register','Admin::store');
$routes->post('admin/login','Login::loginAuth');
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
$routes->get('categories/edit/(:num)','Categories::edit/$1');
$routes->get('categories/delete/(:num)','Categories::delete/$1');
$routes->post('/categories/update/(:num)','Categories::update/$1');

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
$routes->get('/viewallproducts','Products::allproducts');

//clients
$routes->get('customerproducts','Customers::index');
$routes->get('/allproducts/(:num)','Customers::getProducts/$1');
$routes->get('/eachproduct/(:num)','Customers::getProduct/$1');
$routes->get('/viewproduct/(:num)','Customers::viewProduct/$1');
$routes->get('cart','Customers::viewCart');
$routes->post('cart/add','Customers::addToCart');
$routes->post('/changequantity/(:alphanum)','Customers::changeQuantity/$1');
$routes->get('/deleteitem/(:alphanum)','Customers::deleteItem/$1');
//$routes->post('/cart','WalletController::topup');
$routes->get('/checkout','WalletController::index');
$routes->get('/ewallet','WalletController::wallet');
$routes->get('/summary','Customers::viewSummary');



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

require_once ROOTPATH."/routes/api.php";