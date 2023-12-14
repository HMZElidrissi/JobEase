<?php
namespace Models;

use Core\Database;
use PDO;

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (username, email, password, role_name) VALUES(:username, :email, :password, "candidate")');

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->db->bind(':password', $hashedPassword);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $this->db->execute();
        $row = $this->db->fetchSingleRecord();
        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
}