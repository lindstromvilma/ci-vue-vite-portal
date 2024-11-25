<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// HomeController routes
$routes->group('/', ['namespace' => 'App\Controllers'], function ($routes) {
	$routes->get('', 'HomeController::index');
	$routes->get('lista', 'HomeController::list');
	$routes->get('asiointilippu', 'HomeController::ticket');
	$routes->get('ilmoitukset', 'HomeController::alerts');
});

// PersonController routes
$routes->group('/tyontekijat', ['namespace' => 'App\Controllers'], function ($routes) {
	$routes->get('', 'PersonController::persons');
	$routes->get('kertapalkkiot', 'PersonController::singlePayments');
});

// ProfileController routes
$routes->group('/omat-tiedot', ['namespace' => 'App\Controllers'], function ($routes) {
	$routes->get('', 'ProfileController::index');
});

// FormController routes
$routes->group('/lomake', ['namespace' => 'App\Controllers'], function ($routes) {
	$routes->get('', 'FormController::index');
});

// ViewController routes
$routes->group('/viewcontroller', ['namespace' => 'App\Controllers'], function ($routes) {
	$routes->get('alerts', 'ViewController::alerts');
});
