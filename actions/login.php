<?php

require "../classes/User.php";

//get data from form
$username = $_POST['username'];
$password = $_POST['password'];

$user = new User;
$user->login($username, $password);