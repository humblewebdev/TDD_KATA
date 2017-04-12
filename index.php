<?php

include __DIR__ . '/app/routes.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

/**
 * Request Object
 */
$request = Request::createFromGlobals();

/**
 * Response Object
 */
$response = new Response();

/**
 * Request context
 */
$context = new RequestContext();
$context->fromRequest($request);

/**
 * Handle request
 */
$matcher = new UrlMatcher($routes, $context);

try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    include sprintf(__DIR__ . '/app/scripts/%s.php', $_route);
} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
}

/**
 * Fire response
 */
$response->send();
