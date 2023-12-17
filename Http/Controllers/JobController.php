<?php

namespace Http\Controllers;

use Models\Job;

class JobController
{
    private $jobModel;

    public function __construct()
    {
        $this->jobModel = new Job();
    }

    public function show()
    {
        return $this->jobModel->getAllJobs();
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'is_active' => $_POST['is_active']
            ];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
                $imageContent = file_get_contents($_FILES['image']['tmp_name']);
            } else {
                $imageContent = null;
            }

            $this->jobModel->addJob($data, $imageContent);

            header("Refresh: 0");
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $id = $_POST['id'];
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'is_active' => $_POST['is_active']
            ];

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageContent = file_get_contents($_FILES['image']['tmp_name']);
            } else {
                $imageContent = null;
            }

            $this->jobModel->updateJob($id, $data, $imageContent);

            header("Refresh: 0");
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['delete'])) {
            $jobId = $_POST['jobId'];
            $this->jobModel->deleteJob($jobId);
            header("Refresh: 0");
        }
    }

    public function search($params)
    {
        return $this->jobModel->searchJobs($params);
    }
}
