<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

/**
 * Automated class loader provided by Composer
 */
require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * Route collection
 */
$routes = new RouteCollection();

/**
 * Routes
 */
$routes->add(
    'hello',
    new Route(
        'hello',
        [
            '_controller' => [
                new App\Controllers\BogusController(new App\Models\BogusModel),
                'bogusFunction'
            ]
        ]
    )
);
