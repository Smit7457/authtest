<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'signup/store', 'SignupController::store');
