<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17 0017
 * Time: 下午 5:32
 */
class Response
{
    public static function queryAdmin()
    {
        $connect = mysqli_connect("localhost:3306", "root", "Ge2007314035");
        if (!$connect) {
            die('Could not connect: ' . mysqli_error());
        } else {
            $result = mysqli_query($connect, "SELECT * FROM admin");
            if ($result) {
                echo json_encode($result);
            } else {
                echo json_encode('我是一个饼');
            }
        }
        mysqli_close($connect);
    }
}