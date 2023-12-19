<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;

/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/


/*
 * This uses the ternary operator (?:):
 * $route = isset($_GET['route']) ? $_GET['route'] : 'home';
 * This uses the null coalescing operator (??):
 * $route = $_GET['route'] ?? 'home';
 */


$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'home':
        $controller = new HomeController();
        $controller->home();
        break;
    case 'login':
        $logincontroller = new LoginController();
        $logincontroller->login();
        break;
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action


