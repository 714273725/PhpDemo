<?php
$username = $_POST['username'];
$password = $_POST['password'];
Response::queryAdmin($username, $password, MYSQLI_ASSOC);