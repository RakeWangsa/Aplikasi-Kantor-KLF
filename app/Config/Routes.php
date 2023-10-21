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
$routes->get('order/listOrder', 'Order::index');
$routes->get('order/inputOrder', 'Order::inputOrder');
$routes->post('order/inputOrder/simpanData', 'Order::simpanData');
$routes->get('order/invoice', 'Order::invoice');
$routes->add('order/invoice/addPaymentTerms', 'Order::paymentTerms');
$routes->get('order/payment', 'Order::payment');
$routes->get('order/invoice/cetak', 'Order::cetakInvoice');

$routes->get('taskCalendar', 'TaskCalendar::index');
