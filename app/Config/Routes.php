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
$routes->get('order/detailOrder/inputProduk/(:segment)', 'Order::inputProduk/$1');
$routes->post('order/detailOrder/inputProduk/(:segment)/submit', 'Order::submitProduk/$1');
$routes->get('order/detailOrder/editProduk/(:segment)', 'Order::editProduk/$1');
$routes->post('order/detailOrder/editProduk/(:segment)/submit', 'Order::editProdukSubmit/$1');
$routes->get('order/detailOrder/detailProduk/(:segment)', 'Order::detailProduk/$1');
$routes->post('order/detailOrder/inputDiscount/(:segment)', 'Order::inputDiscount/$1');
$routes->get('order/detailOrder/biaya/(:segment)', 'Order::biaya/$1');
$routes->post('order/detailOrder/biaya/inputPengeluaran/(:segment)', 'Order::inputPengeluaran/$1');
$routes->get('order/updateStatus/(:segment)', 'Order::updateStatus/$1');
$routes->get('order/invoice/(:segment)', 'Order::invoice/$1');
$routes->add('order/invoice/addPaymentTerms/(:segment)', 'Order::paymentTerms/$1');
$routes->get('order/payment/(:segment)', 'Order::payment/$1');
$routes->get('order/payment/inputPayment/(:segment)', 'Order::inputPayment/$1');
$routes->post('order/payment/inputPayment/submit/(:segment)', 'Order::submitPayment/$1');
$routes->get('order/invoice/cetak/(:segment)', 'Order::cetakInvoice/$1');
$routes->get('order/editOrder/(:segment)', 'Order::editOrder/$1');
$routes->post('order/editOrder/submit/(:segment)', 'Order::editOrderSubmit/$1');
$routes->get('order/cetakLabel/(:segment)', 'Order::cetakLabel/$1');
$routes->post('order/cetakLabel/(:segment)/print', 'Order::printLabel/$1');
 

$routes->get('taskCalendar', 'TaskCalendar::index');
$routes->get('taskCalendar/calendarView/(:segment)/(:segment)', 'TaskCalendar::calendarView/$1/$2');
$routes->post('taskCalendar/calendarView/pilih', 'TaskCalendar::pilihBulan');
$routes->add('taskCalendar/addSubtask/(:segment)', 'TaskCalendar::addSubtask/$1');
$routes->post('taskCalendar/editSubtask', 'TaskCalendar::editSubtask');
$routes->get('taskCalendar/deleteSubtask', 'TaskCalendar::deleteSubtask');
$routes->get('taskCalendar/cetakQC', 'TaskCalendar::cetakQC');
$routes->post('taskCalendar/cetakQC/download', 'TaskCalendar::CetakQCdownload');
$routes->get('taskCalendar/updateStatus/(:segment)', 'TaskCalendar::updateStatus/$1');
$routes->get('taskCalendar/catatan/(:segment)', 'TaskCalendar::catatan/$1');
$routes->post('taskCalendar/catatan/inputCatatan/(:segment)', 'TaskCalendar::inputCatatan/$1');

$routes->get('kategoriProduk', 'KategoriProduk::index');
$routes->post('kategoriProduk/addKategori', 'KategoriProduk::addKategori');
$routes->post('kategoriProduk/addDetail/(:segment)', 'KategoriProduk::addDetail/$1');
$routes->get('kategoriProduk/deleteKategori', 'KategoriProduk::deleteKategori');
$routes->post('kategoriProduk/editDetail/(:segment)', 'KategoriProduk::editDetail/$1');

$routes->get('supplier', 'Supplier::index');
$routes->post('supplier/addKategori', 'Supplier::addKategori');
$routes->post('supplier/addSupplier/(:segment)', 'Supplier::addSupplier/$1');
$routes->get('supplier/info/(:segment)', 'Supplier::info/$1');
$routes->post('supplier/addPayment/(:segment)', 'Supplier::addPayment/$1');
$routes->get('supplier/info/spk/(:segment)', 'Supplier::spk/$1');
$routes->get('supplier/info/spk/cetak/(:segment)', 'Supplier::cetakSpk/$1');
$routes->get('supplier/info/addSpk/(:segment)', 'Supplier::addSpk/$1');
$routes->get('supplier/info/inputSpk/(:segment)', 'Supplier::inputSpk/$1');
$routes->post('supplier/info/inputSpk/submit/(:segment)', 'Supplier::submitSpk/$1');

$routes->get('katalogProduk', 'KatalogProduk::index');
$routes->post('katalogProduk/addProduk', 'KatalogProduk::addProduk');