<?php
/**
 * Created by PhpStorm.
 * User: gege
 * Date: 2016/10/21
 * Time: 22:05
 */
require_once '../include.php';
require_once '../res/value/string.php';

define("email", "email");
define("user_name", "user_name");
define("password", "password");
define("user_id", "user_id");
$_email = $_POST[email];
$_username = $_POST[user_name];
$_password = $_POST[password];
if ($_email && $_username && $_password) {
    var_dump(get_include_path());
    $array = array(email => $_email, user_name => $_username,
        password => md5($_password), user_id => md5($_username));
    $link = MySqlHelper::_connect_default(db_name);
    $haveRegister = MySqlHelper::_check(user_table, $link, $user = array(user_name => $_username));
    $feedBack = array();
    if ($haveRegister) {
        $feedBack[result] = -1;
        $feedBack[msg] = user_exits;
        $feedBack[data] = "{}";
    } else {
        $result = MySqlHelper::_insert($link, $array, user_table);
        if ($result) {
            $feedBack[result] = 1;
            $feedBack[msg] = "注册成功";
            $feedBack[data] = $result;
        } else {
            $feedBack[result] = -2;
            $feedBack[msg] = "注册失败";
            $feedBack[data] = "{}";
        }
    }
    echo json_encode($feedBack, JSON_UNESCAPED_UNICODE);
    mysqli_close($link);
} else {

}