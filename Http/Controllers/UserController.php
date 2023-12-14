<?php

namespace Http\Controllers;

use Core\Controller;
use Models\User;

class UserController
{
    /**
     * @var mixed
     */
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password1' => trim($_POST['password1']),
                'password2' => trim($_POST['password2'])
            ];

            if ($this->user->register($data)) {
                header('location: login.php');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            if ($this->user->login($data['email'], $data['password'])) {
                header('location: index.php');
            } else {
                die('Something went wrong');
            }
        }
    }
}