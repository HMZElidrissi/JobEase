<?php
namespace App\Controllers;

class HomeController
{
    public function home()
    {
        session_start();
        $jobController = new JobController();
        $jobs = $jobController->showActive();

        $applicationController = new ApplicationController();

        require(__DIR__ .'../../../Views/home.php');
    }

    public function dashboard()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
        }
        require(__DIR__ .'../../../Views/dashboard.php');
    }
}

