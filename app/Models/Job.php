<?php

namespace App\Models;

use PDO;

class Job
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllJobs()
    {
        $this->db->query("SELECT * FROM jobs");
        return $this->db->fetchAllRecords();
    }

    public function getActiveJobs()
    {
        $this->db->query("SELECT * FROM jobs WHERE is_active = 1");
        return $this->db->fetchAllRecords();
    }

    public function addJob($data)
    {
        if ($data['image']) {
            $this->db->query("INSERT INTO jobs (title, description, location, company, image, is_active) VALUES (:title, :description, :location, :company, :image, :is_active)");
            $this->db->bind(':image', $data['image'], PDO::PARAM_LOB);
        } else {
            $this->db->query("INSERT INTO jobs (title, description, location, company, is_active) VALUES (:title, :description, :location, :company, :is_active)");
        }

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':is_active', $data['is_active']);

        return $this->db->execute();
    }


    public function updateJob($id, $data, $imageContent)
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $this->db->query("UPDATE jobs SET title = :title, description = :description, location = :location, company = :company, image = :image, is_active = :is_active WHERE id = :id");
            $this->db->bind(':id', $id);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':image', $imageContent, PDO::PARAM_LOB);
            $this->db->bind(':is_active', $data['is_active']);
            return $this->db->execute();
        } else {
            $this->db->query("UPDATE jobs SET title = :title, description = :description, location = :location, company = :company, is_active = :is_active WHERE id = :id");
            $this->db->bind(':id', $id);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':is_active', $data['is_active']);
            return $this->db->execute();
        }
    }

    public function getJobTitleById($id)
    {
        $this->db->query("SELECT title FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetchSingleRecord();
    }

    public function deleteJob($id)
    {
        $this->db->query("DELETE FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function searchJobs($keywords, $location, $company)
    {
        $this->db->query("SELECT * FROM jobs WHERE title LIKE :keywords AND location LIKE :location AND company LIKE :company");
        $this->db->bind(':keywords', '%' . $keywords . '%');
        $this->db->bind(':location', '%' . $location . '%');
        $this->db->bind(':company', '%' . $company . '%');

        return $this->db->fetchAllRecords();
    }
}
