<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;


$request = Request::createFromGlobals();

include __DIR__.'/config/routes.php';

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes,$context);

try{
    $response = new Response();

    extract($matcher->match($request->getPathInfo()));

    include sprintf('%s.php', $_route);
}catch(ResourceNotFoundException $e){
    $response = new Response('Halaman tidak ditemukan', Response::HTTP_NOT_FOUND);
}

$response->send();