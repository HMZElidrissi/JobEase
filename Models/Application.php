<?php

namespace Models;

use Core\Database;
use PDO;

class Application
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllApplications()
    {
        $this->db->query("SELECT * FROM applications");
        return $this->db->fetchAllRecords();
    }

    public function addApplication($data)
    {
        $this->db->query("INSERT INTO applications (job_id, user_id) VALUES (:job_id, :user_id)");
        $this->db->bind(':job_id', $data['job_id']);
        $this->db->bind(':user_id', $data['user_id']);
        return $this->db->execute();
    }

    public function getApplicationById($id)
    {
        $this->db->query("SELECT * FROM applications WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetchSingleRecord();
    }

    public function approveApplication($id)
    {
        $this->db->query("UPDATE applications SET status = 'Approved' WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function rejectApplication($id)
    {
        $this->db->query("UPDATE applications SET status = 'Rejected' WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}