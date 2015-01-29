<?php

$router = new \Phalcon\Mvc\Router();

//Se define la ruta
$router->add(
    "/orgusuarios",
    [
    	// 'namespace' => '',
        "controller" => "organizaciones",
        "action"     => "orgusuarios",
    ]
);

$router->handle();