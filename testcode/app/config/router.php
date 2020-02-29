<?php

$router = $di->getRouter();

// Define your routes here
use Phalcon\Mvc\Router;

$router = new Router();

$router->add(
    'example',
    [
        'controller' => 'indexController',
        'action'     => 'list',
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
