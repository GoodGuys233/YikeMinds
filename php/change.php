<?php session_start() ;
header('Content-Type:application/json; charset=utf-8');
include "dbconn.php";

$datetime= new DateTime();
$date=$datetime->format('Y-m-d H:i:s');
$head=$_POST['head'];
$id=$_POST['id'];
$complete=$_POST['complete'];
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
//返回值
$ret_msg = array();
$ret_msg['err_code'] = '1';
$ret_msg['text'] = '未知错误，请联系工作人员!';

error_reporting(E_ALL ^ E_DEPRECATED);

try{
    //开始事务处理
    $db->beginTransaction(); 
    //pdo状态（prepare为预处理语句）
    $stmt = $db->prepare("UPDATE submited SET head=? WHERE id=? LIMIT 1");
    //绑定参数并执行sql语句
    $stmt -> execute(array($head,$id));
    //提交事务

    $stmt = $db->prepare("UPDATE submited SET complete=? WHERE id=? LIMIT 1");
    $stmt -> execute(array($complete,$id));
    
    $stmt = $db->prepare("UPDATE submited SET cdate=? WHERE id=? LIMIT 1");
    $stmt -> execute(array($date,$id));
    
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


// $con = mysql_connect("localhost:3306","yk_submit","FMWwsZJYZehkhDLp");
// if(!$con)
// {
//     die('Could not connect : '. mysql_error());
// }
// mysql_select_db("yk_submit",$con);
// $sql="UPDATE submited SET head= '$head' WHERE id ='$id'";
// mysql_query($sql);
// $sql="UPDATE submited SET complete= 1 WHERE id ='$id'";
// mysql_query($sql);
// echo 'success!';
// mysql_close($con);
