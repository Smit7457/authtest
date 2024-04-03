<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// $routes->get('/', 'LoginController::index');

$routes->get('/login', 'LoginController::index');
$routes->post('/checklogin', 'LoginController::checklogin');

$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'signup/store', 'SignupController::store');

$routes->get('/dashboard', 'Home::dashboard');
$routes->post('/upload', 'UploadController::upload');



$routes->get('/logout', 'LoginController::logout');