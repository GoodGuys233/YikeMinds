<?php session_start() ;
if (!isset($_SESSION['flag']))
{
  echo "请先登录";
  header('Location: ../login.html');
}
?>
    <head>
    <title>查看数据</title>
    <link rel="shortcut icon" href="../img/yike.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script language=javascript src='https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
    <script src="../jsapi.js"></script>
    <div class="container">
  <br>
  <!-- 上方三个标签导航栏开始 -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">未完成</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">预约</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">已完成</a>
    </li>
  </ul>
  <!-- 上方三个标签导航栏结束 -->
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
    <form method="POST" action="change.php">
    <div class="form-group">
      <label for="email">id:</label>
      <input type="text" class="form-control" id="id" name="id" placeholder="id号">
      </div>
      <div class="form-group">
      <label for="pwd">负责人:</label>
      <input type="text" class="form-control" id="head" name="head" placeholder="负责人">
      </div>
      <input onclick="change_item();" type="button" class="btn btn-primary" value="确认";/>
    </form>
    <?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect to mysql');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE resevation = '0' and complete = 0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
// echo "<table border='0' class='table table-striped table-responsive' style='font-size:80%;width:200%;word-break:break-all; word-wrap:break-all;'>
// <tr>
// <th>id</th>
// <th>name</th>
// <th>phone</th>
// <th>QQ</th>
// <th>送修物品</th> <th>问题描述</th>
// <th>附加物品</th>
// <th>填写时间</th>
// </tr>";
// while($row=mysqli_fetch_array($res))
// {

//     echo "<tr>";
//     echo "<td>" . $row['id'] ."</td>";
//     echo "<td>" . $row['yname'] ."</td>";
//     echo "<td>" . $row['phone'] ."</td>";
//     echo "<td>" . $row['QQ'] ."</td>";
//     echo "<td>" . $row['yobject'] ."</td>";
//     echo "<td>" . $row['des'] ."</td>";
//     echo "<td>" . $row['extra'] ."</td>";
//     echo "<td>" . $row['ydate'] ."</td>";
//     echo "</tr>";
// }
// echo "</table>";
// ?>
    <!--</div>-->
    


<!--项目卡片开始-->
<div class='container' style="padding:0">
    
<?php

while($row=mysqli_fetch_array($res))
{
    echo("

          <div id='accordion'>
            <div class='card'>
              <div class='card-header'>
                <a class='card-link' data-toggle='collapse' href=#collapse".$row['id'].">
                  #".$row['id']." ".$row['yobject']." ".$row['des']."<br><span style='float:right'>".$row['ydate']."</span>".
                  "
                </a>
              </div>
              <div id=#collapse".$row['id']." class='collapse show' data-parent='#accordion'>
                <div class='card-body'>"
                  ."工单ID：".$row['id']."<br>客户姓名：".$row['yname']."<br>送修物品：".$row['yobject']."<br>问题描述：".$row['des']."<br>附加物品：".$row['extra']."<br>联系电话：".$row['phone']."<br>联系QQ：".$row['QQ']."<br>送修时间：".$row['ydate'].
                "</div>
              </div>
            </div>
          </div>

    ");
}

?>

</div>
<!--项目卡片结束-->
    
    
    <div id="menu1" class="container tab-pane fade"><br>
 <form method="POST" action="changep.php">
    <div class="form-group">
      <label for="email">id:</label>
      <input type="text" class="form-control" id="id1" name="id" placeholder="id号">
      <input onclick="change_item2();" type="button" class="btn btn-primary" value="确认预约人已经到场";/>
      </div>
    </form>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE resevation = '星期一下午' and complete=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<table border='0'   class='table table-striped table-responsive' style='font-size:80%;width:200%;word-break:break-all; word-wrap:break-all;'>
<tr>
<th>id</th>
<th>name</th>
<th>phone</th>
<th>QQ</th>
<th>送修物品</th> <th>问题描述</th>
<th>附加物品</th>
<th>填写时间</th>
<th>预约时间</th>
</tr>";
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td>" . $row['phone'] ."</td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期一晚上' and complete=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td>" . $row['phone'] ."</td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期二下午' and complete=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td>" . $row['phone'] ."</td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期三下午' and complete=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td>" . $row['phone'] ."</td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期三晚上' and complete=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td>" . $row['phone'] ."</td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期四下午' and complete=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td>" . $row['phone'] ."</td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期四晚上' and complete=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td>" . $row['phone'] ."</td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期五下午' and complete=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td>" . $row['phone'] ."</td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
echo "</table>";
?>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE  complete!=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<table border='0'   class='table table-striped table-responsive' style='font-size:80%;width:200%;word-break:break-all; word-wrap:break-all;'>
<tr>
<th>id</th>
<th>name</th>
<th>phone</th>
<th>QQ</th>
<th>送修物品</th> <th>问题描述</th>
<th>附加物品</th>
<th>登记时间</th>
<th>负责人</th>

</tr>";
$i=1;
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td>" . $row['phone'] ."</td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['head'] ."</td>";
    echo "</tr>";
}
echo "</table>";
?>
    </div>
  </div>
</div>

  <div id="copyright" style="float:margin-bottom;text-align:center;padding-top:60px;font-size:13px">
  <span>
  ©2016-2021<br>山东科技大学益科服务团队<br>


  </span>
  
  </div>
  <div id="author" style="float:margin-bottom;text-align:center;padding-top:10px;font-size:12px;color:grey;">
团结/高效/务实/创新<br>
  <a href="https://beian.miit.gov.cn/">鲁 ICP 备 20012845 号</a><br>
  </div>