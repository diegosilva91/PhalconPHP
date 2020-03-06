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

$router->add(
    '/episode/search/{name}.{type:[a-z]+}',
    [
        'controller' => 'episode',
        'action'     => 'search',
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
