<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function getUsernameById($id)
    {
        return $this->userModel->getUsernameById($id)->username;
    }

    public function register() {
        require(__DIR__ .'../../../Views/register.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password1']),
                'role_id' => 2
            ];

            if ($this->userModel->register($data)) {
                header('Location: /login');
            } else {
                die('Something went wrong');
            }
        }
    }

    public function login() {
        require(__DIR__ .'../../../Views/login.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $user = $this->userModel->login($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                if ($user->role_id == 1) {
                    $_SESSION['role'] = 'admin';
                    header('Location: /dashboard');
                } else {
                    $_SESSION['role'] = 'Candidate';
                    header('Location: /');
                }
            } else {
                die('Login failed');
            }
        }
    }

    public function logout() {
        if (isset($_POST['logout'])) {
            session_start();
            session_unset();
            session_destroy();
            header("Location: /");
        }
    }
}