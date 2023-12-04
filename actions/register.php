<?php

require "../classes/User.php";

//get data from form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
//encrypt password
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$user = new User;
$user->createUser($first_name, $last_name, $username, $password);

