<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/27 0027
 * Time: 下午 1:38
 */
require_once '../include.php';
$feedBack = array();
if (isset($_POST[user_name]) && isset($_POST[password])) {
    $_username = $_POST[user_name];
    $_password = $_POST[password];
    $array = array(user_name => $_username, password => $_password);
    $link = MySqlHelper::_connect_default(db_name);
    $haveRegister = MySqlHelper::_check(user_table, $link, $array);
    if ($haveRegister && count(mysqli_fetch_assoc($haveRegister)) > 0) {
        $feedBack[result] = 1;
        $feedBack[msg] = login_success;
        $feedBack[data] = empty_data;
    } else {
        $feedBack[result] = -1;
        $feedBack[msg] = incorrect_user_name_or_password;
        $feedBack[data] = empty_data;
    }
    mysqli_close($link);
} else {
    $feedBack[result] = -4;
    $feedBack[msg] = param_defective;
    $feedBack[data] = empty_data;
}
echo json_encode($feedBack, JSON_UNESCAPED_UNICODE);