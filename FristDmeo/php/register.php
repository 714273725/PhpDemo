<?php
/**
 * Created by PhpStorm.
 * User: gege
 * Date: 2016/10/21
 * Time: 22:05
 */
require_once '../include.php';


$feedBack = array();
if (isset($_POST[user_name]) && isset($_POST[password]) && isset($_POST[user_name]) && isset($_POST[verify])) {
    $_email = $_POST[email];
    $_username = $_POST[user_name];
    $_password = $_POST[password];
    $_verify = $_POST[verify];
    $_verifyLocal = $_SESSION['verify'];
    if (strtolower($_verify) == strtolower($_verifyLocal)) {
        $array = array(email => $_email, user_name => $_username,
            password => $_password, user_id => md5($_username));
        $link = MySqlHelper::_connect_default(db_name);
        $haveRegister = MySqlHelper::_check(user_table, $link, $user = array(user_name => $_username));
        if ($haveRegister && count(mysqli_fetch_assoc($haveRegister)) > 0) {
            $feedBack[result] = -1;
            $feedBack[msg] = user_exits;
            $feedBack[data] = empty_data;
        } else {
            $result = MySqlHelper::_insert($link, $array, user_table);
            if ($result) {
                $feedBack[result] = 1;
                $feedBack[msg] = register_success;
                $feedBack[data] = $result;
            } else {
                $feedBack[result] = -2;
                $feedBack[msg] = register_fail;
                $feedBack[data] = empty_data;
            }
        }
        mysqli_close($link);
    } else {
        $feedBack[result] = -3;
        $feedBack[msg] = verify_not_right;
        $feedBack[data] = empty_data;
    }
} else {
    $feedBack[result] = -4;
    $feedBack[msg] = param_defective;
    $feedBack[data] = empty_data;
}
echo json_encode($feedBack, JSON_UNESCAPED_UNICODE);

