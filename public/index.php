<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\LoginController;



$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'fetchMoreUsers':
        $controller = new HomeController();
        $controller->fetchMoreUsers();
        break;
    case 'login':
        $logincontroller = new LoginController();
        $logincontroller->login();
        break;
    // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action


