<?php

/**
 * Automated class loader provided by Composer
 */
require_once __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Route collection
 */
$routes = new RouteCollection();

/**
 * Routes
 */
$routes->add('hello', new Route('hello', [
    '_controller' => function (Request $request) {
        return new Response(sprintf("Hello %s", $request->get('name', 'World')));
    }
]));

$routes->add('goodbye', new Route('goodbye', [
    '_controller' => function (Request $request) {
        return new Response(sprintf("Goodbye %s", $request->get('name', 'World')));
    }
]));
