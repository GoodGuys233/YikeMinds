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
  
       <button type="button" class="btn btn-danger btn-sm" style="float:right;" data-toggle="modal" data-target="#myModal">删除</button>
  <div class="modal fade" id="myModal" style="width:300px;">
    <div class="modal-dialog modal-sm" style="margin:0 auto">
      <div class="modal-content">
   
        <!-- 模态框头部 -->
        <div class="modal-header" style="left:40px;" >
          <h4 class="modal-title">删除选中的数据</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <!-- 模态框主体 -->
        <div class="modal-body">
          <form method="POST" action="del.php">
        <div class="form-group">
      <label for="email">id:</label>
      <input type="text" class="form-control" id="id2" name="id" placeholder="id号">
      <input onclick="change_item3();" type="button" class="btn btn-danger" style="margin-top:20px;height:50px" value="确定删除";/>
      </div>
      </form>
        </div>
        
        <!-- 模态框底部 -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
        </div>
   
      </div>
    </div>
  </div>
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
      <input onclick="change1_item();" type="button" class="btn btn-primary" value="已完成未取走";/> <!-- complete=2 -->
      <input onclick="change_item();" type="button" class="btn btn-primary" value="已完成已取走";/> <!-- complete=1 -->
      <input onclick="tobedo();" type="button" class="btn btn-primary" value="未完成待交接";/>
    </form>
    <?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
    if(!$con)
{
    die('Could not connect to mysql');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE resevation = '0' and complete = 0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<table border='0' class='table table-striped table-responsive' style='font-size:80%;width:280%;word-break:break-all; word-wrap:break-all;'>
<tr>
<th>id</th>
<th>name</th>
<th>phone</th>
<th>QQ</th>
<th>送修物品</th> <th>问题描述</th>
<th>附加物品</th>
<th>填写时间</th>
</tr>";
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td style='word-break:keep-all'>" . $row['id'] ."</td>";
    echo "<td style='word-break:keep-all'>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "</tr>";
}
echo "</table>";
?>
    </div>
    <div id="menu0" class="container tab-pane fade"><br>
    <form method="POST" action="change.php">
    <div class="form-group">
      <label for="email">id:</label>
      <input type="text" class="form-control" id="id" name="id" placeholder="id号">
      </div>
      <div class="form-group">
      <label for="pwd">负责人:</label>
      <input type="text" class="form-control" id="head" name="head" placeholder="负责人">
      </div>
      <input onclick="change1_item();" type="button" class="btn btn-primary" value="已完成未取走";/> <!-- complete=2 -->
      <input onclick="change_item();" type="button" class="btn btn-primary" value="已完成已取走";/><!-- complete=1 -->
    </form>
    <?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect to mysql');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE resevation = '0' and complete = 3 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<table border='0' class='table table-striped table-responsive' style='font-size:80%;width:280%;word-break:break-all; word-wrap:break-all;'>
<tr>
<th>id</th>
<th>name</th>
<th>phone</th>
<th>QQ</th>
<th>送修物品</th> <th>问题描述</th>
<th>附加物品</th>
<th>填写时间</th>
</tr>";
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td style='word-break:keep-all'>" . $row['id'] ."</td>";
    echo "<td style='word-break:keep-all'>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "</tr>";
}
echo "</table>";
?>
    </div>
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
$sql="SELECT * FROM submited WHERE resevation = '星期一下午' and complete=0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<table border='0'   class='table table-striped table-responsive' style='font-size:80%;width:280%;word-break:break-all; word-wrap:break-all;'>
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
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期一晚上' and complete=0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期二下午' and complete=0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期三下午' and complete=0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期三晚上' and complete=0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期四下午' and complete=0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期四晚上' and complete=0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['resevation'] ."</td>";
    echo "</tr>";
}
$sql="SELECT * FROM submited WHERE resevation = '星期五下午' and complete=0 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td>" . $row['id'] ."</td>";
    echo "<td>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
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
<form method="POST" action="changepp.php">
    <div class="form-group">
      <label for="email">id:</label>
      <input type="text" class="form-control" id="id3" name="id" placeholder="id号">
      <input onclick="change_item4();" type="button" class="btn btn-primary" value="确认已取走";/>
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
$sql="SELECT * FROM submited WHERE  complete=2 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<table border='0'   class='table table-striped table-responsive' style='font-size:80%;width:280%;word-break:break-all; word-wrap:break-all;'>
<tr>
<th>id</th>
<th>name</th>
<th>phone</th>
<th>QQ</th>
<th>送修物品</th> <th>问题描述</th>
<th>附加物品</th>
<th>登记时间</th>
<th>完成时间</th>
<th>负责人</th>

</tr>";
$i=1;
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td style='word-break:keep-all'>" . $row['id'] ."</td>";
    echo "<td style='word-break:keep-all'>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['cdate'] ."</td>";
    echo "<td style='word-break:keep-all'>" . $row['head'] ."</td>";
    echo "</tr>";
}
echo "</table>";
?>
    </div>
    <!--#menu2 end-->
<div id="menu3" class="container tab-pane fade"><br>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost:3306","yike","kRfFmTcPJP4w8DYM");
if(!$con)
{
    die('Could not connect');
}
mysqli_select_db($con,"yike");
$sql="SELECT * FROM submited WHERE  complete=1 and deleted=0 ORDER BY id DESC";
$res=mysqli_query($con,$sql);
echo "<table border='0'   class='table table-striped table-responsive' style='font-size:80%;width:280%;word-break:break-all; word-wrap:break-all;'>
<tr>
<th>id</th>
<th>name</th>
<th>phone</th>
<th>QQ</th>
<th>送修物品</th> <th>问题描述</th>
<th>附加物品</th>
<th>登记时间</th>
<th>完成时间</th>
<th>负责人</th>

</tr>";
$i=1;
while($row=mysqli_fetch_array($res))
{

    echo "<tr>";
    echo "<td style='word-break:keep-all'>" . $row['id'] ."</td>";
    echo "<td style='word-break:keep-all'>" . $row['yname'] ."</td>";
    echo "<td style='word-break:keep-all'><a href='tel:" . $row['phone'] ."'>".$row['phone']."</a></td>";
    echo "<td>" . $row['QQ'] ."</td>";
    echo "<td>" . $row['yobject'] ."</td>";
    echo "<td>" . $row['des'] ."</td>";
    echo "<td>" . $row['extra'] ."</td>";
    echo "<td>" . $row['ydate'] ."</td>";
    echo "<td>" . $row['cdate'] ."</td>";
    echo "<td style='word-break:keep-all'>" . $row['head'] ."</td>";
    echo "</tr>";
}
echo "</table>";
?>
    </div>
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