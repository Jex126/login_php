<?php 
require_once "env.php";
require_once $_ENV[1]['dir']."/src/routes/routes.php";
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router = new routeLogin($uri,$method);
$router->vistaLogin();
?>