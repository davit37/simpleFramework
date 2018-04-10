<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use ModernFramework\App;

$request = Request::createFromGlobals();

$karnel= new App();

$response= $karnel->handle($request);
$response->send();