<?php

use App\Controllers\EmployeeController;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('employee', 'EmployeeController::index');
$routes->get('employee-add', 'EmployeeController::create');
$routes->post('employee-store', 'EmployeeController::store');
$routes->get('employee/edit/(:num)', 'EmployeeController::edit/$1');
$routes->post('employee/update/(:num)', 'EmployeeController::update/$1');
$routes->get('employee/delete/(:num)', 'EmployeeController::delete/$1');
$routes->get('employee/view-user/(:num)', 'EmployeeController::viewUser/$1');


