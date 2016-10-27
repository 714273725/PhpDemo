<?php
define("db_name","GEGE");
define("user_table","user");
define("mySql_host", "localhost:3306");
define("mySql_user", "root");
define("mySql_password", "Ge2007314035");
define("mySql_charset", "utf-8");

class MySqlHelper
{
    static function _query($table, $link, $array, $result_type = MYSQLI_ASSOC)
    {
        $keys = join(',', array_keys($array));
        $values = "'" . join("','", array_values($array)) . "'";
        $sql = "insert {$table}({$keys}) VALUES ({$values})";
        $result = mysqli_query($link, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_array($result, $result_type);
        } else {
            return false;
        }
    }


    static function _check($table, $link, $array)
    {
        $keys = array_keys($array);
        $values = array_values($array);
        $sql = "select * from {$table}";
        for ($i = 0; $i < count($keys); $i++) {
            if ($i == 0) {
                $sql = $sql . ' where ' . $keys[0] . ' = ' . '\'' . $values[0] . '\'';
            } else {
                $sql = $sql . ' and ' . $keys[(count($keys) - 1)] . ' = ' . '\'' . $values[(count($keys) - 1)] . '\'';
            }
        }
        $result = mysqli_query($link, $sql);
        return $result;
    }


    static function _connect_default($dbName)
    {
        $link = mysqli_connect(mySql_host, mySql_user, mySql_password)
        or die ('数据库连接失败<br/>ERROR ' . mysqli_errno($link) . ':' . mysqli_error($link));
        //设置字符集
        mysqli_set_charset($link, mySql_charset);
        //打开指定的数据库
        mysqli_select_db($link, $dbName) or die('指定的数据库打开失败' . mysqli_errno($link) . ':' . mysqli_error($link));
        return $link;
    }


    static function _connect($host = mySql_host, $dbName,
                             $username = mySql_user, $password = mySql_password,
                             $charset = mySql_charset)
    {
        $link = mysqli_connect($host, $username, $password)
        or die ('数据库连接失败<br/>ERROR ' . mysqli_errno($link) . ':' . mysqli_error($link));
        //设置字符集
        mysqli_set_charset($link, $charset);
        //打开指定的数据库
        mysqli_select_db($link, $dbName) or die('指定的数据库打开失败');
        return $link;
    }


    static function _insert($link, $array, $table)
    {

        $keys = join(',', array_keys($array));
        $values = "'" . join("','", array_values($array)) . "'";
        $sql = "insert {$table}({$keys}) VALUES ({$values})";
        $res = mysqli_query($link, $sql);
        if ($res) {
            return self::_check($table, $link, $array);
        } else {
            return false;
        }
    }


}




