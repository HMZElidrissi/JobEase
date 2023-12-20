<?php

namespace App\Controllers;

use App\Models\Application;

class ApplicationController
{
    private $applicationModel;

    public function __construct()
    {
        $this->applicationModel = new Application();
    }

    public function show()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
        }
        $applications = $this->applicationModel->getAllApplications();
        $jobController = new JobController();
        $userController = new UserController();
        require(__DIR__ .'../../../Views/applications.php');
    }

    public function apply()
    {
        if ($_SESSION['user_id']){
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['apply'])) {
                $data = [
                    'job_id' => $_POST['job_id'],
                    'user_id' => $_SESSION['user_id']
                ];

                $this->applicationModel->addApplication($data);

                header("Location: ?route=home");
            }
        } else {
            header("Location: ?route=login");
        }

    }

    public function approve()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve'])) {
            $id = $_POST['jobId'];
            $this->applicationModel->approveApplication($id);
            header("Location: ?route=applications");
        }
    }

    public function reject()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reject'])) {
            $id = $_POST['jobId'];
            $this->applicationModel->rejectApplication($id);
            header("Location: ?route=applications");
        }
    }

    public function getApplicationById($id)
    {
        return $this->applicationModel->getApplicationById($id);
    }
}