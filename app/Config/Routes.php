<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: X-API-KEY, Origin,X-Requested-With, Content-Type, Accept, Access-Control-Requested-Method, Authorization");
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, PUT, DELETE");
// $method = $_SERVER['REQUEST_METHOD'];
// if ($method == "OPTIONS") {
//     die();
// }

$routes->get('/', 'Home::index');
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->get('/karir', 'LowonganKerjaController::index');
$routes->get('/karir/data', 'LowonganKerjaController::data');
$routes->get('/absensi', 'AbsensiController::index');
$routes->get('/absensi/data', 'AbsensiController::data');
$routes->post('api/login', 'Api\AuthApi::login');
$routes->post('api/absensi', 'Api\AbsensiApi::storeAbsensi');

$routes->group('api', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    $routes->group('user', function ($routes) {
        $routes->post('login', 'AuthUserApi::login');
        $routes->post('register', 'AuthUserApi::register');
        $routes->post('logout', 'AuthUserApi::logout');
    });

    $routes->group('kandidat', function ($routes) {
        $routes->post('login', 'AuthKandidatApi::login');
        $routes->post('register', 'AuthKandidatApi::register');
        $routes->post('logout', 'AuthKandidatApi::logout');
    });

    $routes->get('obat', 'ObatController::index');

    $routes->get('career', 'LowonganKerjaApi::index');

    // Tambahkan rute lain jika diperlukan
});
