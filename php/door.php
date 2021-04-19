<?php session_start() ;
if (!isset($_SESSION['flag']))
{
  echo "请先登录";
  header('Location: ../login.html');
}
?>
<head>
    <title>开门关门</title>
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
</head>
<body>
    <div class="container">
            <div class="jumbotron text-center" style="margin-bottom:16px;margin-top:10px;padding-bottom:18px">
                <div class="logo" style="height:55px;margin-bottom:8px;margin-top:-15px">
                    <img src="../img/yike.png" height=55px>
                </div>
                
                <h3>大活106开门锁门</h3>
                </div>

              </div>
    <div class="container" >
        <a onclick="lockdoor();" class="btn btn-info" role="button" style="float: right;">锁门</a>
        <a onclick="opdoor();" class="btn btn-info" role="button" style="float: left;">开门</a> 
    </div>

</body>