<?php
include "./dbconn.php";
header('Content-Type:application/json; charset=utf-8');
session_start();
$ret_msg = array();
$pageNum = $_POST['pageNum'];
//只允许传入整数页码，并且1-10页
if(!(ctype_digit($pageNum) && $pageNum>=1 && $pageNum<=10))
{
    $ret_msg['errcode'] = '2';
    $ret_msg['msg'] = 'Sorry, our system encounted some error :(';
    echo(json_encode($ret_msg));
    die();
}


try
{
    $db->beginTransaction();
    //获取帖子最大id
    $stmt = $db->prepare("SELECT MAX(pid) FROM bbs_post");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxPostId = $row['MAX(pid)'];
    $post_id_min = ($pageNum-1)*10;


    //获取最新10条帖子
    $stmt_getpost = $db->prepare("SELECT * FROM bbs_post ORDER BY pid DESC LIMIT ?,10");
    $stmt_getpost->bindParam(1,$post_id_min,PDO::PARAM_INT);
    $stmt_getpost->execute();
    $rows_post = $stmt_getpost->fetchAll(PDO::FETCH_ASSOC);
    
    $ret_msg['errcode'] = 0;
    $ret_msg['postnum'] = count($rows_post);  //条数
    $ret_msg['postct'] = array(); //内容
    $ret_msg['msg'] = "";


    for($i=0;$i<count($rows_post);$i++)
    {
        
        //帖子总体信息
        $ret_msg['postct'][$i] = array();
        $ret_msg['postct'][$i]['pid'] = $rows_post[$i]['pid'];
        $ret_msg['postct'][$i]['user_name'] = $rows_post[$i]['user_name'];
        $ret_msg['postct'][$i]['post_title'] = $rows_post[$i]['post_title'];
        $ret_msg['postct'][$i]['post_content'] = $rows_post[$i]['post_content'];
        $ret_msg['postct'][$i]['post_tag'] = explode("@",$rows_post[$i]['post_tag']);
        $ret_msg['postct'][$i]['ext_tag'] = $rows_post[$i]['ext_tag'];
        $ret_msg['postct'][$i]['post_time'] = substr($rows_post[$i]['post_time'],0,19);
    }

    $db->commit();
    echo(json_encode($ret_msg));

}
catch(PDOException $pdoerr)
{
    $db->rollBack();
    $ret_msg['errcode'] = '2';
    $ret_msg['msg'] = 'Sorry, our system encounted some error :(';
    echo(json_encode($ret_msg));

}

?>