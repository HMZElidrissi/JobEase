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
        return $this->applicationModel->getAllApplications();
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

                header("Refresh: 0");
            }
        } else {
            header("Location: Views/login.php");
        }

    }

    public function approve()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve'])) {
            $id = $_POST['jobId'];
            $this->applicationModel->approveApplication($id);
            header("Refresh: 0");
        }
    }

    public function reject()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reject'])) {
            $id = $_POST['jobId'];
            $this->applicationModel->rejectApplication($id);
            header("Refresh: 0");
        }
    }

    public function getApplicationById($id)
    {
        return $this->applicationModel->getApplicationById($id);
    }
}