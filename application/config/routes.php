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

// Custom Routes

// Route Menu
$route['admin/menu'] = "admin/C_menu/index";
$route['admin/editMenu'] = "admin/C_menu/editMenu";
$route['admin/hapusMenu/(:any)'] = "admin/C_menu/hapusMenu/$1";


// Custome Product Routes
$route['admin/kategori'] = "admin/C_kategori/index";
$route['admin/satuan'] = "admin/C_satuan/index";

// Custome Stock Out
$route['kasir/stock_out_data'] = "kasir/C_stockout/index";
$route['kasir/ItemOut'] = "kasir/C_stockout/stock_out_form";
$route['kasir/StockOut/delete/(:num)/(:num)'] = "kasir/C_stockout/delete_out";

// Custome Stock In
$route['kasir/stock_in_data'] = "kasir/C_stockin/index";
$route['kasir/ItemIn'] = "kasir/C_stockin/stock_in_form";


// Route Sub Menu
$route['admin/submenu'] = "admin/C_menu/submenu";
$route['admin/editSubmenu'] = "admin/C_menu/editSubmenu";
$route['admin/hapusSubmenu/(:any)'] = "admin/C_menu/hapusSubmenu/$1";

//Route untuk Auth
$route['auth'] = "C_auth";
$route['auth/registration'] = "C_auth/registration";
$route['auth/lupaPassword'] = "C_auth/lupapassword";
$route['auth/(:any)'] = "C_auth/$1";
$route['auth/gantipassword'] = "C_auth/gantipassword";


// User Landingpage
$route['User/LandingPage'] = "Users/C_landingpage/index";

// User Auth (Pelanggan)
$route['User/Register'] = "C_auth_user/registration";
