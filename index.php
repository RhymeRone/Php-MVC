<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

spl_autoload_register(function (string $classname) {
    require "src/" . str_replace("\\", "/", $classname) . ".php";
});

$router = new Framework\Router;
$router->add("/mvc/home/index", ['controller' => 'home', 'action' => 'index']);
$router->add("/mvc/products/index", ['controller' => 'products', 'action' => 'index']);
$router->add("/mvc/products/show", ['controller' => 'products', 'action' => 'show']);
$router->add('/mvc/', ['controller' => 'home', 'action' => 'index']);

$params = $router->match($path);

if ($params === false) {
    exit("no route");
}

$action = $params['action'];
$controller = "App\Controllers\\" . ucwords($params['controller']);

$controller_object = new $controller;

$controller_object->$action();
