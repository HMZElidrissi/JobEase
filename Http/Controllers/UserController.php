<?php

namespace Http\Controllers;

use Models\User;

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password1']),
                'role_id' => 2
            ];

            if ($this->userModel->register($data)) {
                header('Location: login.php');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $user = $this->userModel->login($email, $password);
            if ($user) {
                // SESSIONS
                header('Location: dashboard.php');
                /*header('Location: ../index.php');*/
            } else {
                die('Login failed');
            }
        }
    }
}
