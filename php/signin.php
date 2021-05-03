<?php
include "dbconn.php";
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$mail=$_POST['mail'];
$passwd=md5($_POST['passwd']);
$ret_msg = array();
$ret_msg['err_code'] = '1';
$ret_msg['text'] = '未知错误，请联系工作人员!';
try{
    $db->beginTransaction();
    $stmt = $db->prepare("SELECT * FROM account where mail='$mail'");
    $stmt -> execute(array());
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $db->commit();
    if($passwd==$row['passwd']){
        $ret_msg['err_code'] = '0';
        $ret_msg['text'] = '登录成功';
        $_SESSION['name'] = $row['uname'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['QQ'] = $row['QQ'];
        $_SESSION['mail'] = $row['mail'];
    }
    else{
        $ret_msg['err_code'] = '1';
        $ret_msg['text'] = "账号或密码错误";
    }
}
catch(PDOException $pdoerr)
{
    //回滚事务
    $db->rollBack();
    echo(json_encode($ret_msg));
    die();
}
echo(json_encode($ret_msg));