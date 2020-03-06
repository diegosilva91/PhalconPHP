<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */


$loader->registerNamespaces(array(
    'Phalcon' => APP_PATH . '/app/library/',
    'App\Forms'=>APP_PATH.'/forms/',
    'App\Models'=>APP_PATH.'/models/',
));

$loader->register();

$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->apiDir
    ]
)->register();
