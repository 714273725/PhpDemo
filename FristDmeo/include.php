<?php
//定义ROOT为项目的根目录
define("ROOT","http://localhost/FristDmeo");
set_include_path(".".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."lib".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."core".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."php".PATH_SEPARATOR.get_include_path());
require_once 'image.php';
require_once 'string.php';
require_once 'mysql.php';