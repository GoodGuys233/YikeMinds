<?php
//获取数据库配置
$config_str = file_get_contents('../../config.json');
$config = json_decode($config_str,true);
$DB_config = $config['DataBase'];

$con = mysqli_connect($DB_config['DB_address'],$DB_config['DB_user'],$DB_config['DB_password']);
if(!$con)
{
    die('Could not connect to mysql');
}
mysqli_select_db($con,$DB_config['DB_name']);


?>