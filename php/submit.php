<?php
header('Content-Type:application/json; charset=utf-8');
include "dbconn.php";
session_start();

//返回值
$ret_msg = array();
if(empty($_SESSION['name']))
{
    $ret_msg['err_code']=1;
    $ret_msg['text'] = '请点击个人页面登录';
    die(json_encode($ret_msg));
}
error_reporting(E_ALL ^ E_DEPRECATED);
$ip = $_SERVER["REMOTE_ADDR"];
// $name=$_POST['name'];
// $phone=$_POST['phone'];
// $QQ=$_POST['QQ'];
$name=$_SESSION['name'];
$phone=$_SESSION['phone'];
$QQ=$_SESSION['QQ'];
$obj=$_POST['obj'];
$extra=$_POST['extra'];
$datetime= new DateTime();
$date=$datetime->format('Y-m-d H:i:s');
$day=date("w");
$sdate=date("a");
$res=$_POST['预约'];
$des=$_POST['des'];
$ret_msg['err_code'] = '1';
$ret_msg['text'] = '未知错误，请联系工作人员!';
if(strlen($obj)>60 || strlen($obj)<6){
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '请认真填写您的送修物品';
    die(json_encode($ret_msg));
}
elseif(strlen($extra)>600 || strlen($extra) < 3)
{
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '附加物品描写过长或者过短';
    die(json_encode($ret_msg));
}
elseif(strlen($des)>600 || strlen($des)<3){
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '描述过长或过短';
    die(json_encode($ret_msg));
}
//ip限制开始
$datetime= new DateTime();
$current_date=$datetime->format('Y-m-d');

$stmt = $db->query("SELECT COUNT(*) FROM submited WHERE ydate>='$current_date 00:00:00' AND ydate<='$current_date 24:00:00' AND ip='$ip' AND deleted=0");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$today_ip_count = $row['COUNT(*)'];

if($today_ip_count >30)
{
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = "您的ip:$ip\n今日已超出最大提交数限制，请联系管理员预约！";
    die(json_encode($ret_msg));
}
//ip限制结束

try{
    
    //开始事务处理
    $db->beginTransaction(); 
    //pdo状态（prepare为预处理语句）
    
    if($res == '0'){
        $stmt = $db->prepare("INSERT INTO submited (yname,phone,QQ,yobject,extra,ydate,resevation,des,ip) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt -> execute(array($name,$phone,$QQ,$obj,$extra,$date,$res,$des,$ip));
    }
    else{
        $stmt = $db->prepare("INSERT INTO submited (yname,phone,QQ,yobject,extra,ydate,resevation,des,ip,rev_flag) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $rev_flag = '1';
        $stmt -> execute(array($name,$phone,$QQ,$obj,$extra,$date,$res,$des,$ip,$rev_flag));
    }
    

    //返回项目id
    $pid = $db->lastInsertId();
    
    //提交事务
    $db->commit();
    $ret_msg['err_code'] = '0';
    $ret_msg['text'] = "成功预约！您的id号为：[$pid]\n请告知工作人员";
}

catch(PDOException $pdoerr)
{
    //回滚事务
    $db->rollBack();
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = "数据库错误";
}


// $con = mysql_connect("localhost:3306","yk_submit","FMWwsZJYZehkhDLp");
// if(!$con)
// {
//     die('Could not connect : '. mysql_error());
// }
// mysql_select_db("yk_submit",$con);
// $sql="INSERT INTO submited (yname,phone,QQ,yobject,extra,ydate,resevation)
// VALUES
// ('$name','$phone','$QQ','$obj','$extra','$date','$res')";
// if(!mysql_query($sql,$con))
// {
//     die('Error: ' . mysql_error());
// }
// echo "Success!";
// mysql_close($con);

echo(json_encode($ret_msg));

?>