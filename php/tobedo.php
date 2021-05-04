<?php session_start() ;
header('Content-Type:application/json; charset=utf-8');
include "dbconn.php";
$wid=$_POST['wid'];
$head=$_POST['head'];
$reason=$_POST['reason'];
$complete=$_POST['complete'];
$datetime= new DateTime();
$time=$datetime->format('Y-m-d H:i:s');
if(strlen($head)<6)
{
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '请填写负责人';
    
    die(json_encode($ret_msg));
}
if(strlen($head)>150){
        $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '请认真填写负责人';
    
    die(json_encode($ret_msg));
}
if(strlen($reason)<6)
{
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '请填写原因';
    
    die(json_encode($ret_msg));
}
//返回值
$ret_msg = array();
$ret_msg['err_code'] = '1';
$ret_msg['text'] = '未知错误，请联系工作人员!';
error_reporting(E_ALL ^ E_DEPRECATED);

try{
    //开始事务处理
    $db->beginTransaction(); 
    //pdo状态（prepare为预处理语句）
    $stmt = $db->prepare("INSERT INTO tobedo (wid,head,reason,time) VALUES (?,?,?,?)");
    //绑定参数并执行sql语句
    $stmt -> execute(array($wid,$head,$reason,$time));

    $stmt = $db->prepare("UPDATE submited SET complete=? WHERE id=? LIMIT 1");
    $stmt -> execute(array($complete,$wid));
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