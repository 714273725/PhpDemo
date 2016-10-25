<?php
/**
 * Created by PhpStorm.
 * User: gege
 * Date: 2016/10/21
 * Time: 22:05
 */
require_once '../include.php';
define("email", "email");
define("user_name", "user_name");
define("password", "password");
define("user_id", "user_id");
$_email = $_POST[email];
$_username = $_POST[user_name];
$_password = $_POST[password];
if ($_email && $_username && $_password) {
    $array = array(email => $_email, user_name => $_username,
        password => md5($_password), user_id => md5($_username));
    $link = MySqlHelper::_connect_default(db_name);
    $haveRegister = MySqlHelper::_check(user_table, $link, $user = array(user_name => $_username));
    $feedBack = array();
    if ($haveRegister) {
        $feedBack["result"] = -1;
        $feedBack["msg"] = "用户名已存在";
        $feedBack["data"] = "{}";
    } else {
        $result = MySqlHelper::_insert($link, $array, user_table);
        if ($result) {
            $feedBack["result"] = 1;
            $feedBack["msg"] = "注册成功";
            $feedBack["data"] = $result;
        } else {
            $feedBack["result"] = -2;
            $feedBack["msg"] = "注册失败";
            $feedBack["data"] = "{}";
        }
    }
    echo json_encode($feedBack, JSON_UNESCAPED_UNICODE);
    mysqli_close($link);
} else {

}


function fixEncoding($in_str)

{

    $cur_encoding = mb_detect_encoding($in_str);

    if ($cur_encoding == "UTF-8" && mb_check_encoding($in_str, "UTF-8"))
        return $in_str;
    else
        return utf8_encode($in_str);

}