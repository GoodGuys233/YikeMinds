<?php

//获取数据库配置
$config_str = file_get_contents('./config.json');
$config = json_decode($config_str,true);
$DB_config = $config['DataBase'];
//var_dump($DB_config);

$dbms='mysql';             //数据库类型
$host=$DB_config['DB_address'];         //数据库主机名
$dbName=$DB_config['DB_name'];            //数据库名
$user=$DB_config['DB_user'];              //数据库连接用户名
$pass=$DB_config['DB_password'];                  //密码
$dsn="$dbms:host=$host;dbname=$dbName";   //pdo数据源
$db = new PDO($dsn,$user,$pass);
//关闭pdo自动提交
$db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
//设置EXCEPTION异常处理模式
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?> 

