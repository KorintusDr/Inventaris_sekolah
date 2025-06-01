<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/logout'] = 'auth/logout';  

$route['admins/dashboard'] = 'dashboard';
$route['kepsek/dashboard'] = 'dashboard';

$route['kategori'] = 'kategori';
$route['kategori/tambah'] = 'kategori/tambah';
$route['kategori/edit/(:num)'] = 'kategori/edit/$1';
$route['kategori/update/(:num)'] = 'kategori/update/$1';
$route['kategori/hapus/(:num)'] = 'kategori/hapus/$1';

$route['merek'] = 'merek';
$route['merek/tambah'] = 'merek/tambah';
$route['merek/update'] = 'merek/update';
$route['merek/hapus/(:num)'] = 'merek/hapus/$1';

$route['kondisi'] = 'kondisi';
$route['kondisi/tambah'] = 'kondisi/tambah';
$route['kondisi/update'] = 'kondisi/update';
$route['kondisi/hapus/(:num)'] = 'kondisi/hapus/$1';

$route['ruangan'] = 'ruangan';
$route['ruangan/tambah'] = 'ruangan/tambah';
$route['ruangan/edit/(:num)'] = 'ruangan/edit/$1';
$route['ruangan/update'] = 'ruangan/update';
$route['ruangan/hapus/(:num)'] = 'ruangan/hapus/$1';

$route['barang'] = 'barang';
$route['barang/tambah'] = 'barang/tambah';
$route['barang/simpan'] = 'barang/simpan';
$route['barang/edit/(:num)'] = 'barang/edit/$1';
$route['barang/update'] = 'barang/update';
$route['barang/hapus/(:num)'] = 'barang/hapus/$1';
$route['barang/export'] = 'barang/export';
$route['barang/pdf'] = 'barang/pdf';

$route['barang-masuk'] = 'barang_masuk';
$route['barang-masuk/tambah'] = 'barang_masuk/tambah';
$route['barang-masuk/simpan'] = 'barang_masuk/simpan';
$route['barang-masuk/edit/(:num)'] = 'barang_masuk/edit/$1';
$route['barang-masuk/update/(:num)'] = 'barang_masuk/update/$1';
$route['barang-masuk/hapus/(:num)'] = 'barang_masuk/hapus/$1';
$route['barang-masuk/export'] = 'barang_masuk/export';
$route['barang-masuk/pdf'] = 'barang_masuk/pdf';

$route['barang_keluar'] = 'barang_keluar';
$route['barang_keluar/tambah'] = 'barang_keluar/tambah';
$route['barang_keluar/simpan'] = 'barang_keluar/simpan';
$route['barang_keluar/edit/(:num)'] = 'barang_keluar/edit/$1';
$route['barang_keluar/update'] = 'barang_keluar/update';
$route['barang_keluar/hapus/(:num)'] = 'barang_keluar/hapus/$1';
$route['barang_keluar/export'] = 'barang_keluar/export';
$route['barang_keluar/pdf'] = 'barang_keluar/pdf';

$route['peminjam_barang'] = 'peminjam_barang';
$route['peminjam_barang/tambah'] = 'peminjam_barang/tambah';
$route['peminjam_barang/simpan'] = 'peminjam_barang/simpan';
$route['peminjam_barang/edit/(:num)'] = 'peminjam_barang/edit/$1';
$route['peminjam_barang/update'] = 'peminjam_barang/update';
$route['peminjam_barang/hapus/(:num)'] = 'peminjam_barang/hapus/$1';
$route['peminjam_barang/export'] = 'peminjam_barang/export';
$route['peminjam_barang/pdf'] = 'peminjam_barang/pdf';


