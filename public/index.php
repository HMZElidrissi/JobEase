<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ApplicationController;
use App\Controllers\JobController;

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
    case 'dashboard':
        $controller = new HomeController();
        $controller->dashboard();
        break;
    case 'login':
        $controller = new UserController();
        $controller->login();
        break;
    case 'register':
        $controller = new UserController();
        $controller->register();
        break;
    case 'logout':
        $controller = new UserController();
        $controller->logout();
        break;
    case 'applications':
        $controller = new ApplicationController();
        $controller->show();
        break;
    case 'apply':
        $controller = new ApplicationController();
        $controller->apply();
        break;
    case 'approve':
        $controller = new ApplicationController();
        $controller->approve();
        break;
    case 'reject':
        $controller = new ApplicationController();
        $controller->reject();
        break;
    case 'jobs':
        $controller = new JobController();
        $controller->show();
        break;
    case 'addJob':
        $controller = new JobController();
        $controller->add();
        break;
    case 'updateJob':
        $controller = new JobController();
        $controller->update();
        break;
    case 'deleteJob':
        $controller = new JobController();
        $controller->delete();
        break;
    case 'search':
        $controller = new JobController();
        $controller->search($_GET);
        break;
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

