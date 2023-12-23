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

        if (!isset($_SESSION['lang']))
            $_SESSION['lang'] = "en";
        else {
            if ($_GET['lang'] == "en")
                $_SESSION['lang'] = "en";
            elseif ($_GET['lang'] == "fr")
                $_SESSION['lang'] = "fr";
        }
        require_once __DIR__ . '../../../lang/' . $_SESSION['lang'] . '.php';

        require(__DIR__ .'../../../Views/home.php');
    }

    public function dashboard()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
            header('Location: /login');
        }
        require(__DIR__ .'../../../Views/dashboard.php');
    }
}

