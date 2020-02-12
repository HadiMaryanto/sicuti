<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

$route['akun'] = 'AkunController/index';
$route['akun/aktif/(:any)'] = 'AkunController/aktif/$1';
$route['profil'] = 'AkunController/profil';
$route['profil/ganti/(:any)'] = 'AkunController/ganti/$1';


$route['cuti'] = 'CutiController/index';
$route['cuti/tambah'] = 'CutiController/tambah';
$route['cuti/setujuipim/(:any)'] = 'CutiController/pimpinan_setujui/$1';
$route['cuti/setujuikep/(:any)'] = 'CutiController/kepbid_setujui/$1';
$route['cuti/tolakpim/(:any)'] = 'CutiController/pimpinan_tolak/$1';
$route['cuti/tolakkep/(:any)'] = 'CutiController/kepbid_tolak/$1';
$route['cuti/cetak/(:any)'] = 'CutiController/cetak/$1';
$route['cuti/lihat/(:any)'] = 'CutiController/lihat/$1';

$route['lapCuti'] = 'CutiController/laporan';

$route['lapIzin'] = 'IzinController/laporan';

$route['izin'] = 'IzinController/index';
$route['izin/tambah'] = 'IzinController/tambah';
$route['izin/setujuipim/(:any)'] = 'IzinController/pimpinan_setujui/$1';
$route['izin/setujuikep/(:any)'] = 'IzinController/kepbid_setujui/$1';
$route['izin/tolakpim/(:any)'] = 'IzinController/pimpinan_tolak/$1';
$route['izin/tolakkep/(:any)'] = 'IzinController/kepbid_tolak/$1';
$route['izin/lihat/(:any)'] = 'IzinController/lihat/$1';
$route['izin/cetak/(:any)'] = 'IzinController/cetak/$1';

$route['pegawai'] = 'PegawaiController/index';
$route['pegawai/tambah'] = 'PegawaiController/tambah';
$route['pegawai/edit/(:any)'] = 'PegawaiController/edit/$1';
$route['pegawai/delete/(:any)'] = 'PegawaiController/delete/$1';

$route['jabatan'] = 'JabatanController/index';
$route['jabatan/tambah'] = 'JabatanController/tambah';
$route['jabatan/edit/(:any)'] = 'JabatanController/edit/$1';
$route['jabatan/delete/(:any)'] = 'JabatanController/delete/$1';

$route['unit'] = 'UnitController/index';
$route['unit/tambah'] = 'UnitController/tambah';
$route['unit/edit/(:any)'] = 'UnitController/edit/$1';
$route['unit/delete/(:any)'] = 'UnitController/delete/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
