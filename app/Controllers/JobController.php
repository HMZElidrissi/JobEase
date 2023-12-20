<?php

namespace App\Controllers;

use App\Models\Job;

class JobController
{
    private $jobModel;

    public function __construct()
    {
        $this->jobModel = new Job();
    }

    public function show()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?route=login');
        }
        $jobs = $this->jobModel->getAllJobs();
        require(__DIR__ .'../../../Views/jobs.php');
    }

    public function showActive()
    {
        return $this->jobModel->getActiveJobs();
    }

    public function getJobTitleById($id)
    {
        return $this->jobModel->getJobTitleById($id)->title;
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'location' => $_POST['location'],
                'company' => $_POST['company'],
                'is_active' => $_POST['is_active']
            ];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
                $imageContent = file_get_contents($_FILES['image']['tmp_name']);
            } else {
                $imageContent = null;
            }

            $this->jobModel->addJob($data, $imageContent);

            header("Location: ?route=jobs");
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $id = $_POST['id'];
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'location' => $_POST['location'],
                'company' => $_POST['company'],
                'is_active' => $_POST['is_active']
            ];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageContent = file_get_contents($_FILES['image']['tmp_name']);
            } else {
                $imageContent = null;
            }

            $this->jobModel->updateJob($id, $data, $imageContent);

            header("Location: ?route=jobs");
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['delete'])) {
            $jobId = $_POST['jobId'];
            $this->jobModel->deleteJob($jobId);
            header("Location: ?route=jobs");
        }
    }

    public function search($params)
    {
        return $this->jobModel->searchJobs($params);
    }
}