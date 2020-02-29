<?php

$router = $di->getRouter();

// Define your routes here
use Phalcon\Mvc\Router;

$router = new Router();

$router->add(
    'example',
    [
        'controller' => 'list',
        'action'     => 'show',
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
