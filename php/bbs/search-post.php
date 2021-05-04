<?php

include "./dbconn.php";
header('Content-Type:application/json; charset=utf-8');

$kw = $_POST['kw'];
$ret_arr = array();

try{
    $db->beginTransaction();
    $stmt = $db->prepare("SELECT * FROM bbs_post WHERE post_title LIKE ? OR post_content LIKE ?");
    $stmt->execute(array("%$kw%","%$kw%"));
    $ret_arr['postct'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

    for($i=0;$i<count($ret_arr);$i++)
    {
        $ret_arr['postct'][$i]['post_tag'] = explode("@",$ret_arr['postct'][$i]['post_tag']);
    }

    $db->commit();
    echo(json_encode($ret_arr));


}
catch(PDOException $pdoerr)
{
    $db->rollBack();
    //echo($pdoerr);
}

?>