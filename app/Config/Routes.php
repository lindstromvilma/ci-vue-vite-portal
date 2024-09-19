<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/lista', 'HomeController::list');
$routes->get('/asiointilippu', 'HomeController::ticket');
$routes->get('/tyontekijat', 'PersonController::persons');