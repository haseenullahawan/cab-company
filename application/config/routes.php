<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| In some instances, adhowever, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$default_controller = "welcome";
$controller_exceptions = array('welcome');
//  $route["^((?!\b".implode('\b|\b', $controller_exceptions)."\b).*)$"] = $route['default_controller'].'/$1';
/* foreach($controller_exceptions as $v) {
  $route[$v] = $default_controller . "/".$v;
  $route[$v."/(.*)"] = $default_controller . "/".$v.'/$1';
  } */

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = "auth";
$route['login'] = "auth/login";
$route['submit-contact-form'] = "auth/submitContactForm";
$route['call-me'] = "auth/callMe";
$route['submit-job-form'] = "auth/submitJobForm";
$route['chauffeur'] = "auth/driverlogin";
$route['404_override'] = '';
$route['index'] = "auth";

$route['admin'] = "auth/admin";
$route['forgot_password'] = "auth/forgot_password";
$route['reset_password'] = "auth/reset_password";
$route['drivers/registration'] = 'drivers/registration';

$route['book_now/(:any)'] = "book_now";

// Client ROUTES
$route['client/dashboard'] = 'client/dashboard';


// ADMIN AREA
$route['admin/dashboard'] = "dashboard";
$route['admin/logout'] = "dashboard/logout";

// Rectruitement_config ROUTES
$route['admin/Rectruitement_config'] = "Rectruitement_config";
$route['Rectruitement_config'] = "";
$route['admin/add_jobs'] = "Rectruitement_config/add_jobs";
$route['jobseeker/signup'] = "job/signup";
$route['jobseeker/login'] = "job/login";
$route['jobseeker/home'] = "job/home";

// Language routes
$route['admin/language'] = "language";
$route['admin/language/add'] = "language/add_language";
$route['admin/language/store_language'] = "language/store_language";
$route['admin/language/(:num)/edit'] = "language/edit_language/$1";

$route['admin/translations/(:any)/importcsv'] = "language/importcsv_translations/$1";
$route['admin/translations/(:any)/add'] = "language/add_translations/$1";
$route['admin/translations/(:any)/(:any)/edit'] = "language/edit_translation/$1/$2";
$route['admin/translations/(:any)/delete'] = "language/delete_translatio/$1n";

$route['admin/translations/(:any)'] = "language/translations/$1";

// company routes
$route['admin/company'] = "company";
$route['admin/company/save'] = "company/save";

// department routes
$route['admin/departments'] = "departments";
$route['admin/departments/add'] = "departments/add";
$route['admin/departments/save'] = "departments/save";
$route['admin/departments/(:num)/edit'] = "departments/edit/$1";
$route['admin/departments/(:num)/update'] = "departments/update/$1";
$route['admin/departments/(:num)/delete'] = "departments/delete/$1";

// Roles routes
$route['admin/roles'] = "roles";
$route['admin/roles/add'] = "roles/add";
$route['admin/roles/save'] = "roles/save";
$route['admin/roles/(:num)/edit'] = "roles/edit/$1";
$route['admin/roles/(:num)/update'] = "roles/update/$1";
$route['admin/roles/(:num)/delete'] = "roles/delete/$1";

// Users routes
$route['admin/users'] = "users";
$route['admin/users/add'] = "users/add";
$route['admin/users/save'] = "users/save";
$route['admin/users/(:num)/edit'] = "users/edit/$1";
$route['admin/users/(:num)/update'] = "users/update/$1";
$route['admin/users/(:num)/delete'] = "users/delete/$1";

// supplier routes
$route['admin/supplier'] = "supplier";
$route['admin/supplier/add'] = "supplier/add";
$route['admin/supplier/save'] = "supplier/save";
$route['admin/supplier/(:num)/edit'] = "supplier/edit/$1";
$route['admin/supplier/(:num)/update'] = "supplier/update/$1";
$route['admin/supplier/(:num)/delete'] = "supplier/delete/$1";

$route['accounting'] = "Accounting";
$route['admin/accounting'] = "Accounting";


//Payments_Methods Routs

