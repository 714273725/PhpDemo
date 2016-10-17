<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17 0017
 * Time: 下午 5:32
 */
class Response
{
    public static function queryAdmin($username, $password, $result_type = MYSQLI_ASSOC)
    {
        $connect = mysqli_connect("localhost:3306", "root", "Ge2007314035");
        mysqli_select_db($connect, "GEGE");
        if (!$connect) {
            die('Could not connect: ' . mysqli_error());
        } else {
            $result = mysqli_query($connect,
                "select * from admin WHERE username ='{$username}' AND password='{$password}'");
            if ($result) {
                $row = mysqli_fetch_array($result, $result_type);
                echo json_encode($row);
            } else {
                echo json_encode('');
            }
        }
        mysqli_close($connect);
    }


    public static function queryAllAdmin($result_type = MYSQLI_ASSOC)
    {
        $connect = mysqli_connect("localhost:3306", "root", "Ge2007314035");
        mysqli_select_db($connect, "GEGE");
        if (!$connect) {
            die('Could not connect: ' . mysqli_error());
        } else {
            $result = mysqli_query($connect, "select * from admin");
            while (@$row = mysqli_fetch_array($result, $result_type)) {
                $rows[] = $row;
            }
            return $rows;
        }
        mysqli_close($connect);
    }
}