<?php

$path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$segments = explode('/',$path);
$action = $segments[3];
$controller = $segments[2];

require "src/controllers/$controller.php";
$controller_object = new $controller;

$controller_object->$action();
