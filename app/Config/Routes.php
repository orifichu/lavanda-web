<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Link');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Link::index');

/*
 * --------------------------------------------------------------------
 * RESTful
 * --------------------------------------------------------------------
 */

$routes->get('links', 'RestLink::index');
$routes->get('juzgados/JPNL', 'RestJuzgado::listarJPNL');
$routes->get('juzgados/JPNLPorId/(:segment)', 'RestJuzgado::listarPorId/$1');
$routes->get('personas/PorId/(:segment)', 'RestPersona::listarPorId/$1');
$routes->get('personas/PorJuzgado/(:segment)', 'RestPersona::listarPorJuzgado/$1');
$routes->get('sedes', 'RestSede::index');
$routes->get('sedes/PorId/(:segment)', 'RestSede::listarPorId/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
