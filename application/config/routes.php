<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// notfound


$route['reg_form'] = 'home/registration';
$route['registration'] = 'home/signup';
$route['waiting_msg'] = 'home/waiting_msg';
$route['login'] = 'home/login';
$route['forget_password_view'] = 'home/forget_password_view';
$route['reset_password'] = 'home/reset_password';
$route['login_check'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['nid_verify'] = 'admin/nid_verify';
$route['birth_verify'] = 'admin/birth_verify_view';
$route['payment'] = 'admin/payment_view';
$route['statement'] = 'admin/statement_view';
$route['get_nid_no'] = 'admin/get_nid_no';
$route['serve_view'] = 'admin/ec_server_copy_view';
$route['search_copy'] = 'admin/search_copy_view';
$route['username_password'] = 'admin/set_username_password_request';
$route['card_view'] = 'admin/download_card_view';
$route['create_card'] = 'admin/create_card_view';
$route['withdraw_view'] = 'admin/withdraw_request_view';


/* 

*/


