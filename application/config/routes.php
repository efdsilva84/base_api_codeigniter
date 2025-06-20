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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['api/demo'] = 'api/ApiDemoController/index';
$route['api/user'] = 'api/UserController/index';
$route['api/user/cad_user'] = 'api/UserController/cad_user';
$route['api/user/edit/(:any)'] = 'api/UserController/find_user/$1';
$route['api/user/login'] = 'api/UserController/login';

$route['api/starbucks'] = 'api/StarbucksController/index';
$route['api/starbucks/atualiza_star/(:any)'] = 'api/StarbucksController/atualiza_star/$1';

$route['api/eburger'] = 'api/EburgerController/index';
$route['api/eburger/eburger_bebidas'] = 'api/EburgerController/eburger_bebidas';
$route['api/eburger/eburger_txt'] = 'api/EburgerController/eburger_txt';
$route['api/eburger/create_burger'] = 'api/EburgerController/create_burger';
$route['api/eburger/add_item'] = 'api/EburgerController/add_item';
$route['api/eburger/itens_mn'] = 'api/EburgerController/itens_mn';
$route['api/eburger/search_burger/(:any)'] = 'api/EburgerController/search_burger/$1';

$route['api/portifolio/msg_portifolio'] = 'api/PortifolioController/msg_portifolio';

$route['api/thegazette'] = 'api/ThegazetteController/index';
$route['api/thegazette/breaking_news'] = 'api/ThegazetteController/breaking_news';
$route['api/thegazette/login'] = 'api/ThegazetteController/login';
// $route['api/thegazette/new_notice_politices/(:any)'] = 'api/ThegazetteController/new_notice_politices/$1';
$route['api/thegazette/login'] = 'api/ThegazetteController/login';
$route['api/thegazette/new_notice_politices'] = 'api/ThegazetteController/new_notice_politices';
















