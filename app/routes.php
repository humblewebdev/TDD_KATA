<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

/**
 * Route collection
 */
$routes = new RouteCollection();

/**
 * Routes
 */
$routes->add('hello', new Route('hello'));
$routes->add('goodbye', new Route('goodbye'));
