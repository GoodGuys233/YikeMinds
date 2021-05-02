<?
session_start();
$_SESSION['name']='';
$ret_msg=array();
$ret_msg['err_code']='0';
$ret_msg['text']="注销成功!";
echo (json_encode($ret_msg));
?>