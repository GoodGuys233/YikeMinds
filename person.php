<?
session_start();
if (empty($_SESSION['name'])) {
  header('Location: ./signin.html');
}
if ($_SESSION['type'] == "admin") {
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
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script language=javascript src='https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
  <script src="./jsapi.js"></script>

  <script src="js/pre-loader.js"> </script>

  </style>
</head>

<body data-scroll-animation="true">

  <div class="body_wrapper">
    <section class="signup_area signup_area_height">
      <div class="row ml-0 mr-0">
        <div class="sign_left signup_left style=" height: 30px;position:fixed !important;">
          <h1></h1>
          <img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top">
          <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
          <!-- <img class="position-absolute middle wow fadeInRight" src="img/" alt="bottom"> -->
          <div class="round wow zoomIn" data-wow-delay="0.2s"></div>
        </div>

        <div class="sign_right signup_right">
          <div class="sign_inner signup_inner">
            <div style="text-align:center;padding-top:0px;font-size:24px;color:black;">
              <img src="./img/yike.png" height=60px>
              山东科技大学益科服务队</br>
              <div style="font-size:12px;color:grey;position:relative;left:20px !important;top:-10px;padding-bottom:10px">团 结 / 高 效 / 务 实 / 创 新</div>
            </div>
            <div class="container">
              <?
              echo "<div class='list-group'>";
              echo "<a href='#' class='list-group-item list-group-item-action'>手机号<span style='float: right;'>" . $_SESSION['phone'] . "</span></a>";
              echo "<a href='#' class='list-group-item list-group-item-action'>姓名<span style='float: right;'>" . $_SESSION['name'] . "</span></a>";
              echo "<a href='#' class='list-group-item list-group-item-action'>QQ号<span style='float: right;'>" . $_SESSION['QQ'] . "</span></a>";
              echo "<a href='./tickets.html' class='list-group-item list-group-item-action'>我的工单<span style='float:right;color:cornflowerblue'>查看 ></span></a> ";
              echo "<a href='#' class='list-group-item list-group-item-action'>公告</a>";
              echo "<a href='#' class='list-group-item list-group-item-action'>关于</a>";
              echo "</div>";
              echo "<div style='padding-top: 20px;'>";
              echo "<button type='button' class='btn btn-danger btn-lg btn-block' onclick='logout();'>注销</button>";
              echo "</div>";
              ?>
              <!--copyright-->
              <div class="container;">
                <div id="copyright" style="float:margin-bottom;text-align:center;padding-top:60px;font-size:13px;padding-bottom:10px;">

                  团结/高效/务实/创新<br>
                  <a href="https://beian.miit.gov.cn/">鲁 ICP 备 20012845 号</a><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
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