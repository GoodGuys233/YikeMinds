<?php
include "dbconn.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
//主要为跨域CORS配置的两大基本信息,Origin和headers


$datetime= new DateTime();
$current_date=$datetime->format('Y-m-d');

$stmt = $db->query("SELECT COUNT(*) FROM submited WHERE complete=0 AND deleted=0");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$today_pending = $row['COUNT(*)'];

$stmt = $db->query("SELECT COUNT(*) FROM submited WHERE 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$all_count = $row['COUNT(*)'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>维修登记</title>
        <link rel="shortcut icon" href="./img/yike.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script language=javascript src='https://cdn.bootcdn.net/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
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

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!-- icon css-->
        <link rel="stylesheet" href="assets/elagent-icon/style.css">
        <link rel="stylesheet" href="assets/animation/animate.css">
        <!--<link rel="stylesheet" href="css/style.css">-->
        <link rel="stylesheet" href="css/responsive.css">
    </head>

  <body data-scroll-animation="true">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="img/yikelogo.png" alt="">
                    <h5><span>益科创新</span></h5>
                </div>
            </div>
            <b><span>团结/高效/务实/创新</span></b>
        </div>
    </div>
    <div class="body_wrapper">
        <section class="signup_area signup_area_height">
            <div class="row ml-0 mr-0">  
                <div class="sign_left signup_left">
                   

                    <img class="position-absolute top" src="img/signup/top_ornamate.png" alt="top">
                    <img class="position-absolute bottom" src="img/signup/bottom_ornamate.png" alt="bottom">
                    <!-- <img class="position-absolute middle wow fadeInRight" src="img/" alt="bottom"> -->
                    <div class="round wow zoomIn" data-wow-delay="0.2s"></div>
                </div>
                <div class="sign_right signup_right">
                    <div class="sign_inner signup_inner"> 
                        <div class="text-center">
                        <img src="./img/yike.png" height=55px>
                        <h3>益科服务队登记表单</h3> 
                        <div class='banner_num_view' style="padding-top:20px;font-size:14px;color:grey;" >
                        正在排队<span id='pending_num'></span>项
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        历史总计<span id='all_num'></span>项
                        </div>
                        </div>
                        <div class="divider">
                            <span class="or-text">或者</span>
                        </div> 
            <form method="POST" action="./php/submit.php" class="row login_form">
              <div class="col-lg-12 form-group">
                <div class="small_text">送修物品</div>
                <input type="text" class="form-control" id="obj" name="obj" placeholder="请注明品牌信息" maxlength="20">
              </div>
               <div class="col-lg-12 form-group">
               <div class="small_text">问题描述</div>
                <input type="text" class="form-control" id="des" name="des" placeholder="问题描述" maxlength="150">
              </div>
              <div class="col-lg-12 form-group">
              <div class="small_text">附加物品 (如有密码请备注密码):</div>
                <input type="text" class="form-control" id="extra" name="extra" placeholder="如充电器、鼠标等 (如有密码请备注密码)" maxlength="200" >
              </div>
            
            <div class="col-lg-12 form-group" style="font-size:11px;color:grey;">
                <label for="text">客户端参数:</label>
                <span id="client_info"></span>
              </div>
                 
                 <script>get_client_info();</script>
                <!-- 模态框 -->
                <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                 
                      <!-- 模态框头部 -->
                      <div class="modal-header">
                        <h4 class="modal-title">选择时间</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                 
                      <!-- 模态框主体 -->
                      <div class="modal-body">
                        <label><input type="radio" name="预约" value="0" checked="true" id="preserve">现在</label>
                        <div class="radio">
                          <label><input type="radio" name="预约" value="星期一下午" id="preserve">星期一下午</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="预约" value="星期一晚上" id="preserve">星期一晚上</label>
                        </div>
                        <div class="radio ">
                          <label><input type="radio" name="预约" value="星期二下午" id="preserve">星期二下午</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="预约" value="星期三下午" id="preserve">星期三下午</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="预约" value="星期三晚上" id="preserve">星期三晚上</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="预约" value="星期四下午" id="preserve">星期四下午</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="预约" value="星期四晚上" id="preserve">星期四晚上</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="预约" value="星期五下午" id="preserve">星期五下午</label>
                          </div>
                      </div>
                      <!-- 模态框底部 -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">预约点我</button> 
                <button type="button" class="btn btn-primary" onclick="submit_item();">确认提交</button>
                </div>
            </form>



          <!-- <div class="jumbotron text-center" style="margin-bottom:6px;margin-top:55px;padding-bottom:5px;padding-top: 2px;"> -->
          <div id="copyright" style="float:margin-bottom;text-align:center;padding-top:px;font-size:12px">
          <span>
          ©2016-2021<br>山东科技大学益科服务团队<br>
          </span>         
          </div>
          <div id="author" style="float:margin-bottom;text-align:center;padding-top:10px;font-size:10px;color:grey;">
        团结/高效/务实/创新<br>
        <a href="https://beian.miit.gov.cn/">鲁 ICP 备 20012845 号</a><br>
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
      <li class="nav-item active">
        <a class="nav-link" href="" style="font-size:10px">
        <img src="./img/note.png" width="30" height="30" alt="">
        登记
        <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="font-size:10px">
        <img src="./img/speak.png" width="30" height="30" alt="">
        BBS
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./person.php" style="font-size:10px">
        <img src="./img/user.png" width="30" height="30" alt="">
        个人
        </a>
      </li>
    </ul>
</nav>
</div>
              </div>
        </section>
    </div>
          <script type="text/javascript">
          check_num();
          </script>
  
    </body>
</html>

