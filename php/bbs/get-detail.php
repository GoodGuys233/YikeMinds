<?php
include "./dbconn.php";
header('Content-Type:application/json; charset=utf-8');

$ret_msg = array();

$post_id = $_POST['post_id'];

try{
    $db->beginTransaction();
    $stmt = $db->prepare("SELECT * FROM bbs_post WHERE pid=?");
    $stmt->execute(array($post_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $row['post_tag'] = explode("@",$row['post_tag']);

    $ret_msg = $row;

    $stmt = $db->prepare("SELECT * FROM bbs_reply WHERE post_id=?");
    $stmt->execute(array($post_id));
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $ret_msg['reply'] = $row;

    $db->commit();
    echo(json_encode($ret_msg));
    
}
catch(PDOException $pdoerr)
{
    $db->rollBack();
}

?>