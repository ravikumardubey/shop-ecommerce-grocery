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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'category/login';
$route['logout'] = 'logout';
$route['checkout'] = 'category/checkout';
$route['register'] = 'category/register';
$route['forgetpassword'] = 'category/forgetpassword';
$route['addressbook'] = 'category/addressbook';
$route['orderhistory'] = 'category/orderhistory';
$route['rewardPoint'] = 'category/rewardPoint';
$route['transction'] = 'category/transction';
$route['single_product'] = 'category/single_product';
$route['cart'] = 'category/cart';

$route['category'] = 'category';

$route['Category_wise'] = 'controllers/Category_wise';
$route['ajaxcall'] = 'ajaxcall';
$route['contactus'] = 'category/contactus';
$route['aboutus'] = 'category/aboutus';
$route['offer'] = 'category/offer';
$route['termcondition'] = 'category/termcondition';
$route['our_team'] = 'category/our_team';
$route['aboutus'] = 'category/aboutus';
$route['password_change'] = 'category/password_change';
$route['security'] = 'category/security';
$route['vendorRegistration'] = 'category/vendorRegistration';
$route['login/login_users'] = 'login/login_users';
$route['helpFaq'] = 'category/helpFaq';
$route['otpsend'] = 'otpsend';
$route['confirmorder'] = 'confirmorder';

$route['product'] = 'product';

$route['sidecategory'] = 'category/sidecategory';
$route['cart2'] = 'category/cart2';
$route['profile'] = 'category/profile';
$route['thankyou'] = 'thank';


//login/login_users

// $route['([a-zA-z_]+)/([0-9+])'] = "category_wise/$1";

//$route['category_wise/([a-zA-z_]+)/([0-9+])'] = "category_wise/page/$2";





//Admin Panel Routes

$route['users'] = 'login';
$route['dashboard'] = 'dashboard';
$route['adminLogout'] = 'adminLogout';
$route['dashboard/vendor_list'] = 'dashboard/vendor_list';
$route['dashboard/edit_profile'] = 'dashboard/edit_profile';
$route['dashboard/change_password'] = 'dashboard/change_password';
$route['dashboard/vendor_image'] = 'dashboard/vendor_image';
$route['dashboard/banner'] = 'dashboard/banner';
$route['dashboard/vendor_shop_list'] = 'dashboard/vendor_shop_list';
$route['dashboard/order_list'] = 'dashboard/order_list';
$route['dashboard/product_list'] = 'dashboard/product_list';
$route['dashboard/user_list'] = 'dashboard/user_list';
$route['dashboard/master_category'] = 'dashboard/master_category';
$route['dashboard/master_sub_category'] = 'dashboard/master_sub_category';
$route['dashboard/product_order'] = 'dashboard/product_order';
$route['dashboard/product_image'] = 'dashboard/product_image';
$route['dashboard/product_review'] = 'dashboard/product_review';
$route['dashboard/user_order'] = 'dashboard/user_order';
$route['dashboard/vendor_account_detail'] = 'dashboard/vendor_account_detail';
$route['dashboard/vendor_menu'] = 'dashboard/vendor_menu';
$route['dashboard/vendor_otp'] = 'dashboard/vendor_otp';
$route['dashboard/cart_list'] = 'dashboard/cart_list';
$route['dashboard/vendor_review'] = 'dashboard/vendor_review';
$route['vendor_registration'] = 'vendor_registration';
$route['dashboard/shop_registration'] = 'dashboard/shop_registration';
$route['dashboard/vendor_kyc'] = 'dashboard/vendor_kyc';
$route['dashboard/pages'] = 'dashboard/pages';
$route['dashboard/party'] = 'dashboard/party';
$route['dashboard/sale_report'] = 'dashboard/sale_report';
$route['dashboard/faq'] = 'dashboard/faq';
$route['dashboard/complain'] = 'dashboard/complain';
$route['dashboard/contact'] = 'dashboard/contact';
$route['dashboard/enquiry'] = 'dashboard/enquiry';
$route['dashboard/ajaxcall'] = 'dashboard/ajaxcall';
$route['dashboard/account_kyc'] = 'dashboard/account_kyc';
$route['dashboard/review'] = 'dashboard/review';
$route['image_upload'] = 'image_upload';





$route['(:any)/(:any)'] = 'category_wise/index/$1/$2';

$route['(:any)'] = 'category_wise/main_category/$1';


