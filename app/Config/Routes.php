<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');

$routes->group('user', function($routes){
    $routes->get('register', 'RegisterController::index', ['as' => 'register']);
    $routes->get('registerUser', 'RegisterUserController::index', ['as' => 'registerUser']);
    //$routes->post('registerAccount', 'RegisterController::registerAccount', ['as' => 'registerAccount']);
    $routes->post('registerAccount', 'RegisterController::registerAccount', ['as' => 'registerAccount']);
    $routes->post('login', 'Home::checkUser', ['as' => 'login']);
    $routes->get('forget', 'ForgetController::index', ['as' => 'forget']);
    $routes->post('forgetForm', 'ForgetController::forget', ['as' => 'forgetForm']);
    $routes->post('forgetPassword', 'ForgetController::forgetPassword', ['as' => 'forgetPassword']);
    $routes->get('changePassword', 'ForgetController::forgetPass', ['as' => 'changePassword']);
    $routes->get('view', 'Home::viewUser', ['as' => 'view']);
    $routes->get('exit', 'Session::exit', ['as' => 'exit']);
});
$routes->group('type', function($routes){

    $routes->get('admin', 'AdminController::index', ['as' => 'admin', 'filter' => 'admin']);
    $routes->get('obtenerUserNameUser/(:any)','AdminController::obtenerUserNameUser/$1');
    $routes->get('eliminarUser/(:any)','AdminController::eliminarUser/$1');
    $routes->post('crearUser','AdminController::crearUser');
    $routes->post('actualizarUser','AdmintController::actualizarUser');

    $routes->post('demo-pdf', 'AdminController::demoPDF');
    $routes->get('generar-xml', 'AdminController::generarXML', ['as' =>'generar-xml', 'filter' => 'admin']);
    $routes->get('generar-json', 'AdminController::generarJSON', ['as' =>'generar-json', 'filter' => 'admin']);
    $routes->get('generar-qr', 'AdminController::generarQR', ['as' =>'generar-qr', 'filter' => 'admin']);
    $routes->get('descargarqr', 'AdminController::descargarQR', ['as' =>'descargarqr', 'filter' => 'admin']);

    $routes->get('person', 'PersonController::index', ['as' => 'person', 'filter' => 'admin']);
    $routes->get('obtenerUserName/(:any)','PersonController::obtenerUserName/$1');
    $routes->get('eliminar/(:any)','PersonController::eliminar/$1');
    $routes->post('crear','PersonController::crear');
    $routes->post('actualizar','PersonController::actualizar');

    $routes->get('developer', 'DeveloperController::index', ['as' => 'developer', 'filter' => 'regularUser']);
    $routes->post('registerAccountAjax', 'DeveloperController::register', ['as' => 'registerAccountAjax']);

    $routes->get('customer', 'CustomerController::index', ['as' => 'customer', 'filter' => 'regularUser']);
    $routes->get('ceo', 'CeoController::index', ['as' => 'ceo'], ['filter' => 'regularUser']);
    $routes->get('guest', 'GuestController::index', ['as' => 'guest'], ['filter' => 'regularUser']);
    $routes->get('ingeniero', 'IngenieroController::index', ['as' => 'ingeniero', 'filter' => 'regularUser']);
    $routes->get('supervisor', 'SupervisorController::index', ['as' => 'supervisor', 'filter' => 'regularUser']);
});

/*$routes->group('type', ['namespace'=>'App\Controllers\Admin','filter' => 'auth'], function($routes){
    $routes->get('admin', 'AdminController::index', ['as' => 'admin']);
});*/