$route['admin/payment_methods'] = "payment_methods/index";
$route['admin/payment_methods/add'] = "payment_methods/add";
$route['admin/payment_methods/save'] = "payment_methods/save";
$route['admin/payment_methods/(:num)/edit'] = "payment_methods/edit/$1";
$route['admin/payment_methods/(:num)/update'] = "payment_methods/update/$1";
$route['admin/payment_methods/(:num)/delete'] = "payment_methods/delete/$1";


// bills routes
$route['admin/bills'] = "bills";
$route['admin/bills/add'] = "bills/add";
$route['admin/bills/add/(:num)'] = "bills/add/$1";
$route['admin/bills/save'] = "bills/save";
$route['admin/bills/(:num)/edit'] = "bills/edit/$1";
$route['admin/bills/(:num)/update'] = "bills/update/$1";
$route['admin/bills/(:num)/delete'] = "bills/delete/$1";

// bills routes 2
$route['admin/accounting/bills'] = "bills";
$route['admin/accounting/bills/add'] = "bills/add";
$route['admin/accounting/bills/save'] = "bills/save";
$route['admin/accounting/bills/(:num)/edit'] = "bills/edit/$1";
$route['admin/accounting/bills/(:num)/update'] = "bills/update/$1";
$route['admin/accounting/bills/(:num)/delete'] = "bills/delete/$1";

// sales routes
$route['admin/sales'] = "sales";
$route['admin/sales/add'] = "sales/add";
$route['admin/sales/add/(:num)'] = "sales/add/$1";
$route['admin/sales/save'] = "sales/save";
$route['admin/sales/(:num)/edit'] = "sales/edit/$1";
$route['admin/sales/(:num)/update'] = "sales/update/$1";
$route['admin/sales/(:num)/delete'] = "sales/delete/$1";

// sales routes 2
$route['admin/accounting/sales'] = "sales";
$route['admin/accounting/sales/add'] = "sales/add";
$route['admin/accounting/sales/save'] = "sales/save";
$route['admin/accounting/sales/(:num)/edit'] = "sales/edit/$1";
$route['admin/accounting/sales/(:num)/update'] = "sales/update/$1";
$route['admin/accounting/sales/(:num)/delete'] = "sales/delete/$1";




// factoring routes
$route['admin/factoring'] = "factoring";
$route['admin/factoring/add'] = "factoring/add";
$route['admin/factoring/add/(:num)'] = "factoring/add/$1";
$route['admin/factoring/save'] = "factoring/save";
$route['admin/factoring/(:num)/edit'] = "factoring/edit/$1";
$route['admin/factoring/(:num)/update'] = "factoring/update/$1";
$route['admin/factoring/(:num)/delete'] = "factoring/delete/$1";

// factoring routes 2
$route['admin/accounting/factoring'] = "factoring";
$route['admin/accounting/factoring/add'] = "factoring/add";
$route['admin/accounting/factoring/save'] = "factoring/save";
$route['admin/accounting/factoring/(:num)/edit'] = "factoring/edit/$1";
$route['admin/accounting/factoring/(:num)/update'] = "factoring/update/$1";
$route['admin/accounting/factoring/(:num)/delete'] = "factoring/delete/$1";




// bank routes
$route['admin/bank'] = "bank";
$route['admin/bank/add'] = "bank/add";
$route['admin/bank/add/(:num)'] = "bank/add/$1";
$route['admin/bank/save'] = "bank/save";
$route['admin/bank/(:num)/edit'] = "bank/edit/$1";
$route['admin/bank/(:num)/update'] = "bank/update/$1";
$route['admin/bank/(:num)/delete'] = "bank/delete/$1";

// bank routes 2
$route['admin/accounting/bank'] = "bank";
$route['admin/accounting/bank/add'] = "bank/add";
$route['admin/accounting/bank/save'] = "bank/save";
$route['admin/accounting/bank/(:num)/edit'] = "bank/edit/$1";
$route['admin/accounting/bank/(:num)/update'] = "bank/update/$1";
$route['admin/accounting/bank/(:num)/delete'] = "bank/delete/$1";




// reportss routes
$route['admin/reportss'] = "reportss";
$route['admin/reportss/add'] = "reportss/add";
$route['admin/reportss/add/(:num)'] = "reportss/add/$1";
$route['admin/reportss/save'] = "reportss/save";
$route['admin/reportss/(:num)/edit'] = "reportss/edit/$1";
$route['admin/reportss/(:num)/update'] = "reportss/update/$1";
$route['admin/reportss/(:num)/delete'] = "reportss/delete/$1";

