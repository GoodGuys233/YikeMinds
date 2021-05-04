<?php

include "./dbconn.php";
header('Content-Type:application/json; charset=utf-8');
session_start();

$ret_arr = array();

if(empty($_SESSION['user'])){
    echo("用户未登录");
}
else{
    $phone = $_SESSION['phone'];

}

try{
    $db->beginTransaction();
    $stmt = $db->prepare("SELECT * FROM submited WHERE phone=?");
    $stmt->execute(array($phone));
    $user_all_tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    for($i=0;$i<count($user_all_tickets);$i++){
        $ret_arr[$i]['submit_time'] = $user_all_tickets[$i]['cdate'];
    }

}

?>