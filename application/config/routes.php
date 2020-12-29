<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'C_auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// User Landingpage
$route['User/LandingPage'] = "Users/C_landingpage/index";
$route['User/Cart'] = "Users/C_cart/index";
$route['User/Cart/delete/(:any)'] = "Users/C_cart/delete_cart/$1";
$route['User/History/ambilnomorvirtual/(:any)'] = "Users/C_history_pembelian/ambilVirtualaccount/$1";
$route['User/History'] = "Users/C_history_pembelian/index";
$route['User/Profile'] = "Users/C_user_profile/index";
$route['User/Profile/Edit'] = "Users/C_user_profile/editprofil";
$route['User/Profile/ChangePassword'] = "Users/C_user_profile/ubahpassworduser";
$route['User/List'] = "Users/C_barang_user/index";
$route['User/Detail/(:any)'] = "Users/C_detail_barang_user/index/$1";
$route['User/Beli/process'] = "Users/C_detail_barang_user/process";

// User Auth (Pelanggan)
$route['User/Register'] = "C_auth_user/registration";
$route['User/resetpassword'] = "C_auth_user/resetpassword";
$route['User/ubahPasswords'] = "C_auth_user/changePassword";
$route['User/LupaSandi'] = "C_auth_user/LupaPasswordUser";
$route['User/UbahSandi'] = "C_auth_user/changePassword";
$route['User/Keluar'] = "C_auth_user/logout";
$route['User/Masuk'] = "C_auth_user/index";


// Irman bgt yg bikin routes dibawah ini

//Route untuk Auth
$route['auth'] = "C_auth";
$route['auth/registration'] = "C_auth/registration";
$route['auth/lupaPassword'] = "C_auth/lupapassword";
$route['auth/(:any)'] = "C_auth/$1";
$route['auth/gantipassword'] = "C_auth/gantipassword";
$route['auth/blocked'] = "C_auth/blocked";

// User Menu ['Menu'] dan submenu ['submenu']
$route['menu'] = "admin/C_menu";
$route['menu/ajaxEditMenu'] = "admin/C_menu/ajaxEditMenu";
$route['menu/editMenu'] = "admin/C_menu/editmenu";
$route['menu/hapusMenu/(:any)'] = "admin/C_menu/hapusMenu/$1";

$route['menu/submenu'] = "admin/C_menu/submenu";
$route['menu/submenu/ajaxEditSubmenu'] = "admin/C_menu/ajaxEditSubmenu";
$route['menu/submenu/editSubmenu'] = "admin/C_menu/editSubmenu";
$route['menu/submenu/hapusSubmenu/(:any)'] = "admin/C_menu/hapusSubmenu/$1";

// Route Role ['Role] dan akses ['akses']
$route['role/editRole'] = "admin/C_role/editRole";
$route['role/deleteRole/(:any)'] = "admin/C_role/deleteRole/$1";
$route['role'] = "admin/C_role/index";
$route['role/ajaxeditrole'] = "admin/C_role/ajaxEditRole";

// Route manajemen akses
$route['role/userAkses/(:any)'] = "admin/C_role/userAkses/$1";
$route['role/removeAkses'] = "admin/C_role/removeAkses";
$route['role/addakses'] = "admin/C_role/addAkses";

// Data Barang ['Barang']
$route['barang'] = "admin/C_barang";
$route['barang/generate_barang/(:any)'] = "admin/C_barang/generate_barang/$1";
$route['barang/hapus_items/(:any)'] = "admin/C_barang/hapus_items/$1";
$route['barang/edit_barang/(:any)'] = "admin/C_barang/edit_barang/$1";
$route['barang/tambah_items'] = "admin/C_barang/tambah_items";
$route['barang/simpan_edit_barang'] = "admin/C_barang/edit_barang_aksi";
$route['barang/barcode_print/(:any)'] = "admin/C_barang/barcode_print/$1";
$route['barang/qrcode_print/(:any)'] = "admin/C_barang/qrcode_print/$1";

