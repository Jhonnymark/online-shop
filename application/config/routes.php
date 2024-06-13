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
|	https://codeigniter.com/userguide3/general/routing.html
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


$route['user/register'] = 'user/register';
$route['user/process_register'] = 'user/process_register';
$route['user/verify'] = 'user/verify';
$route['user/process_verification'] = 'user/process_verification';
$route['user/login'] = 'user/login';
$route['customer'] = 'customer_controller/index';
$route['customer/customer_dash'] = 'customer_controller/index';
$route['admin/products'] = 'Products/index';
$route['cart/add'] = 'cart/add';
$route['cart/view'] = 'cart/view';
$route['customer/my-orders'] = 'Order/my_orders';
$route['account'] = 'account/index';
$route['admin/products/add'] = 'products/add_product';
$route['admin/category'] = 'Category/index';
$route['admin/edit_category/(:any)'] = 'category/edit_category/$1';
$route['admin/add_category'] = 'category/add_category';
$route['admin/users_view'] = 'UserView/index';
$route['admin/manage_order'] = 'orders/manage_order';
$route['customer/order_confirmation/(:num)'] = 'customer_controller/order_confirmation/$1';
$route['admin/products/free_delivery_setting'] = 'products/free_delivery_setting';
$route['admin/products/delivery_settings'] = 'products/delivery_settings';
$route['admin/admin_dash'] = 'admin_dashboard/admin_dash';
$route['admin/generate_sales_report'] = 'admin/generate_sales_report';









