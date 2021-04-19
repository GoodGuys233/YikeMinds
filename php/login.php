<?php

include "dbconn.php";
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$name=$_POST['name'];
$passwd=$_POST['pwd'];

try{
    //开始事务处理
    $db->beginTransaction(); 
    //pdo状态（prepare为预处理语句）
    $stmt = $db->prepare("SELECT * FROM admin");
    //绑定参数并执行sql语句
    $stmt -> execute(array());
    //获取返回值
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //提交事务
    $db->commit();

    $mname=$row['mname'];
    $pwd=$row['passwd'];

    if($name==$mname){
        if($passwd==$pwd)
        {
            echo '登录成功';
            $_SESSION['flag']=1;
            header('Location: ./admin.php');
        }
        else{
            echo '用户名或密码错误';
        }
    }
    else
    {
        echo("用户名或密码错误");
    }
}

catch(PDOException $pdoerr)
{
    //回滚事务
    $db->rollBack();
}

// $con = mysql_connect("localhost:3306","yk_submit","FMWwsZJYZehkhDLp");
// if(!$con)
// {
//     die('Could not connect : '. mysql_error());
// }
// mysql_select_db("yk_submit",$con);
// $res=mysql_query("SELECT * FROM admin");
// $row=mysql_fetch_array($res);

// mysql_close($con);