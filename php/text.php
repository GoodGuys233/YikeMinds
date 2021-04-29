<head>
    <title>查看数据</title>
    <link rel="shortcut icon" href="../img/yike.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script language=javascript src='https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
    <script src="../jsapi1.js"></script>
    <div class="container">
  <br>

  <!-- 上方三个标签导航栏开始 -->
  <ul class="nav nav-tabs" role="tablist" style="font-size:12px;">

    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">未完成</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu0">未完成待交接</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">预约</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">已完待取</a>
    </li>
        <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3">历史工单</a>
    </li>
    
  </ul>
  
  <!-- 上方三个标签导航栏结束 -->
  <!-- Tab panes -->
  <!---未完成框开始--->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
    <!-- <form method="POST" action="change.php">
    <div class="form-group">
      <label for="email">id:</label>
      <input type="text" class="form-control" id="id" name="id" placeholder="id号">
      </div>
      <div class="form-group">
      <label for="pwd">负责人:</label>
      <input type="text" class="form-control" id="head" name="head" placeholder="负责人">
      </div> -->
      <!-- <input onclick="change1_item();" type="button" class="btn btn-primary" value="已完成未取走";/> 
      <input onclick="change_item();" type="button" class="btn btn-primary" value="已完成已取走";/> 
      <input onclick="tobedo();" type="button" class="btn btn-primary" value="未完成待交接";/>
    </form> -->
    <?php
    //error_reporting(E_ALL ^ E_DEPRECATED);
    $con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
    if(!$con)
{
    die('Could not connect to mysql');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE resevation = '0' and complete = 0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);

echo "<div id='accordion'>";
while($row=mysqli_fetch_array($res))
{
    echo "<div class='card'>";
    echo "<div class='card-header'>";
    echo "<a class='card-link' id='".$row['id']."' data-toggle='collapse' href='#collapseOne".$row['id']."'><b>#".$row['id']."</b>&nbsp;&nbsp;&nbsp;".$row['yname']."</a></div>";
    echo "<div id='collapseOne".$row['id']."' class='collapse' style='padding:10px;' data-parent='#accordion' >";
    echo "<table class='table table-striped'><tbody>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>工单号：</b>".$row['id']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>手机号：</b>".$row['phone']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>QQ号：</b>".$row['QQ']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>送修物品：</b>".$row['yobject']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>附加物品：</b>".$row['extra']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>问题描述：</b>".$row['des']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>预约时间：</b>".$row['resevation']."</td></tr>";
    echo "</tbody></table>";
    echo " <button type='button' class='btn btn-primary' data-toggle='modal' onclick='complete();'>完成已取走</button>";
    echo " <button type='button' class='btn btn-primary' data-toggle='modal' onclick='completebut();'>完成未取走</button>";
    echo " <button type='button' class='btn btn-primary' data-toggle='modal' onclick='tobedo();'>未完代交接</button>";
    echo " <button type='button' class='btn btn btn-danger' data-toggle='modal' onclick='del();' style='float:right;'>删除</button>";
    echo "</div></div>";
}
echo "</div>";
?>
    </div>
    <!---未完成框结束--->
    <!---交接框开始--->
    <div id="menu0" class="container tab-pane fade"><br>
    <!-- <form method="POST" action="change.php">
    <div class="form-group">
      <label for="email">id:</label>
      <input type="text" class="form-control" id="id" name="id" placeholder="id号">
      </div>
      <div class="form-group">
      <label for="pwd">负责人:</label>
      <input type="text" class="form-control" id="head" name="head" placeholder="负责人">
      </div>
      <input onclick="change1_item();" type="button" class="btn btn-primary" value="已完成未取走";/> 
      <input onclick="change_item();" type="button" class="btn btn-primary" value="已完成已取走";/>
    </form> -->
    <?php
////error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect to mysql');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE resevation = '0' and complete = 3 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<div id='accordion'>";
while($row=mysqli_fetch_array($res))
{
    echo "<div class='card'>";
    echo "<div class='card-header'>";
    echo "<a class='card-link' id='".$row['id']."' data-toggle='collapse' href='#collapseOne".$row['id']."'><b>#".$row['id']."</b>&nbsp;&nbsp;&nbsp;".$row['yname']."</a></div>";
    echo "<div id='collapseOne".$row['id']."' class='collapse' style='padding:10px;' data-parent='#accordion' >";
    echo "<table class='table table-striped'><tbody>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>工单号：</b>".$row['id']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>手机号：</b>".$row['phone']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>QQ号：</b>".$row['QQ']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>送修物品：</b>".$row['yobject']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>附加物品：</b>".$row['extra']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>问题描述：</b>".$row['des']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>负责人：</b>".$row['head']."</td></tr>";
    echo "</tbody></table>";
    echo " <button type='button' class='btn btn-primary' data-toggle='modal' onclick='complete();'>完成已取走</button>";
    echo " <button type='button' class='btn btn-primary' data-toggle='modal' onclick='completebut();'>完成未取走</button>";
    echo " <button type='button' class='btn btn btn-danger' data-toggle='modal' onclick='del();' style='float:right;'>删除</button>";
    echo "</div></div>";
}
echo "</div>";
?>
    </div>
    <!---交接框结束--->
    <!---确认预约框开始--->
    <div id="menu1" class="container tab-pane fade"><br>
