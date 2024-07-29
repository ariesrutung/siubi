<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin/dashboard', 'Admin::index');
$routes->get('admin', 'Admin::index');
// $routes->get('investor', 'Admin::investor');

// Routes investor
$routes->get('admin/investor', 'Admin::investor');
$routes->post('admin/investor_data', 'Admin::investorData');
$routes->post('admin/upload_investor', 'Admin::upload_investor');
$routes->delete('admin/delete_investor/(:num)', 'Admin::delete_investor/$1');
$routes->get('admin/detail_investor/(:num)', 'Admin::detail_investor/$1');
$routes->get('admin/update_investor', 'Admin::update_investor');
$routes->post('admin/update_investor', 'Admin::update_investor');

// Routes investasi
$routes->get('admin/investasi', 'Admin::investasi');
$routes->post('admin/investasi_data', 'Admin::investasiData');
$routes->get('admin/get_investors', 'Admin::get_investors');
$routes->post('admin/upload_investasi', 'Admin::upload_investasi');
$routes->delete('admin/delete_investasi/(:num)', 'Admin::delete_investasi/$1');
$routes->get('admin/detail_investasi/(:num)', 'Admin::detail_investasi/$1');
$routes->get('admin/update_investasi', 'Admin::update_investasi');
$routes->post('admin/update_investasi', 'Admin::update_investasi');


// Routes Data Barang
$routes->get('admin/data_barang', 'Admin::data_barang');
$routes->post('admin/dataBarang', 'Admin::dataBarang');
$routes->post('admin/upload_data_barang', 'Admin::upload_data_barang');
$routes->delete('admin/delete_data_barang/(:num)', 'Admin::delete_data_barang/$1');
$routes->get('admin/detail_data_barang/(:num)', 'Admin::detail_data_barang/$1');
$routes->get('admin/update_data_barang', 'Admin::update_data_barang');
$routes->post('admin/update_data_barang', 'Admin::update_data_barang');


// Routes Data Perusahaan
$routes->get('admin/data_perusahaan', 'Admin::data_perusahaan');
$routes->post('admin/update_perusahaan', 'Admin::update_perusahaan');
$routes->post('admin/dataBelanjaBarang', 'Admin::dataBelanjaBarang');


// Routes Belanja Barang
$routes->get('admin/belanja_barang', 'Admin::belanja_barang');
$routes->get('admin/getPeriodeByInvestor/(:num)', 'Admin::getPeriodeByInvestor/$1');
$routes->get('admin/getInvestasiDetails/(:num)/(:segment)', 'Admin::getInvestasiDetails/$1/$2');
$routes->get('admin/getNewTransactionId', 'Admin::getNewTransactionId');
$routes->get('admin/getNamaBarangOptions', 'Admin::getNamaBarangOptions');
$routes->post('admin/simpan_data_belanja', 'Admin::simpan_data_belanja');
// $routes->get('admin/simpan_data_belanja', 'Admin::simpan_data_belanja');


// Routes Penjualan Barang
$routes->get('admin/penjualan_barang', 'Admin::penjualan_barang');
