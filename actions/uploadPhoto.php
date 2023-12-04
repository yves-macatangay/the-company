<?php

require "../classes/User.php";

//get data from the form 
$file_name = $_FILES['photo']['name']; //actual file name (cat.jpg)
$tmp_name = $_FILES['photo']['tmp_name']; //temporary location of the file 

$u = new User;
$u->uploadPhoto($file_name, $tmp_name);