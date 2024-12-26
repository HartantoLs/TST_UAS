<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/testdb', 'TestDB::index');
$routes->get('/users', 'UserController::index');

// Route untuk Sign Up
$routes->get('/signup', 'AuthController::signup');
$routes->post('/register', 'AuthController::register');

// Route untuk Login
$routes->get('/login', 'AuthController::login');
$routes->post('/authenticate', 'AuthController::authenticate');

// Route untuk Logout
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);

$routes->get('/test/start', 'TestController::start_test', ['filter' => 'auth']);
$routes->get('/test/simulate/(:num)', 'TestController::simulate/$1', ['filter' => 'auth']);
$routes->post('/test/submit_single', 'TestController::submit_single', ['filter' => 'auth']);
$routes->get('/test/result/(:num)', 'TestController::result/$1', ['filter' => 'auth']);
$routes->get('/test/progress', 'TestController::progress', ['filter' => 'auth']);
$routes->get('/test/force_submit/(:num)', 'TestController::force_submit/$1');

$routes->post('/test/submit_test/(:num)', 'TestController::submit_test/$1');
$routes->get('test-env', 'EnvTest::index');
