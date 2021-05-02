<?
session_start();
if(empty($_SESSION['name'])){
  header('Location: ./signin.html');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>个人主页</title>
        <link rel="shortcut icon" href="./img/yike.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script language=javascript src='https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
        <script src="./jsapi.js"></script>
        <!-- <link rel="stylesheet" type="text/css" href="https://www.apple.com/ac/globalnav/6/en_US/styles/ac-globalnav.built.css">
        <link rel="stylesheet" type="text/css" href="https://www.apple.com/ac/localnav/5/styles/ac-localnav.built.css">
        <link rel="stylesheet" type="text/css" href="https://www.apple.com/ac/globalfooter/6/en_US/styles/ac-globalfooter.built.css">
        <link rel="stylesheet" type="text/css" href="https://www.apple.com/ac/localeswitcher/3/zh_CN/styles/localeswitcher.built.css">
        <link rel="stylesheet" href="https://www.apple.com/v/home/hb/built/styles/main.built.css" type="text/css"> -->
        </style>
</head>
<div style="text-align:center;padding-top:50px;font-size:27px;color:black;">
  <img src="./img/yike.png" height=80px>
  山东科技大学益科服务队</br>
  <span style="text-align:center;font-size:12px;color:grey;padding-bottom:20px">团结/高效/务实/创新</span>
</div>
<div class="container">
<?
   echo "<div class='list-group'>";
   echo "<a href='#' class='list-group-item list-group-item-action'>手机号<span style='float: right;'>".$_SESSION['phone']."</span></a>";
   echo "<a href='#' class='list-group-item list-group-item-action'>姓名<span style='float: right;'>".$_SESSION['name']."</span></a>";
   echo "<a href='#' class='list-group-item list-group-item-action'>QQ号<span style='float: right;'>".$_SESSION['QQ']."</span></a>";
   echo "<a href='#' class='list-group-item list-group-item-action'>我的工单</a>";
   echo "<a href='#' class='list-group-item list-group-item-action'>公告</a>";
   echo "<a href='#' class='list-group-item list-group-item-action'>关于</a>";
   echo "</div>";
   echo "<div style='padding-top: 20px;'>";
   echo "<button type='button' class='btn btn-danger btn-lg btn-block' onclick='logout();'>注销</button>";
   echo "</div>";
?>
<!--copyright-->
<div class="container;">
          <div class="jumbotron text-center" style="margin-bottom:16px;margin-top:10px;padding-bottom:55px;padding-top:0px;">
          <div id="copyright" style="float:margin-bottom;text-align:center;padding-top:40px;font-size:12px">
          <span>
          ©2016-2021<br>山东科技大学益科服务团队<br>
          </span>         
          </div>
          <div id="author" style="float:margin-bottom;text-align:center;padding-top:10px;font-size:10px;color:grey;">
        团结/高效/务实/创新<br>
        <a href="https://beian.miit.gov.cn/">鲁 ICP 备 20012845 号</a>
          </div>
          </div>
          </div>
<!-- 底栏开始 -->
<div class="navbar-nav-scroll">
<nav class="navbar navbar-expand navbar-light bg-light bd-navbar-nav flex-row fixed-bottom">
  <a class="navbar-brand" href="#">
  <img src="/img/yike.png" width="30" height="30" alt="">
  Yike
  </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./index.php" style="font-size:10px">
        <img src="/img/note.png" width="30" height="30" alt="">
        登记
        <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="font-size:10px">
        <img src="/img/speak.png" width="30" height="30" alt="">
        BBS
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#" style="font-size:10px">
        <img src="/img/user.png" width="30" height="30" alt="">
        个人
        </a>
      </li>
    </ul>
</nav>
</div>

</div>

</body>
</html>