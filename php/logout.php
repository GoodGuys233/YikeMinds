<?
session_start();
$_SESSION['name']='';
$_SESSION['phone'] = '';
$_SESSION['QQ'] = '';
$_SESSION['mail'] = '';
$_SESSION['type']='user';


$ret_msg=array();
$ret_msg['err_code']='0';
$ret_msg['text']="注销成功!";
echo (json_encode($ret_msg));
?>