<?php

require '../../config.php';
require __DIR__ . '/../../vendor/autoload.php';

use Http\Controllers\UserController;

/*For debugging purposes*/
/*var_dump(class_exists('Http\Controllers\UserController'));*/

/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

$controller = new UserController();
$controller->register();

?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
  <link rel="stylesheet" href="../styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="" method="POST">
      <div class="input-box">
        <input name="username" type="text" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input name="email" type="text" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input name="password1" type="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input name="password2" type="password" placeholder="Confirm password" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>