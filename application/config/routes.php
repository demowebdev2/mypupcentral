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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Front
$route['login'] = 'Home/login';
$route['register'] = 'Home/register';
$route['logout'] = 'Home/logout';
$route['ads'] = 'Ads/ads';
$route['training-ads'] = 'Ads/ads';

$route['profile'] = 'frontend/Profile';
$route['my_ads'] = 'frontend/My_ads';
$route['my_ads/change_status'] = 'frontend/My_ads/change_status';
$route['my_ads/price_update'] = 'frontend/My_ads/price_update';

$route['contact-person']='frontend/Contact_person';
$route['contact-person/add']='frontend/Contact_person/add';
$route['contact-person/edit/(:num)']='frontend/Contact_person/edit/$1';
$route['bookmarks']='Home/bookmarks';
// posts

$route['new_post'] = 'frontend/AdController/view_add_ad';
$route['addad'] = 'frontend/AdController/add_ad_process';
$route['posts/edit/(:num)']='frontend/AdController/view_edit_ad/$1';
$route['posts/editad/(:num)']='frontend/AdController/edit_ad/$1';
$route['posts/delete/(:num)']='frontend/AdController/delete/$1';

$route['posts/duplicate/(:num)']='frontend/AdController/view_duplicate_ad/$1';
$route['posts/duplicatead/(:num)']='frontend/AdController/duplicate_ad/$1';
// Ad payment

$route['posts/pay/(:num)']='frontend/AdController/stripe_payment/$1';
$route['frontend/Adcontroller/proceed_pay/(:num)'] = 'frontend/AdController/proceed_pay/$1';
$route['frontend/Adcontroller/cart_stripe_payment/(:num)'] = 'frontend/AdController/cart_stripe_payment/$1';


$route['book_slot/(:num)']='frontend/My_ads/book_slot/$1';
$route['pay/(:num)']='frontend/My_ads/stripe_payment/$1';
$route['payment-success']='frontend/My_ads/payment_success';
$route['payment-failed']='frontend/My_ads/payment_failed';
$route['premium_ads'] = 'frontend/My_ads/premium_ads';
$route['transactions'] = 'frontend/My_ads/transactions';
$route['sold-out'] = 'frontend/My_ads/sold_out';
$route['my-cart'] = 'frontend/My_ads/my_cart';

$route['ad/(:num)']='Ads/ad/$1';
$route['ad/addenquiry']='Ads/sendenquiry';

$route['breeds_list']='Home/list_breeds_old';
$route['available-breeds']='Home/list_breeds';
// blogs
$route['blog/(:num)']='frontend/BlogController/show/$1';
$route['breeds'] = 'breeds/breeds';
$route['breeds/(:any)'] = 'breeds/breeds';
$route['about'] = 'Home/about/';
$route['our-pledge']='Home/our_pledge';
$route['sold'] = 'Ads/sold_ads/';
//enquiries

$route['ad/enquiries']='frontend/EnquiryController';
//admin

$route['admin/login'] = 'Site/login';

//contact
$route['contact'] = 'Home/contact';
$route['shipping']='Page/shipping2/';
$route['transportation']='Page/shipping/';
$route['faq']='Page/faq/';
$route['standard']='Page/standard/';
$route['avoid-scams']='Page/avoid_scams/';

$route['ads/(:num)/(:num)'] = 'Ads/adsload/$1/$2';
$route['ads/get_states_new/(:num)/(:num)'] = 'Ads/get_states_new/$1/$2';

$route['verify-breeder']='Page/verify_breeder';

$route['process']='Page/process';
$route['success-stories']='Page/success_stories_old';
$route['reviews']='Page/success_stories';
$route['reset_password/(:any)']='Home/reset_password/';

$route['training']='Page/training/';
$route['request_training']='Page/request_training/';

$route['shopping']='Page/shopping/';

$route['seller/(:any)'] = 'Page/seller/$1';

