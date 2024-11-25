<?php


$action = $_GET["action"];
$controller = $_GET["controller"];

if($controller === "home"){
    require 'src/controllers/home.php';
    $controller_object = new Home;
} else if($controller === "products"){
    require 'src/controllers/products.php';
    $controller_object = new Products;
}
if ($action === "index") {
    $controller_object->index();
} else if ($action === "show") {
    $controller_object->show();
}
