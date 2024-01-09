<?php

namespace App\Controllers;

use App\Models\Job;
use App\Repository\JobRepository;
use App\Services\RenderTable;

class JobController
{
    private $repository;

    public function __construct($repoName, public $prefix)
    {
        $this->repository = new $repoName();
    }

    public function index()
    {
        $jobs = $this->repository->getAll();

        require(__DIR__ .'../../../views/'.$this->prefix.'/index.php');
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
            $imageContent = null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
                $imageContent = file_get_contents($_FILES['image']['tmp_name']);
            }

            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'location' => $_POST['location'],
                'company' => $_POST['company'],
                'is_active' => $_POST['is_active'],
                'image' => $imageContent
            ];

            $this->jobModel->addJob($data);

            header("Location: /jobs");
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

            header("Location: /jobs");
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['delete'])) {
            $jobId = $_POST['jobId'];
            $this->jobModel->deleteJob($jobId);
            header("Location: /jobs");
        }
    }

    public function search()
    {
        $jobs = $this->jobModel->searchJobs($_GET['keywords'], $_GET['location'], $_GET['company']);
        foreach ($jobs as $job) {
            echo '<article class="postcard light green">';
            echo '<a class="postcard__img_link" href="#">';

            if ($job->image) {
                $imageSrc = 'data:image/jpeg;base64,' . base64_encode($job->image);
            } else {
                $imageSrc = 'https://picsum.photos/300/300';
            }

            echo '<img class="postcard__img" src="' . $imageSrc . '" alt="Image Title" />';
            echo '</a>';
            echo '<div class="postcard__text t-dark">';
            echo '<h3 class="postcard__title green"><a href="#">' . $job->title . '</a></h3>';
            echo '<div class="postcard__subtitle">';
            echo '<ul class="postcard__tagbox" style="list-style: none;">';
            echo '<li class="tag__item play">';
            echo '<a href="#">' . $job->created_at . '</a>';
            echo '</li>';
            echo '<li class="tag__item play">';
            echo '<a href="#">' . $job->company . '</a>';
            echo '</li>';
            echo '<li class="tag__item play">';
            echo '<a href="#">' . $job->location . '</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
            echo '<div class="postcard__preview-txt">';
            echo $job->description;
            echo '<form action="/applications/apply" method="post">';
            echo '<input type="hidden" name="job_id" value="' . $job->id . '">';
            echo '<button type="submit" class="btn btn-primary">Apply</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</article>';
        }

    }

    public function getNumberOfJobs()
    {
        return $this->jobModel->getNumberOfJobs();
    }

    public function getNumberOfActiveJobs()
    {
        return $this->jobModel->getNumberOfActiveJobs();
    }

    public function getNumberOfInactiveJobs()
    {
        return $this->jobModel->getNumberOfInactiveJobs();
    }
}