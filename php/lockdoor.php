
<?php session_start() ;
if (empty($_SESSION['name']))
{
  echo "请先登录";
  header('Location: ../signin.html');
}
 
  $data['xAction']=$_GET['xAction'];
  $data['xParam']=$_GET['xParam'];
  $data['apiSign']=$_GET['apiSign'];
  $data['callback']=$_GET['callback'];//尤为重要模拟跨callback
  // var_dump($data);
  $url="http://47.104.141.250:8696/lock/";
  $postdata = http_build_query($data);
    $opts = array(
      'http'=>array(
      'method'=>"GET",
      'timeout'=>60,
    )
  );
  $context = stream_context_create($opts);
  $result = file_get_contents($url."?".$postdata, false, $context);
  echo  (json_encode($result));
 
 
 
 
?>