// reportss routes 2
$route['admin/accounting/reportss'] = "reportss";
$route['admin/accounting/reportss/add'] = "reportss/add";
$route['admin/accounting/reportss/save'] = "reportss/save";
$route['admin/accounting/reportss/(:num)/edit'] = "reportss/edit/$1";
$route['admin/accounting/reportss/(:num)/update'] = "reportss/update/$1";
$route['admin/accounting/reportss/(:num)/delete'] = "reportss/delete/$1";





$route['admin/invoices'] = "invoices";

//admin bookings pages


// $route['admin/accounting'] = "accounting";
$route['admin/calls'] = "calls";
$route['admin/request'] = "request";
$route['admin/jobs'] = "jobs";
$route['admin/newsletters'] = "newsletter";
$route['admin/files'] = "filemanagement";
$route['admin/tasks'] = "task";

$route['admin/calls/add'] = "calls/add";
$route['admin/request/add'] = "request/add";
$route['admin/jobs/add'] = "jobs/add";
$route['admin/files/add'] = "filemanagement/add";
$route['admin/tasks/add'] = "task/add";
$route['admin/newsletters/add'] = "newsletter/add";

$route['insertadminchathistory'] = "Messages/insertadminreply";
// $route['admin/samplerequest/add'] = "samplerequest/add";
$route['admin/calls/store'] = "calls/store";
$route['admin/request/store'] = "request/store";

// $route['admin/samplerequest/store'] = "samplerequest/store";
$route['admin/jobs/store'] = "jobs/store";
$route['admin/files/store'] = "filemanagement/store";
$route['admin/newsletters/store'] = "newsletter/store";
$route['admin/tasks/store'] = "task/store";

$route['admin/calls/(:num)/edit'] = "calls/edit/$1";
$route['admin/request/(:num)/edit'] = "request/edit/$1";
$route['admin/jobs/(:num)/edit'] = "jobs/edit/$1";
$route['admin/files/(:num)/edit'] = "filemanagement/edit/$1";
$route['admin/files/search_user'] = "filemanagement/search_user/$1";
$route['admin/newsletters/(:num)/edit'] = "newsletter/edit/$1";
$route['admin/tasks/(:num)/edit'] = "task/edit/$1";

$route['admin/calls/(:num)/update'] = "calls/update/$1";
$route['admin/request/(:num)/update'] = "request/update/$1";
$route['admin/jobs/(:num)/update'] = "jobs/update/$1";
$route['admin/files/(:num)/update'] = "filemanagement/update/$1";
$route['admin/newsletters/(:num)/update'] = "newsletter/update/$1";
$route['admin/tasks/(:num)/update'] = "task/update/$1";

$route['admin/calls/(:num)/reply'] = "calls/reply/$1";
$route['admin/request/(:num)/reply'] = "request/reply/$1";
$route['admin/jobs/(:num)/reply'] = "jobs/reply/$1";
$route['admin/newsletter/(:num)/reply'] = "newsletter/reply/$1";

$route['admin/calls/(:num)/delete'] = "calls/delete/$1";
$route['admin/request/(:num)/delete'] = "request/delete/$1";
$route['admin/jobs/(:num)/delete'] = "jobs/delete/$1";
$route['admin/files/(:num)/delete'] = "filemanagement/delete/$1";
$route['admin/newsletters/(:num)/delete'] = "newsletter/delete/$1";
$route['admin/tasks/(:num)/delete'] = "task/delete/$1";


//Supports
$route['admin/support'] = "support";
$route['admin/support/add'] = "support/add";
$route['support/login'] = "support/login";
$route['support/home'] = "support/home";
$route['admin/support/store'] = "support/store";
$route['admin/support/(:num)/edit'] = "support/edit/$1";
$route['admin/support/closeTicket/(:num)'] = "support/closeTicket/$1";
$route['admin/support/(:num)/update'] = "support/update/$1";
$route['admin/support/(:num)/reply'] = "support/reply/$1";
$route['admin/support/(:num)/delete'] = "support/delete/$1";

