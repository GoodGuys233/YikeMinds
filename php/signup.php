<?
//header('Content-Type:application/json; charset=utf-8');
include "dbconn.php";
$uname=$_POST['uname'];
$phone=$_POST['phone'];
$QQ=$_POST['QQ'];
$mail=$_POST['mail'];
$passwd=md5($_POST['passwd']);
$datetime= new DateTime();
$time=$datetime->format('Y-m-d H:i:s');

$stmt = $db->query("SELECT uname FROM account WHERE mail='$mail' ");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if(strlen($uname)<2)
{
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '名称太短';
    
    die(json_encode($ret_msg));
}
if(strlen($head)>150){
        $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '名称过长';
    
    die(json_encode($ret_msg));
}
if(strlen($passwd)<8)
{
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '密码过短';
    
    die(json_encode($ret_msg));
}
elseif (!is_numeric($phone)||strlen($phone)!=11) {
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '电话号码位数错误';
    die(json_encode($ret_msg));
}
//返回值
if($row){
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = "该邮箱已被注册";
}
else{
    $ret_msg = array();
    $ret_msg['err_code'] = '1';
    $ret_msg['text'] = '未知错误，请联系工作人员!';
    try{
        
        //开始事务处理
        $db->beginTransaction(); 
        //pdo状态（prepare为预处理语句）
        $stmt = $db->prepare("INSERT INTO account (uname,phone,QQ,mail,passwd,time) VALUES (?,?,?,?,?,?)");
        //绑定参数并执行sql语句
        $stmt -> execute(array($uname,$phone,$QQ,$mail,$passwd,$time));
        //返回项目id
        $pid = $db->lastInsertId();
        //提交事务
        $ret_msg['err_code'] = '0';
        $ret_msg['text'] = "成功！";
    
    }
    
    catch(PDOException $pdoerr)
    {
        //回滚事务
        $db->rollBack();
        $ret_msg['err_code'] = '1';
        $ret_msg['text'] = '数据库错误';
    }
}

echo(json_encode($ret_msg));