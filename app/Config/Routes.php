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
$routes->get('listOrder/inputOrder', 'ListOrder::inputOrder');
$routes->post('listOrder/inputOrder/simpanData', 'ListOrder::simpanData');
$routes->get('listOrder/invoice', 'ListOrder::invoice');
$routes->get('listOrder/invoice/cetak', 'ListOrder::cetakInvoice');

