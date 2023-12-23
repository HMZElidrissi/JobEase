<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ApplicationController;
use App\Controllers\JobController;

return [
        '/' => [HomeController::class, 'home'],
        '/dashboard' => [HomeController::class, 'dashboard'],
        '/login' => [UserController::class, 'login'],
        '/register' => [UserController::class, 'register'],
        '/logout' => [UserController::class, 'logout'],
        '/applications' => [ApplicationController::class, 'show'],
        '/applications/apply' => [ApplicationController::class, 'apply'],
        '/applications/approve' => [ApplicationController::class, 'approve'],
        '/applications/reject' => [ApplicationController::class, 'reject'],
        '/jobs' => [JobController::class, 'show'],
        '/jobs/add' => [JobController::class, 'add'],
        '/jobs/update' => [JobController::class, 'update'],
        '/jobs/delete' => [JobController::class, 'delete'],
        '/jobs/search' => [JobController::class, 'search']
    ];