<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'claims_controller';
$route['404_override'] = 'claims_controller/error404';
$route['translate_uri_dashes'] = FALSE;

$route['login-submit'] = 'claims_controller/login';
$route['dashboard'] = 'claims_controller/dashboard';
$route['staff'] = 'claims_controller/staff';
$route['add-staff'] = 'claims_controller/add_staff';
$route['my-profile'] = 'claims_controller/user_profile';
$route['create-staff'] = 'claims_controller/create_staff';

$route['borrowers/create-borrowers'] = 'borrowers/create_borrowers';
$route['borrowers/new-borrowers'] = 'borrowers/new_borrowers';
$route['borrowers/active-borrowers'] = 'borrowers/active_borrowers';
$route['borrowers/profile/(:num)'] = 'borrowers/borrowers_profile/$1';
$route['register-borrowers'] = 'borrowers/register_borrowers';
$route['delete-borrowers'] = "borrowers/delete_clients";
$route['update-borrowers'] = "borrowers/update_client";

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
$route['pay-loan'] = 'payments/pay_loan';

$route['reports'] = 'reports/all_reports';
$route['get-clients'] = 'reports/get_clients';

$route['logout'] = 'claims_controller/logout';
