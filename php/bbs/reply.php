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
    $user_name = $_SESSION['name'];
    $email = $_SESSION['mail'];
    $content = $_POST['content'];
    $post_id = $_POST['pid'];
    $post_time = date("Y-m-d H:i:s");
}

try{
    $db->beginTransaction();
    $stmt = $db->prepare("SELECT * FROM account WHERE mail=?");
    $stmt->execute(array($email));
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

    //仅管理员可回复
    if($user_info['user_type'] != 'admin'){
        ret_exit(1,'抱歉，仅益科管理员可回复帖子');
    }
    else{
        $stmt = $db->prepare("INSERT INTO bbs_reply(post_id,user_name,reply_text,reply_time) VALUES(?,?,?,?)");
        $stmt->execute(array($post_id,$user_name,$content,$post_time));
        $db->commit();
        
        $ret_msg['err_code'] = '0';
        $ret_msg['err_msg'] = '发布成功！';
        echo(json_encode($ret_msg));
        
    }
}


catch(PDOException $pdoerr) {
    $db->rollBack();

    $ret_msg['err_code'] = '2';
    $ret_msg['err_msg'] = '系统错误，请联系工作人员！';
    echo(json_encode($ret_msg));

    
}


?>