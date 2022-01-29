<?php

use Config\Services;

$routes = Services::routes();

$routes->post('/api/login', 'API\Auth::login');
$routes->post('/api/register', 'API\Auth::register');

$routes->get('/api/users', 'API\UserController::index');
$routes->get('/api/users/(:num)', 'API\UserController::show/$1');

$routes->get('/api/products', 'API\ProductController::index');