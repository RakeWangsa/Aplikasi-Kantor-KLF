<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/tes', 'Home::tes');
$routes->get('tesdb', 'Home::tesdb');
$routes->post('simpanData', 'Home::simpanData');
// $routes->get('tampilData', 'Home::tesdb2');

$routes->get('login', 'Auth::index');
$routes->post('login/check', 'Auth::login');
$routes->get('register', 'Auth::register');
$routes->get('logout', 'Auth::logout');
$routes->post('register/submit', 'Auth::tambahAkun');


$routes->get('dashboard', 'Dashboard::index');
$routes->get('order/listOrder', 'Order::index');
$routes->get('order/inputOrder', 'Order::inputOrder');
$routes->post('order/inputOrder/simpanData', 'Order::simpanData');
$routes->get('order/detailOrder/(:segment)', 'Order::detailOrder/$1');
$routes->get('order/invoice', 'Order::invoice');
$routes->add('order/invoice/addPaymentTerms', 'Order::paymentTerms');
$routes->get('order/payment', 'Order::payment');
$routes->get('order/invoice/cetak', 'Order::cetakInvoice');
// $routes->get('order/editOrder', 'Order::editOrder');
$routes->get('order/editOrder/(:segment)', 'Order::editOrder/$1');



$routes->get('taskCalendar', 'TaskCalendar::index');
$routes->add('taskCalendar/addSubtask', 'TaskCalendar::addSubtask');
$routes->post('taskCalendar/editSubtask', 'TaskCalendar::editSubtask');
$routes->get('taskCalendar/deleteSubtask', 'TaskCalendar::deleteSubtask');
$routes->add('taskCalendar/cetakQC', 'TaskCalendar::cetakQC');

$routes->get('katalogProduk', 'KatalogProduk::index');