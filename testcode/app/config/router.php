<?php

$router = $di->getRouter();

// Define your routes here
use Phalcon\Mvc\Router;

$router = new Router();

$router->add(
    '/character/showID/{id}',
    [
        'controller' => 'character',
        'action'     => 'showID',
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
