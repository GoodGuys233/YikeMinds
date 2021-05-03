<?php

header('Content-Type:application/json; charset=utf-8');
session_start();
include "./dbconn.php";

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
    $post_id = $_POST['pid'];

}


try{
    $db->beginTransaction();
    $stmt = $db->prepare("SELECT * FROM account WHERE mail=?");
    $stmt->execute(array($email));
    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

    //仅管理员可删除所有帖子
    if($user_info['user_type'] == 'admin'){
        $stmt = $db->prepare("DELETE FROM bbs_post WHERE pid=? LIMIT 1");
        $stmt->execute(array($post_id));
        $db->commit();

        $ret_msg['err_code'] = '0';
        $ret_msg['err_msg'] = '删除成功！';
        echo(json_encode($ret_msg));
    }
    else{
        //普通用户删帖
        $stmt = $db->prepare("DELETE FROM bbs_post WHERE(pid=? AND user_email=?) LIMIT 1");
        $stmt->execute(array($post_id,$email));
        $db->commit();

        $ret_msg['err_code'] = '0';
        $ret_msg['err_msg'] = '删除成功！';
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