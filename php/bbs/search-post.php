<?php

include "./dbconn.php";
header('Content-Type:application/json; charset=utf-8');

$kw = $_POST['kw'];

try{
    $db->beginTransaction();
    $stmt = $db->prepare("SELECT * FROM bbs_post WHERE post_title LIKE %?%");
    $stmt->execute(array($kw));
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $db->commit();
    echo(json_encode($row));


}
catch(PDOException $pdoerr)
{
    $db->rollBack();
    echo($pdoerr);
}

?>