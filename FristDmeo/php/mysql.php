<?php
require_once 'response.php';
//session_start();
$username = $_POST['username'];
$password = $_POST['password'];

Response::queryAdmin($username, $password, MYSQLI_ASSOC);

