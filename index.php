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
        <script src="./jsapi1.js"></script>
        

    </head>
    <body>
        <div class="container">
            <div class="jumbotron text-center" style="margin-bottom:16px;margin-top:10px;padding-bottom:18px">
                <div class="logo" style="height:55px;margin-bottom:8px;margin-top:-15px">
                    <img src="./img/yike.png" height=55px>
                </div>
                
                <h3>益科服务队登记表单</h3>
                
                <div class='banner_num_view' style="padding-top:20px;font-size:14px;color:grey;" >
                    正在排队<span id='pending_num'></span>项
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    历史总计<span id='all_num'></span>项
                </div>

              </div>
            <form method="POST" action="./php/submit.php">
                              <!-- 按钮：用于打开模态框 -->

              <div class="form-group">
                <label for="text">姓名:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="姓名" maxlength="5" >
              </div>
              <div class="form-group">
                <label for="text">手机号:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="手机号" maxlength="11">
              </div>
              <div class="form-group">
                <label for="text">QQ号码:</label>
                <input type="text" class="form-control" id="QQ" name="QQ" placeholder="QQ" maxlength="20">
              </div>
              <div class="form-group">
                <label for="text">送修物品</label>
                <input type="text" class="form-control" id="obj" name="obj" placeholder="请注明品牌信息" maxlength="20">
              </div>
               <div class="form-group">
                <label for="text">问题描述:</label>
                <input type="text" class="form-control" id="des" name="des" placeholder="问题描述" maxlength="150">
              </div>
              <div class="form-group">
                <label for="pwd">附加物品 (如有密码请备注密码):</label>
                <input type="text" class="form-control" id="extra" name="extra" placeholder="如充电器、鼠标等 (如有密码请备注密码)" maxlength="200" >
              </div>
            
            <div class="form-group" style="font-size:11px;color:grey;">
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  预约点我
                </button>          
                <input onclick="submit_item();" type="button" class="btn btn-primary" value="确认提交"; style="float: right;"/>
              
              </div>
            </form>
          </div>
          
          <div id="copyright" style="float:margin-bottom;text-align:center;padding-top:40px;font-size:12px">
          <span>
          ©2016-2021<br>山东科技大学益科服务团队<br>

          </span>
          
          </div>
          <div id="author" style="float:margin-bottom;text-align:center;padding-top:10px;font-size:10px;color:grey;">
        团结/高效/务实/创新<br>
        
        <a href="https://beian.miit.gov.cn/">鲁 ICP 备 20012845 号</a>
<br>
    
        
          <span style="line-height:0;">Powered by<br>Lotke &nbsp;| &nbsp;Catop<br></span>
          
          <?php
          //一言部分，考虑js前端加载，此处用php影响打开速度。
        //   $yiyan = file_get_contents("https://v1.hitokoto.cn/");
        //     $yiyan_text = json_decode($yiyan,true)['hitokoto'];
        //     if(!empty($yiyan_text))
        //     {
        //         echo($yiyan_text);
        //     }
          
          ?>
          </div>
          
          <script type="text/javascript">
              check_num();
          </script>
        
    </body>
</html>
