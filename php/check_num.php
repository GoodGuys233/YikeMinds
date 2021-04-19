<?php

header('Content-Type:application/json; charset=utf-8');
include "dbconn.php";

$json_ret = array();

$datetime= new DateTime();
$current_date=$datetime->format('Y-m-d');

$stmt = $db->query("SELECT COUNT(*) FROM submited WHERE complete=0 AND deleted=0");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$today_pending = $row['COUNT(*)'];

$stmt = $db->query("SELECT COUNT(*) FROM submited WHERE 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$all_count = $row['COUNT(*)'];

$json_ret['pending'] = $today_pending;
$json_ret['all'] = $all_count;

echo(json_encode($json_ret));


?>