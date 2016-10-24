<?php
define("user_table", "user");
define("db_name", "GEGE");

class User
{
    static function register($array)
    {
        $link = MySqlHelper::_connect_default(db_name);
        MySqlHelper::_insert($link, $array, user_table);
    }
}