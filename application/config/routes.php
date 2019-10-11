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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['usuarios/logout'] = 'usuarios/logout';
$route['usuarios/login'] = 'usuarios/login';
$route['usuarios/update'] = 'usuarios/update';
$route['usuarios/delete'] = 'usuarios/delete';
$route['usuarios/create'] = 'usuarios/create';
$route['usuarios/(:any)'] = 'usuarios/view/$1';
$route['usuarios'] = 'usuarios';

$route['inspecciones/update'] = 'inspecciones/update';
$route['inspecciones/delete'] = 'inspecciones/delete';
$route['inspecciones/create'] = 'inspecciones/create';
$route['inspecciones/(:any)'] = 'inspecciones/view/$1';
$route['inspecciones'] = 'inspecciones';

$route['solicitudes/update'] = 'solicitudes/update';
$route['solicitudes/delete'] = 'solicitudes/delete';
$route['solicitudes/create'] = 'solicitudes/create';
$route['solicitudes/(:any)'] = 'solicitudes/view/$1';
$route['solicitudes'] = 'solicitudes';

$route['hidrantes/search_name'] = 'hidrantes/search_name';
$route['hidrantes/update'] = 'hidrantes/update';
$route['hidrantes/delete'] = 'hidrantes/delete';
$route['hidrantes/create'] = 'hidrantes/create';
$route['hidrantes/(:any)'] = 'hidrantes/view/$1';
$route['hidrantes'] = 'hidrantes';

$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
