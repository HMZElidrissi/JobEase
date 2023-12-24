<?php

namespace App\Models;
use App\Models\Database;

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

    public function getNumberOfApprovedApplications()
    {
        $this->db->query("SELECT COUNT(*) AS 'nbrOfApprovedApplications' FROM applications WHERE status = 'Approved'");
        return $this->db->fetchSingleRecord();
    }

    public function isApplied($jobId)
    {
        $this->db->query("SELECT * FROM applications WHERE job_id = :job_id AND user_id = :user_id");
        $this->db->bind(':job_id', $jobId);
        $this->db->bind(':user_id', $_SESSION['user_id']);
        return $this->db->fetchSingleRecord();
    }
}