<?php

include "./dbconn.php";
header('Content-Type:application/json; charset=utf-8');
session_start();

$ret_arr = array();

if($_SESSION['name'] == ''){
    echo("用户未登录");
}
else{
    $phone = $_SESSION['phone'];

}

try{
    $db->beginTransaction();
    $stmt = $db->prepare("SELECT * FROM submited WHERE phone=? ORDER BY id DESC");
    $stmt->execute(array($phone));
    $user_all_tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    for($i=0;$i<count($user_all_tickets);$i++){
        $ret_arr[$i]['submit_time'] = $user_all_tickets[$i]['ydate'];
        $ret_arr[$i]['cmplete_time'] = $user_all_tickets[$i]['cdate'];
        $ret_arr[$i]['submit_object'] = $user_all_tickets[$i]['yobject'];
        $ret_arr[$i]['submit_extra'] = $user_all_tickets[$i]['extra'];
        $ret_arr[$i]['submit_des'] = $user_all_tickets[$i]['des'];
        $ret_arr[$i]['submit_ip'] = $user_all_tickets[$i]['ip'];
        $ret_arr[$i]['submit_id'] = $user_all_tickets[$i]['id'];
        $ret_arr[$i]['submit_deleted'] = $user_all_tickets[$i]['deleted'];
        $ret_arr[$i]['rev_flag'] = $user_all_tickets[$i]['rev_flag'];
        $ret_arr[$i]['cmplete_flag'] = $user_all_tickets[$i]['complete'];
        $ret_arr[$i]['cmplete_head'] = $user_all_tickets[$i]['head'];

        $stmt = $db->prepare(("SELECT * FROM tobedo WHERE wid=?"));
        $stmt->execute(array($ret_arr[$i]['submit_id']));
        $tickt_todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $ret_arr[$i]['todos'] = $tickt_todos;
    }

    $db->commit();
    echo(json_encode($ret_arr));

}
catch(PDOException $pdoerr)
{
    $db->rollBack();

}


?>