$route['user/support/ticket_add'] = "support/ticket_add";
$route['user/support/(:num)/ticket_edit'] = "support/ticket_edit/$1";
$route['user/support/closeTicket/(:num)'] = "support/closeTicket/$1";
$route['user/support/(:num)/ticket_update'] = "support/ticket_update/$1";
$route['user/support/(:num)/ticket_reply'] = "support/ticket_reply/$1";
$route['user/support/(:num)/ticket_delete'] = "support/ticket_delete/$1";


// SERVICES
$route['handi-pro'] = "services/3";
$route['handi-prive'] = "services/4";
$route['handi-shuttle'] = "services/5";
$route['handi-scolaire'] = "services/6";
$route['handi-medical'] = "services/7";
$route['handi-business'] = "services/8";
$route['handi-senior'] = "services/9";
$route['handi-event'] = "services/10";
$route['handi-voyage'] = "services/11";
$route['reservation'] = "welcome/onlineBooking";
$route['nos-tarifs'] = "welcome/prices";
$route['knowledgebase'] = "welcome/faqs";
$route['vehicules'] = "welcome/fleet";
$route['testimonials'] = "welcome/testimonials";
$route['zones'] = "welcome/zones";
$route['contact'] = "welcome/contactUs";
// $route['supporttickets'] = "welcome/contactUs";
$route['conditions-d-utilisation'] = "welcome/termsServices";
$route['politique-de-vie-privee'] = "welcome/privacyPolicy";
$route['mentions-legales'] = "welcome/legalNotice";


//QUICK REPLIES

$route['admin/quick_replies'] = "quick_replies";
$route['admin/quick_replies/add'] = "quick_replies/add";
$route['admin/quick_replies/(:num)/edit'] = "quick_replies/edit/$1";
$route['admin/quick_replies/(:num)/update'] = "quick_replies/update/$1";
$route['admin/quick_replies/(:num)/delete'] = "quick_replies/delete/$1";

//CONFIGURATIONS

$route['admin/accounting'] = "accounting";
$route['admin/configurations/add'] = "configurations/add";
$route['admin/configurations/(:num)/edit'] = "configurations/edit/$1";
$route['admin/configurations/(:num)/update'] = "configurations/update/$1";
$route['admin/configurations/(:num)/delete'] = "configurations/delete/$1";

//accounting

// $route['admin/accounting'] = "Accounting";
// $route['admin/accounting/add'] = "configurations/add";
// $route['admin/accounting/(:num)/edit'] = "configurations/edit/$1";
// $route['admin/accounting/(:num)/update'] = "configurations/update/$1";
// $route['admin/accounting/(:num)/delete'] = "configurations/delete/$1";

//SMTP

$route['admin/smtp/(:num)/edit'] = "smtp/edit/$1";
$route['admin/smtp/(:num)/update'] = "smtp/update/$1";

//Notifications

$route['admin/notifications'] = "notifications";
$route['admin/notifications/add'] = "notifications/add";
$route['admin/notifications/(:num)/edit'] = "notifications/edit/$1";
$route['admin/notifications/(:num)/update'] = "notifications/update/$1";
$route['admin/notifications/(:num)/delete'] = "notifications/delete/$1";

//router for clients
$route['admin/clients'] = "clients";
$route['admin/configclients'] = "clients/configurations";
$route['admin/getclienttype'] = "clients/getclienttypeproccess";
$route['admin/addclienttype'] = "clients/addclienttypeproccess";
$route['admin/updateclienttype'] = "clients/updateclienttypeproccess";
$route['admin/deleteclienttype'] = "clients/deleteclienttypeproccess";
$route['admin/getclientpayment'] = "clients/getclientpaymentproccess";
$route['admin/addclientpayment'] = "clients/addclientpaymentproccess";
$route['admin/updateclientpayment'] = "clients/updateclientpaymentproccess";
$route['admin/deleteclientpayment'] = "clients/deleteclientpaymentproccess";
$route['admin/getclientdelay'] = "clients/getclientdelayproccess";
$route['admin/addclientdelay'] = "clients/addclientdelayproccess";
$route['admin/updateclientdelay'] = "clients/updateclientdelayproccess";
$route['admin/deleteclientdelay'] = "clients/deleteclientdelayproccess";


