<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;

/**
 * Automated class loader provided by Composer
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Route Collection
 */
include __DIR__ . '/app/config/routes.php';

/**
 * Request Object
 */
$request = Request::createFromGlobals();

/**
 * Route Identification
 */
$matcher = new UrlMatcher($routes, new RequestContext());

/**
 * Event Dispatcher
 */
$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new RouterListener($matcher, new RequestStack()));

/**
 * Controller & Argument Resolvers
 */
$controllerResolver = new ControllerResolver();
$argumentResolver   = new ArgumentResolver();

/**
 * Kernel Init
 */
$kernel = new HttpKernel($dispatcher, $controllerResolver, new RequestStack(), $argumentResolver);

/**
 * Handle Request
 */
$response = $kernel->handle($request);

/**
 * Fire response
 */
$response->send();
