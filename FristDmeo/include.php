<?php
//定义ROOT为项目的根目录
define("ROOT", domain());
var_dump(ROOT);
function domain()
{
    $con = strtolower($_SERVER['SCRIPT_NAME']);
    $cle = $_SERVER['SERVER_NAME'];
    $pattern = "/[A-Za-z0-9_]+\//";
    preg_match_all($pattern, $con, $matchs);
    if (empty($matchs)) {
        $matchs[0] = '';
    }
    $path = '';
    for ($i = 0; $i < count($matchs[0]); $i++) {
        $path = $path . $matchs[0][$i];
    }
    //return 'http://' . $cle . '/' . $path;
    return 'http://' . $cle . '/' . $matchs[0];
}


require_once 'image.php';
require_once 'mysql.php';
require_once 'res/value/string.php';
require_once 'user.function.php';
require_once 'verifyString.php';