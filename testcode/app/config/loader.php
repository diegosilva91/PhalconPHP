<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
//$loader = new Phalcon\Loader();
//
//$loader->registerNamespaces(array(
//    'Phalcon' => APP_PATH . 'app/library/'
//));
//
//$loader->register();

$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();