<?php
////error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE resevation!='0' and complete=0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<div id='accordion'>";
while($row=mysqli_fetch_array($res))
{
    echo "<div class='card'>";
    echo "<div class='card-header'>";
    echo "<a class='card-link pre' id='".$row['id']."' data-toggle='collapse' href='#collapseOne".$row['id']."'><b>#".$row['id']."</b>&nbsp;&nbsp;&nbsp;".$row['yname']."</a></div>";
    echo "<div id='collapseOne".$row['id']."' class='collapse' style='padding:10px;' data-parent='#accordion' >";
    echo "<table class='table table-striped'><tbody>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>工单号：</b>".$row['id']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>手机号：</b>".$row['phone']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>QQ号：</b>".$row['QQ']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>送修物品：</b>".$row['yobject']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>附加物品：</b>".$row['extra']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>问题描述：</b>".$row['des']."</td></tr>";
    echo " <tr> <td  class='card-text'> <b style='width:85px;float:left'>预约时间：</b>".$row['resevation']."</td></tr>";
    echo "</tbody></table>";
    echo " <button type='button' class='btn btn-primary' data-toggle='modal' onclick='reservation();'>确认到场</button>";
    echo " <button type='button' class='btn btn btn-danger' data-toggle='modal' onclick='del();' style='float:right;'>删除</button>";
    echo "</div></div>";
     
}
echo "</div>";
?>
    </div>
    <!---确认预约框结束--->
    <!---确认取走框开始--->
<div id="menu2" class="container tab-pane fade"><br>
<!-- <form method="POST" action="changepp.php">
    <div class="form-group">
      <label for="email">id:</label>
      <input type="text" class="form-control" id="id3" name="id" placeholder="id号">
      <input onclick="change_item4();" type="button" class="btn btn-primary" value="确认已取走";/>
      </div>
    </form> -->
<?php
////error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE  complete=2 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
// echo "<table border='0'   class='table table-striped table-responsive' style='font-size:80%;width:280%;word-break:break-all; word-wrap:break-all;'>
// <tr>
// <th>id</th>
// <th>name</th>
// <th>phone</th>
// <th>QQ</th>
// <th>送修物品</th> <th>问题描述</th>
// <th>附加物品</th>
// <th>登记时间</th>
// <th>完成时间</th>
// <th>负责人</th>
// </tr>";
// $i=1;
// while($row=mysqli_fetch_array($res))
// {

//     echo "<tr>";
//     echo "<td style='word-break:keep-all'>" . $row['id'] ."</td>";
//     echo "<td style='word-break:keep-all'>" . $row['yname'] ."</td>";
//     echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
//     echo "<td>" . $row['QQ'] ."</td>";
//     echo "<td>" . $row['yobject'] ."</td>";
//     echo "<td>" . $row['des'] ."</td>";
//     echo "<td>" . $row['extra'] ."</td>";
//     echo "<td>" . $row['ydate'] ."</td>";
//     echo "<td>" . $row['cdate'] ."</td>";
//     echo "<td style='word-break:keep-all'>" . $row['head'] ."</td>";
//     echo "</tr>";
// }
// echo "</table>";
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
    <!---确认取走框结束--->
    <!---历史工单开始--->
<div id="menu3" class="container tab-pane fade"><br>
<?php
//error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE  complete=1 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<div id='accordion'>";
while($row=mysqli_fetch_array($res))
{
    echo "<div class='card'>";
    echo "<div class='card-header'>";
    echo "<a class='card-link' id='".$row['id']."' data-toggle='collapse' href='#collapseOne".$row['id']."'><b>#".$row['id']."</b>&nbsp;&nbsp;&nbsp;".$row['yname']."</a></div>";
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
    echo "</div></div>";
}
echo "</div>";
?>
    </div>
    <!---历史工单结束--->
  </div>
</div>

  <div id="copyright" style="float:margin-bottom;text-align:center;padding-top:60px;font-size:13px">
    <div class="logo" style="height:35px;margin-bottom:8px;margin-top:-15px">
    <a href="door.php"><img src="../img/yike.png" height=35px></a>
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