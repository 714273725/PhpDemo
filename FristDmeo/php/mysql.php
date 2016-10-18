<?php
require_once 'response.php';
//session_start();
var_dump($_POST);
$username = $_POST['username'];
$password = $_POST['password'];

Response::queryAdmin($username, $password, MYSQLI_ASSOC);

