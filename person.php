<?
session_start();
if(empty($_SESSION['name'])){
  header('Location: ./signin.html');
}
if($_SESSION['type']=="admin"){
  header('Location: ./personadmin.php');
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
        <!-- 外部引入开始 -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!-- icon css-->
        <link rel="stylesheet" href="assets/elagent-icon/style.css">
        <link rel="stylesheet" href="assets/animation/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/pre-loader.js"> </script>
        <script src="assets/bootstrap/js/popper.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/parallaxie.js"></script>
        <script src="js/TweenMax.min.js"></script>
        <script src="js/main.js"></script>
        <!-- 外部引用结束 -->
        </style>
</head>
<body data-scroll-animation="true">

<div class="sign_left signup_left" style="height: 30px;position:fixed !important;">
        <h1></h1>
        <img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top">
        <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
        <!-- <img class="position-absolute middle wow fadeInRight" src="img/" alt="bottom"> -->
        <div class="round wow zoomIn" data-wow-delay="0.2s"></div>
    </div>


<div style="text-align:center;padding-top:70px;font-size:27px;color:black;">
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
  <img src="./img/yike.png" width="30" height="30" alt="">
  Yike
  </a>
    <ul class="navbar-nav">
      <li class="nav-item active" style="margin:0 6vw">
        <a class="nav-link" href="./index.php" style="font-size:10px">
        <img src="./img/note.png" width="30" height="30" alt="">
        
        <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" style="margin:0 6vw">
        <a class="nav-link" href="./bbs" style="font-size:10px">
        <img src="./img/speak.png" width="30" height="30" alt="">

        </a>
      </li>
      <li class="nav-item" style="margin:0 6vw">
        <a class="nav-link" href="./person.php" style="font-size:10px">
        <img src="./img/user.png" width="30" height="30" alt="">

        </a>
      </li>
    </ul>
</nav>
</div>

</div>

</body>
</html>