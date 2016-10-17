<?php
require_once 'response.php';
//session_start();
/*$username = $_POST[' username'];
$password = $_POST['password'];*/
var_dump($_POST);
var_dump($_GET);
var_dump($_REQUEST);
var_dump(phpinfo());
//Response::queryAdmin($username, $password, MYSQLI_ASSOC);

function _POST($str)
{
    $val = !empty($_POST[$str]) ? $_POST[$str] : null;
    return $val;
}
