<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'claims_controller';
$route['404_override'] = 'claims_controller/error404';
$route['translate_uri_dashes'] = FALSE;

$route['login-submit'] = 'claims_controller/login';
$route['dashboard'] = 'claims_controller/dashboard';

$route['borrowers/create-borrowers'] = 'borrowers/create_borrowers';
$route['borrowers/new-borrowers'] = 'borrowers/new_borrowers';
$route['borrowers/active-borrowers'] = 'borrowers/active_borrowers';
$route['borrowers/profile/(:num)'] = 'borrowers/borrowers_profile/$1';
$route['register-borrowers'] = 'borrowers/register_borrowers';
$route['delete-borrowers'] = "borrowers/delete_clients";

$route['loan/create-loan'] = "loan/create_loan";
$route['loan/create-loan/(:num)'] = "loan/create_loan/$1";
$route['loan/new-loans'] = 'loan/new_loans';
$route['loan/approved-loans'] = 'loan/approved_loans';
$route['loan/rejected-loans'] = 'loan/rejected_loans';
$route['insert-loan'] = "loan/insert_loan";
$route['account-query'] = 'loan/account_query';
$route['approve-loan'] = 'loan/approve_loan';
$route['reject-loan'] = "loan/reject_loan";
$route['remove-loan'] = 'loan/remove_loan';
$route['cash-receive'] = "loan/cash_recieve";
$route['reapply-loan'] = "loan/reapply_loan";

$route['payments/loan-details/(:any)'] = 'payments/loan_details/$1';
$route['payments/loan-details'] = 'payments/loan_details';
$route['search-loan'] = 'payments/search_loan';
$route['logout'] = 'claims_controller/logout';
