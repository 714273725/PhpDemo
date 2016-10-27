<?php
session_start();
//如果我是php目录中的文件require这个文件，那么我只能拿到php中的其他php文件  , 如果希望拿到其他文件夹如res/value的文件会碰到权限问题
define("ROOT", domain());
function domain()
{
    $con = strtolower($_SERVER['SCRIPT_NAME']);
    $cle = $_SERVER['SERVER_NAME'];
    $pattern = "/[A-Za-z0-9_]+\\//";
    preg_match_all($pattern, $con, $match);
    if (empty($match)) {
        $match[0] = '';
    }
    $path = '';
    for ($i = 0; $i < count($match[0]); $i++) {
        $path = $path . $match[0][$i];
    }
    return 'http://' . $cle . '/' . $path;
    //return 'http://' . $cle . '/' . $matchs[0];
}


require_once 'php/image.php';
require_once 'php/mysql.php';
require_once 'res/value/string.php';
require_once 'php/verifyString.php';