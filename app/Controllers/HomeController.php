<?php
namespace App\Controllers;

class HomeController
{
    public function home()
    {
        $jobController = new JobController();
        $jobs = $jobController->showActive();

        $applicationController = new ApplicationController();

        require(__DIR__ .'../../../Views/home.php');
    }
    public function login()
    {
        require(__DIR__ .'../../../Views/login.php');
    }
}

