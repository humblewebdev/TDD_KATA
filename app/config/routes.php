<?php

/**
 * Automated class loader provided by Composer
 */
require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * TODO: Figure out how to properly load classes
 */
include __DIR__ . '/../../src/Controllers/BogusController.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

/**
 * Route collection
 */
$routes = new RouteCollection();

/**
 * Routes
 */
$routes->add('hello', new Route('hello', [
    '_controller' => [new App\Controllers\BogusController, 'bogusFunction']
]));
