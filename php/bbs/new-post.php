<?php

header('Content-Type:application/json; charset=utf-8');
session_start();
include "./dbconn.php";
$ret_msg = array();

function ret_exit($errcode,$msg)
{
    $ret_msg['err_code'] = "$errcode";
    $ret_msg['err_msg'] = "$msg";
    echo(json_encode($ret_msg));
    die();
}


if($_SESSION['name']  == '') {
    ret_exit(1,'未登录益科账号');
}
else {
    $post_user = $_SESSION['name'];
    $post_title = $_POST['title'];
    $post_content = $_POST['content'];
    $email = $_SESSION['mail'];
    $post_tag = $_POST['tag'];
    $ext_tag = '';
    $post_time = date("Y-m-d H:i:s");
}

try{
    $db->beginTransaction();
    $stmt = $db->prepare("SELECT * FROM account WHERE mail=?");
    $stmt->execute(array($email));
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

    //仅管理员可设置置顶和动态
    if($user_info['user_type'] == 'admin'){
        $ext_tag = $_POST['ext_tag'];
    }

    $stmt = $db->prepare("INSERT INTO bbs_post(user_email,user_name,post_title,post_content,post_time,post_tag,ext_tag) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute(array($email,$post_user,$post_title,$post_content,$post_time,$post_tag,$ext_tag));
    
    $ret_msg['err_code'] = '0';
    $ret_msg['err_msg'] = '发布成功！';
    echo(json_encode($ret_msg));
    $db->commit();

}
catch(PDOException $pdoerr) {
    $db->rollBack();

    $ret_msg['err_code'] = '2';
    $ret_msg['err_msg'] = '系统错误，请联系工作人员！';
    echo(json_encode($ret_msg));

    
}



?>