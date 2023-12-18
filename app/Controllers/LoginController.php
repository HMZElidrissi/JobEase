<?php
namespace App\Controllers;

class LoginController
{
    public function login()
    {
        // Fetch data from the "users" table
       
        $data = 'Hello, this is the Login page!';
       
        require(__DIR__ .'../../../view/login.php');
       

    }
}
?>
