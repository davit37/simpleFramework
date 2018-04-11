<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('hello', new Route('/hello',['_controller'=>'ModernFramework\Controller\HelloController::hello']));
$routes->add('greeting', new Route('/greeting/{nama}',['nama'=>'Surya', '_controller'=>'ModernFramework\Controller\HelloController::greet',]));
$routes->add('todo_index', new Route('/todo', [
    '_controller' => 'ModernFramework\Controller\TodoController::index',
    ]));
    $routes->add('todo_new', new Route('/todo/new', [
        '_controller' => 'ModernFramework\Controller\TodoController::new',
        ]));
$routes->add('todo_done', new Route('/todo/{id}/done',[
    '_controller'=>'ModernFramework\Controller\TodoController::Done',
]));

$routes->add('todo_edit', new Route('/todo/{id}/edit', [
    '_controller' => 'ModernFramework\Controller\TodoController::edit',
    ]));
    
    $routes->add('todo_delete', new Route('/todo/{id}/delete', [
        '_controller' => 'ModernFramework\Controller\TodoController::delete',
        ]));
                