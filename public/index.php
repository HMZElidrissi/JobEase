<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$routes = require_once 'routes.php';

if (array_key_exists($uri, $routes)) {
    [$controllerClass, $method] = $routes[$uri];
    $controller = new $controllerClass();
    $controller->$method();
} else {
    http_response_code(404);
    echo "404 Page Not Found";
}
