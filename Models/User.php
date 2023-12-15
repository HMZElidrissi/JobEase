<?php
namespace Models;

use Core\Database;

class User
{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (username, email, password, role_id) VALUES (:username, :email, :password, :role_id)');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':role_id', $data['role_id']);
        return $this->db->execute();
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        $row = $this->db->fetchSingleRecord();

        if ($row && password_verify($password, $row->password)) {
            return $row;
        }
        return false;
    }

}
