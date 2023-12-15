<?php

namespace Models;

use Core\Database;
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

    public function addJob($data, $imageContent)
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $this->db->query("INSERT INTO jobs (title, description, image, is_active) VALUES (:title, :description, :image, :is_active)");
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':image', $imageContent, PDO::PARAM_LOB);
            $this->db->bind(':is_active', $data['is_active']);
            return $this->db->execute();
        } else {
            $this->db->query("INSERT INTO jobs (title, description, is_active) VALUES (:title, :description, :is_active)");
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':is_active', $data['is_active']);
            return $this->db->execute();
        }
    }

    public function updateJob($id, $data, $imageContent)
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $this->db->query("UPDATE jobs SET title = :title, description = :description, image = :image, is_active = :is_active WHERE id = :id");
            $this->db->bind(':id', $id);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':image', $imageContent, PDO::PARAM_LOB);
            $this->db->bind(':is_active', $data['is_active']);
            return $this->db->execute();
        } else {
            $this->db->query("UPDATE jobs SET title = :title, description = :description, is_active = :is_active WHERE id = :id");
            $this->db->bind(':id', $id);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':is_active', $data['is_active']);
            return $this->db->execute();
        }
    }


    public function deleteJob($id)
    {
        $this->db->query("DELETE FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}