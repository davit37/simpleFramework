<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('hello', new Route('/hello'));
$routes->add('greeting', new Route('/greeting/{nama}',['nama'=>'Surya']));
