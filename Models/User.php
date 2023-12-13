<?php

use Core\Database;

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function register()
    {

    }
}