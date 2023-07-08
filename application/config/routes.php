<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Frontend_Controller';
$route['admin'] = 'Backend_Controller';
$route['dashboard'] = 'Backend_Controller/dashboard';
$route['logout'] = 'Backend_Controller/logout';
$route['register'] = 'Backend_Controller/register';

$route['dashboard/add-resident'] = 'Backend_Controller/add_resident';
$route['dashboard/view-residents'] = 'Backend_Controller/view_resident';
$route['dashboard/edit-resident/(:num)'] = 'Backend_Controller/edit_resident/$1';
$route['dashboard/delete-resident/(:num)'] = 'Backend_Controller/delete_resident/$1';

$route['dashboard/view-blotter'] = 'Backend_Controller/view_blotter';
$route['dashboard/edit-blotter/(:num)'] = 'Backend_Controller/edit_blotter/$1';
$route['dashboard/delete-blotter/(:num)'] = 'Backend_Controller/delete_blotter/$1';
$route['Backend_Controller/action'] = 'Backend_Controller/action';
$route['dashboard/add-blotter'] = 'Backend_Controller/add_blotter';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
