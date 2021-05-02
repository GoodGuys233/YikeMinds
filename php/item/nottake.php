<?php session_start() ;
if (!isset($_SESSION['flag']))
{
  echo "请先登录";
  header('Location: ../login.html');
}

?>
<!-- 1234 -->
<head>
    <title>查看数据</title>
    <link rel="shortcut icon" href="../../img/yike.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script language=javascript src='https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
    <script src="../../jsapi.js"></script>
    <div class="container">
  <br>

  <!-- 上方三个标签导航栏开始 -->
  <ul class="nav nav-tabs">

    <li class="nav-item">
      <a class="nav-link" href="./admin.php">未完成</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu0">未完成待交接</a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" href="./reservation.php">预约</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="">已完待取</a>
    </li>
        <li class="nav-item">
      <a class="nav-link" href="./history.php">历史工单</a>
    </li>
    
  </ul>
  <div id="menu2" class="container tab-pane"><br>
<?php
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE  complete=2 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<div id='accordion'>";
while($row=mysqli_fetch_array($res))
{
    echo "<div class='card'>";
    echo "<div class='card-header'>";
    echo "<a class='card-link take' id='".$row['id']."' data-toggle='collapse' href='#collapseOne".$row['id']."'><b>#".$row['id']."</b>&nbsp;&nbsp;&nbsp;".$row['yname']."</a></div>";
    echo "<div id='collapseOne".$row['id']."' class='collapse' style='padding:10px;' data-parent='#accordion' >";
    echo "<table class='table table-striped'><tbody>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>工单号：</b>".$row['id']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>手机号：</b>".$row['phone']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>QQ号：</b>".$row['QQ']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>送修物品：</b>".$row['yobject']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>问题描述：</b>".$row['des']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>附加物品：</b>".$row['extra']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>送修时间：</b>".$row['ydate']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>完成时间：</b>".$row['cdate']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>负责人：</b>".$row['head']."</td></tr>";
    echo "</tbody></table>";
    echo " <button type='button' class='btn btn-primary' data-toggle='modal' onclick='settake();'>确认已取走</button>";
    echo "</div></div>";
}
echo "</div>";
?>
    </div>
    <div id="copyright" style="float:margin-bottom;text-align:center;padding-top:60px;font-size:13px">
    <div class="logo" style="height:35px;margin-bottom:8px;margin-top:-15px">
    <a href="../door.php"><img src="../../img/yike.png" height=35px></a>
    </div>
  <span>
  ©2016-2021<br>山东科技大学益科服务团队<br>
  </span>
  
  </div>
  <div id="author" style="float:margin-bottom;text-align:center;padding-top:10px;font-size:12px;color:grey;">
团结/高效/务实/创新<br>
  <a href="https://beian.miit.gov.cn/">鲁 ICP 备 20012845 号</a><br>
            <?php
          $yiyan = file_get_contents("https://v1.hitokoto.cn/");
            $yiyan_text = json_decode($yiyan,true)['hitokoto'];
            if(!empty($yiyan_text))
            {
                echo($yiyan_text);
            }
          
          ?>
  </div>