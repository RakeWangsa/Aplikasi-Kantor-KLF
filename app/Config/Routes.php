<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tesdb', 'Home::tesdb');
$routes->post('simpanData', 'Home::simpanData');
// $routes->get('tampilData', 'Home::tesdb2');


$routes->get('dashboard', 'Dashboard::index');
$routes->get('listOrder', 'ListOrder::index');
$routes->get('inputOrder', 'ListOrder::inputOrder');


