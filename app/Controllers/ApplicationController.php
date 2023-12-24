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
            header('Location: /login');
        }
        $applications = $this->applicationModel->getAllApplications();
        $jobController = new JobController();
        $userController = new UserController();
        require(__DIR__ .'../../../Views/applications.php');
    }

    public function apply()
    {
        session_start();
        if ($_SESSION['user_id']){
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['apply'])) {
                $data = [
                    'job_id' => $_POST['job_id'],
                    'user_id' => $_SESSION['user_id']
                ];

                $this->applicationModel->addApplication($data);

                header("Location: /");
            }
        } else {
            header("Location: /login");
        }

    }

    public function approve()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve'])) {
            $id = $_POST['jobId'];
            $this->applicationModel->approveApplication($id);
            header("Location: /applications");
        }
    }

    public function reject()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reject'])) {
            $id = $_POST['jobId'];
            $this->applicationModel->rejectApplication($id);
            header("Location: /applications");
        }
    }

    public function isApplied($jobId)
    {
        return $this->applicationModel->isApplied($jobId);
    }

    public function getApplicationById($id)
    {
        return $this->applicationModel->getApplicationById($id);
    }

    public function getNumberOfApprovedApplications()
    {
        return $this->applicationModel->getNumberOfApprovedApplications();
    }
}