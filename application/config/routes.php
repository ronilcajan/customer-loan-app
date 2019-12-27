<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'claims_controller';
$route['404_override'] = 'claims_controller/error404';
$route['translate_uri_dashes'] = FALSE;

$route['login-submit'] = 'claims_controller/login';
$route['dashboard'] = 'claims_controller/dashboard';
$route['borrowers'] = 'claims_controller/borrowers';
$route['register-clients'] = 'claims_controller/register_client';
$route['borrowers/client-profile/(:num)'] = 'claims_controller/client_profile/$1';
$route['loan'] = 'claims_controller/loan';
$route['loan/apply-loan/(:num)'] = 'claims_controller/loan/$1';
$route['account-query'] = 'claims_controller/account_query';
$route['create-loan'] = 'claims_controller/create_loan';
$route['delete-clients'] = "claims_controller/delete_clients";
$route['logout'] = 'claims_controller/logout';
