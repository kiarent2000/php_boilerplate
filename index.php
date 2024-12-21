<?php

require_once __DIR__ . './vendor/autoload.php';


use App\Router;
use App\Config;

Config::load('app.php');
$basePath = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

$router = new Router($basePath);


require_once __DIR__ . '/routes/web.php';



try {
    $response = $router->handle($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    echo $response;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}