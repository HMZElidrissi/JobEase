<?php

namespace App\Controllers;

use App\Models\Job;
use App\Services\RenderTable;

class JobController extends CRUDController
{

    public function __construct()
    {
        parent::__construct(JobRepository::class, 'jobs');
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