// Data Kategori ['Kategori']
$route['kategori'] = "admin/C_kategori/index";
$route['kategori/deleteCategory/(:any)'] = "admin/C_kategori/deleteCategory/$1";
$route['kategori/addDataCategories'] = "admin/C_kategori/addDataCategories";
$route['kategori/editDataCategories'] = "admin/C_kategori/editDataCategories";

// Data Laporan ['Kasir']
$route['laporan/kasir'] = "kasir/C_kasir/index";
$route['laporan/kasir/cetak_laporan'] = "admin/v_cetak_laporan_kasir";

// Data Satuan ['Satuan']
$route['satuan'] = "admin/C_satuan/index";
$route['satuan/deleteunits/(:any)'] = "admin/C_satuan/deleteUnits/$1";
$route['satuan/adddataunits'] = "admin/C_satuan/addDataUnits";
$route['satuan/editdataunits'] = "admin/C_satuan/editDataUnits";

// Data Supplier ['supplier']
$route['supplier'] = "admin/C_supplier/index";
$route['supplier/edit_supplier/(:any)'] = "admin/C_supplier/edit_supplier/$1";
$route['supplier/hapus_supplier/(:any)'] = "admin/C_supplier/hapus_supplier/$1";
$route['supplier/edit_supplier_aksi'] = "admin/C_supplier/edit_supplier_aksi";

// Data Manajemen User ['CRUD USER']
$route['akun'] = "admin/C_user/index";
$route['akun/edit_akun'] = "admin/C_user/edit_user";
$route['akun/aktifkan'] = "admin/C_user/aktifkan";
$route['akun/nonaktifkan'] = "admin/C_user/nonaktifkan";
$route['akun/verif_password'] = "admin/C_user/verif_password";

// Data Manajemen Kasir ['kasir']
$route['kasir'] = "kasir/C_kasir/index";
$route['kasir/loadBarang/(:any)'] = "kasir/C_kasir/loadBarang/$1";
$route['kasir/loadKeranjang'] = "kasir/C_kasir/loadKeranjang";
$route['kasir/tambahKeranjang'] = "kasir/C_kasir/tambahKeranjang";
$route['kasir/hapusKeranjang'] = "kasir/C_kasir/hapusKeranjang";
$route['kasir/prosesTransaksi'] = "kasir/C_kasir/prosesTransaksi";

// Data Stockin ['Stockin']
$route['kasir/datastockin'] = "kasir/C_stockin/index";
$route['kasir/ItemIn'] = "kasir/C_stockin/stock_in_form";
$route['kasir/stockin/delete_in/(:any)/(:any)'] = "kasir/C_stockin/delete_in/$1/$1";
$route['kasir/stockinprocess'] = "kasir/C_stockin/process";

// Data Stockout ['stockout']
$route['kasir/stockoutdata'] = "kasir/C_stockout/index";
$route['kasir/ItemOut'] = "kasir/C_stockout/stock_out_form";
$route['kasir/StockOut/delete/(:any)/(:any)'] = "kasir/C_stockout/delete_out/$1/$1";
$route['kasir/stockout/process'] = "kasir/C_stockout/process";

// Data GIS ['Gis']
$route['gis/mapping'] = "gis/c_gis/mapping";
$route['gis/createmapping'] = "gis/C_gis/create_mapping";
$route['gis/edit_mapping/(:any)'] = "gis/C_gis/edit_mapping/$1";
$route['gis/hapus_mapping'] = "gis/C_gis/hapus_mapping";

// Data Dashboard ['Dashboard']
$route['dashboard'] = "C_dashboard";
// $route['dashboard/admin'] = "admin/C_admin";
// $route['dashboard/kasir'] = "pemilik/C_pemilik";
// $route['dashboard/pelanggan'] = "pelanggan/C_pelanggan";
// $route['dashboard/kurir'] = "kurir/C_kurir";

// Data User ['User']
$route['user/changepassword'] = "user/edit_password";
$route['user/edit'] = "user/edit";

// Akhiran irman bikin routes