//route for drivers
$route['admin/drivers'] = "drivers";
$route['admin/configdrivers'] = "drivers/configurations";
$route['admin/getdriversstaut'] = "drivers/getstatusprocess";
$route['admin/adddriversstatus'] = "drivers/addstatusprocess";
$route['admin/updatedriversstatus'] = "drivers/updatestatusprocess";
$route['admin/deletedriversstatus'] = "drivers/deletestatusprocess";
$route['admin/getcivility'] = "drivers/getcivilityprocess";
$route['admin/addcivilite'] = "drivers/addciviliteprocess";
$route['admin/updatecivilite'] = "drivers/updateciviliteprocess";
$route['admin/deletecivilite'] = "drivers/deleteciviliteprocess";
$route['admin/adddriverspost'] = "drivers/addpostprocess";
$route['admin/getdriverspost'] = "drivers/getpostprocess";
$route['admin/updatedriverspost'] = "drivers/updatepostprocess";
$route['admin/deletedriverspost'] = "drivers/deletepostprocess";
$route['admin/adddriverspattern'] = "drivers/addpatternprocess";
$route['admin/getdriverspattern'] = "drivers/getpatternprocess";
$route['admin/updatedriverspattern'] = "drivers/updatepatternprocess";
$route['admin/deletedriverspattern'] = "drivers/deletepatternprocess";
$route['admin/adddrivercontract'] = "drivers/addageprocess";
$route['admin/getdriverscontract'] = "drivers/getageprocess";
$route['admin/updatedriverscontract'] = "drivers/updateageprocess";
$route['admin/deletedriverscontract'] = "drivers/deleteageprocess";
$route['admin/adddriversnature'] = "drivers/addseriesprocess";
$route['admin/getdriversnature'] = "drivers/getseriesprocess";
$route['admin/updatedriversnature'] = "drivers/updateseriesprocess";
$route['admin/deletedriversnature'] = "drivers/deleteseriesprocess";
$route['admin/adddrivershours'] = "drivers/addboiteprocess";
$route['admin/getdrivershours'] = "drivers/getboiteprocess";
$route['admin/updatedrivershous'] = "drivers/updateboiteprocess";
$route['admin/deletedrivershours'] = "drivers/deleteboiteprocess";
$route['admin/adddriverstype'] = "drivers/addfuelprocess";
$route['admin/getdriverstype'] = "drivers/getfuelprocess";
$route['admin/updatedriverstype'] = "drivers/updatefuelprocess";
$route['admin/deletedriverstype'] = "drivers/deletefuelprocess";
//router for cars
$route['admin/cars'] = "cars";
$route['admin/configcars'] = "cars/configurations";
$route['admin/addstatus'] = "cars/addstatusprocess";
$route['admin/addpost'] = "cars/addpostprocess";
$route['admin/addpattern'] = "cars/addpatternprocess";
$route['admin/addage'] = "cars/addageprocess";
$route['admin/addseries'] = "cars/addseriesprocess";
$route['admin/addboite'] = "cars/addboiteprocess";
$route['admin/addfuel'] = "cars/addfuelprocess";
$route['admin/addmail'] = "cars/addmailprocess";
$route['admin/addcolor'] = "cars/addcolorprocess";
$route['admin/addnature'] = "cars/addnatureprocess";
$route['admin/getstaut'] = "cars/getstatusprocess";
$route['admin/getpost'] = "cars/getpostprocess";
$route['admin/getpattern'] = "cars/getpatternprocess";
$route['admin/getage'] = "cars/getageprocess";
$route['admin/getseries'] = "cars/getseriesprocess";
$route['admin/getboite'] = "cars/getboiteprocess";
$route['admin/getfuel'] = "cars/getfuelprocess";
$route['admin/getmail'] = "cars/getmailprocess";
$route['admin/getcolor'] = "cars/getcolorprocess";
$route['admin/getnature'] = "cars/getnatureprocess";
$route['admin/updatestatus'] = "cars/updatestatusprocess";
$route['admin/updatepost'] = "cars/updatepostprocess";
$route['admin/updatepattern'] = "cars/updatepatternprocess";
$route['admin/updateage'] = "cars/updateageprocess";
$route['admin/updateseries'] = "cars/updateseriesprocess";
$route['admin/updateboite'] = "cars/updateboiteprocess";
$route['admin/updatefuel'] = "cars/updatefuelprocess";
$route['admin/updatemail'] = "cars/updatemailprocess";
$route['admin/updatecolor'] = "cars/updatecolorprocess";
$route['admin/updatenature'] = "cars/updatenatureprocess";
$route['admin/deletestatus'] = "cars/deletestatusprocess";
$route['admin/deletepost'] = "cars/deletepostprocess";
$route['admin/deletepattern'] = "cars/deletepatternprocess";
$route['admin/deleteage'] = "cars/deleteageprocess";
$route['admin/deleteseries'] = "cars/deleteseriesprocess";
$route['admin/deleteboite'] = "cars/deleteboiteprocess";
$route['admin/deletefuel'] = "cars/deletefuelprocess";
$route['admin/deletemail'] = "cars/deletemailprocess";
$route['admin/deletecolor'] = "cars/deletecolorprocess";
$route['admin/deletenature'] = "cars/deletenatureprocess";





