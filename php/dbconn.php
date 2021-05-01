<?php
$dbms='mysql';             //数据库类型
$host='localhost';         //数据库主机名
$dbName='yike';            //数据库名
$user='yike';              //数据库连接用户名
$pass='kRfFmTcPJP4w8DYM';                  //密码
$dsn="$dbms:host=$host;dbname=$dbName";   //pdo数据源
$db = new PDO($dsn,$user,$pass);
//关闭pdo自动提交
$db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
//设置EXCEPTION异常处理模式
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?> 

