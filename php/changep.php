<?php session_start() ;
if (!isset($_SESSION['flag']))
{
  echo "请先登录";
  header('Location: ../login.html');
}
if($_SERVER['HTTP_REFERER']!='https://yike.catop.top/php/admin.php')
{
    die("危险操作已被阻止！");
}
header('Content-Type:application/json; charset=utf-8');
include "dbconn.php";


$id=$_POST['id'];

//返回值
$ret_msg = array();
$ret_msg['err_code'] = '1';
$ret_msg['text'] = '未知错误，请联系工作人员!';

error_reporting(E_ALL ^ E_DEPRECATED);

try{
    //开始事务处理
    $db->beginTransaction(); 
    //pdo状态（prepare为预处理语句）
    $stmt = $db->prepare("UPDATE submited SET resevation= '0'  WHERE id=? LIMIT 1");
    //绑定参数并执行sql语句
    $stmt -> execute(array($id));
    //提交事务
    $db->commit();
    $ret_msg['err_code'] = '0';
    $ret_msg['text'] = '设置成功';



}

catch(PDOException $pdoerr)
{
    //回滚事务
    $db->rollBack();
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '设置失败!';
}

echo(json_encode($ret_msg));