//POPUPS

$route['admin/popups/(:num)/edit'] = "popups/edit/$1";
$route['admin/popups/(:num)/update'] = "popups/update/$1";

//CALLBACK

$route['admin/callback/(:num)/edit'] = "callback/edit/$1";
$route['admin/callback/(:num)/update'] = "callback/update/$1";

//CALLBACK

$route['admin/settings/(:num)'] = "settings1/edit/$1";
$route['admin/settings/(:num)/update'] = "settings1/update/$1";

//REMINDERS

$route['admin/reminders'] = "reminders";
$route['admin/reminders/add'] = "reminders/add";
$route['admin/reminders/(:num)/edit'] = "reminders/edit/$1";
$route['admin/reminders/(:num)/update'] = "reminders/update/$1";
$route['admin/reminders/(:num)/delete'] = "reminders/delete/$1";

// admin Drivers Request
$route['admin/drivers_requests'] = "drivers_request";
$route['admin/drivers_requests/add'] = "drivers_request/add";
$route['admin/drivers_requests/absence_request_store']   = "drivers_request/absence_request_store";
$route['admin/drivers_requests/vacation_request_store']  = "drivers_request/vacation_request_store";
$route['admin/drivers_requests/salary_request_store']    = "drivers_request/salary_request_store";
$route['admin/drivers_requests/notes_request_store']    = "drivers_request/notes_request_store";
$route['admin/drivers_requests/(:num)/edit'] = "drivers_request/edit/$1";
$route['admin/drivers_requests/(:num)/salary_notes_update'] = "drivers_request/salary_notes_update/$1";
$route['admin/drivers_requests/(:num)/absence_vacation_update'] = "drivers_request/absence_vacation_update/$1";
$route['admin/drivers_requests/search'] = "drivers_request/search";

$route['admin/weather/(:num)/update'] = "weather/update/$1";
$route['admin/weather'] = "weather";

// $route['admin/bookings/(:num)/update'] = "bookings/update/$1";
// $route['admin/bookings/(:num)/delete'] = "bookings/delete/$1";

//sample
//admin sample pages
$route['admin/sample'] = "sample";
$route['admin/sample/add'] = "sample/add";
// $route['admin/bookings/save'] = "bookings/save";
// $route['admin/bookings/(:num)/edit'] = "bookings/edit/$1";
// $route['admin/bookings/(:num)/update'] = "bookings/update/$1";
// $route['admin/bookings/(:num)/delete'] = "bookings/delete/$1";

// admin infractions
$route['admin/infraction'] = "infraction";
$route['admin/infraction/add'] = "infraction/add";
// $route['changechatboxstatus'] = "Messages/changechatboxstatus";

// example: '/en/about' -> use controller 'about'
$route['^fr/(.+)$'] = "$1";
$route['^en/(.+)$'] = "$1";
$route['^pt/(.+)$'] = "$1";
$route['^de/(.+)$'] = "$1";
 
// '/en' and '/fr' -> use default controller
$route['^fr$'] = $route['default_controller'];
$route['^en$'] = $route['default_controller'];
$route['^pt$'] = $route['default_controller'];
$route['^de$'] = $route['default_controller']; 
/* End of file routes.php */
/* Location: ./application/config/routes.php */

$route['insertchatdatadetails'] = 'Messages/insertchatdata';