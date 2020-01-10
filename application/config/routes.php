<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'claims_controller';
$route['404_override'] = 'claims_controller/error404';
$route['translate_uri_dashes'] = FALSE;

$route['login-submit'] = 'claims_controller/login';
$route['dashboard'] = 'claims_controller/dashboard';
// $route['borrowers'] = 'claims_controller/borrowers';

$route['borrowers/create-borrowers'] = 'borrowers/create_borrowers';
$route['borrowers/new-borrowers'] = 'borrowers/new_borrowers';
$route['borrowers/loan-applicants'] = 'borrowers/loan_applicant';
$route['borrowers/approved-borrowers'] = 'borrowers/approved_borrowers';
$route['borrowers/rejected-borrowers'] = 'borrowers/rejected_borrowers';
$route['borrowers/active-borrowers'] = 'borrowers/active_borrowers';
$route['borrowers/profile/(:num)'] = 'borrowers/borrowers_profile/$1';
$route['borrowers/approve-loan'] = 'borrowers/approve_loan';
$route['remove-loan'] = 'borrowers/remove_loan';
$route['register-borrowers'] = 'borrowers/register_borrowers';
$route['reject-loan'] = "borrowers/reject_loan";
$route['delete-borrowers'] = "borrowers/delete_clients";
$route['reapply-loan'] = "borrowers/reapply_loan";
$route['cash-receive'] = "borrowers/cash_recieve";

$route['loan/create-loan'] = "loan/create_loan";
$route['loan/create-loan/(:num)'] = "loan/create_loan/$1";
$route['insert-loan'] = "loan/insert_loan";
$route['account-query'] = 'loan/account_query';

$route['logout'] = 'claims_controller/logout';
