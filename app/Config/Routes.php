<?php

use App\Controllers\EmployeeController;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', static function(){
    return redirect()->to('/login');
});

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::store');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');

$routes->post('logout', 'AuthController::logout');


$routes->group('employees/', ['filter'=>'auth'], static function($routes){

$routes->get('/', 'EmployeeController::index');
$routes->get('add', 'EmployeeController::create');
$routes->post('store', 'EmployeeController::store');
$routes->get('edit/(:num)', 'EmployeeController::edit/$1');
$routes->post('update/(:num)', 'EmployeeController::update/$1');
$routes->get('delete/(:num)', 'EmployeeController::delete/$1');
$routes->get('view-user/(:num)', 'EmployeeController::viewUser/$1');

});





