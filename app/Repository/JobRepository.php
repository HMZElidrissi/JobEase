<?php

namespace App\Repository;

use PDO;

class JobRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('jobs', 'App\Models\Job', ['is_active' => '1']);
    }

    public function login($email,$password)
    {
        return false;
        return $user;
    }
}
