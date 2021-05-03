function submit_item()
{

    // var name = $("#name").val();
    // var phone = $("#phone").val();
    // var QQ = $("#QQ").val();
    var obj = $("#obj").val();
    var des = $("#des").val();
    var extra = $("#extra").val();
    var preserve = $('input:radio:checked').val();
    
    //console.log(preserve);
    //console.log(preserve);
            if(preserve==0)
            {
                swal({ 
                     title: '您选择的预约时间为‘现在’', 
                     text: '这意味着您正在现场送修', 
                       buttons: {
                    cancel: '取消',
                    en: {
                    text: "确定",
                    value: "en",
                    },
                       }

                    }).then((value) =>
                {
                    switch (value)
                    {
               case 'en':  
                    $.ajax({
        type: "post",
        url: "./php/submit.php",
        data: {"obj":obj,'des':des,"extra":extra,"预约":preserve},
        dataType: "json",//后端返回json数据

        success: function(msg){
            console.log(msg);
            var json_errcode = msg['err_code'];
            var json_msg = msg['text'];
            if(json_errcode==0)
            {
                swal({
                icon: "success",
                text: json_msg,
                }).then(function ()
                {
                    window.location.href = "./index.php";
                });
            }
            else
            {
                swal({
                    icon: "error",
                    text: json_msg,
                })
            }
        }

    });
                    
                    }
               
   
                })
            }
            
            else{
                    $.ajax({
        type: "post",
        url: "./php/submit.php",
        data: {"obj":obj,'des':des,"extra":extra,"预约":preserve},
        dataType: "json",//后端返回json数据

        success: function(msg){
            console.log(msg);
            var json_errcode = msg['err_code'];
            var json_msg = msg['text'];
            if(json_errcode==0)
            {
                swal({
                icon: "success",
                text: json_msg,
                }).then(function ()
                {
                    window.location.href = "./index.php";
                });
            }
            else
            {
                swal({
                    icon: "error",
                    text: json_msg,
                })
            }
        }

    });
            }

}
function opdoor()
{
    $.ajax({
        type: "get",
        url: "./opdoor.php",
        dataType: "json",//后端返回json数据
        success: function(msg){
            console.log(msg);
            if(msg=='ok')
            {
                swal({
                    icon:"success",
                    text:"成功",
                }).then(function(){
                    window.location.href="./door.php";
                })
            }
            else{
                swal({
                    icon:"error",
                    text:"失败",
                })
            }
        }
        });   
    
}

function lockdoor()
{
    $.ajax({
        type: "get",
        url: "./lockdoor.php",
        dataType: "json",//后端返回json数据
        success: function(msg){
            console.log(msg);
            if(msg=='ok')
            {
                swal({
                    icon:"success",
                    text:"成功",
                }).then(function(){
                    window.location.href="./door.php";
                })
            }
            else{
                swal({
                    icon:"error",
                    text:"失败",
                })
            }
        }
        }); 
}
function tobedo()
{
    var wid = $(".card-link").attr("id");
    var complete=3;

    swal("填写负责人：",{
        content: "input",
      }).then((value)=>{
            var head=value;
            swal("请填写交接进度：",{
                content:"input",
            }).then((value)=>{
                var reason=value;
                $.ajax({
                    type: "post",
                    url: "../tobedo.php",
                    data: {"head":head,"wid":wid,"complete":complete,"reason":reason},
                    dataType: "json",//后端返回json数据
                    success: function(msg){
                        console.log(msg);
                        var json_errcode = msg['err_code'];
                        var json_msg = msg['text'];
                        // console.log(msg['msg']);
                        if(json_errcode==0)
                        {
                            swal({
                            icon: "success",
                            text: json_msg,
                            }).then(function () {
                                window.location.href = "./admin.php";
                                
                            })
                        }
                        else
                        {
                            swal({
                                icon: "error",
                                text: json_msg,
                            })
                        }
            
                    }
                });
            })
      });
}
function del()
{
    var id = $(".card-link").attr("id");

    console.log(id);
    //console.log(preserve);
    swal("请输入本条登记信息的工单号以确认：",{
        content: "input",
      }).then((value)=>{
            var id1=value;
            if(id1==id){
                $.ajax({
                    type: "post",
                    url: "../del.php",
                    data: {"id":id},
                    dataType: "json",//后端返回json数据
                    success: function(msg){
                        console.log(msg);
                        var json_errcode = msg['err_code'];
                        var json_msg = msg['text'];
                        // console.log(msg['msg']);
                        if(json_errcode==0)
                        {
                            swal({
                            icon: "success",
                            text: json_msg,
                            }).then(function () {
                                window.location.href = "./admin.php";
                                
                            })
                        }
                        else
                        {
                            swal({
                                icon: "error",
                                text: json_msg,
                            })
                        }
            
                    }
                });
            }
            else{
                swal({
                    icon:"error",
                    text:"输入的工单号不一致!!",
                })
            }
      });

}
function settake()
{
    var id = $(".card-link.take").attr("id");
    console.log(id);
    //console.log(preserve);

    $.ajax({
        type: "post",
        url: "../settake.php",
        data: {"id":id},
        dataType: "json",//后端返回json数据

        success: function(msg){
            console.log(msg);
            var json_errcode = msg['err_code'];
            var json_msg = msg['text'];
            // console.log(msg['msg']);
            if(json_errcode==0)
            {
                swal({
                icon: "success",
                text: json_msg,
                }).then(function () {
                    window.location.href = "./nottake.php";
                    
                })
            }
            else
            {
                swal({
                    icon: "error",
                    text: json_msg,
                })
            }

        }
    });
}

function get_client_info()
{
    $.ajax({
    dataType:"JSONP",
    jsonp:"callback",//请求自动带上callback参数，callback值为jsonpCallback的值
    jsonpCallback:"login",//接口服务器应该返回字符串数据格式：login(JSON数据)
    type:"get",
    url:"https://api.asilu.com/geo/",//接口服务器地址
    data:{},//请求数据
    success:function(response){
        //成功执行
        //console.log(response);
        //document.getElementById("client_info").innerHTML = '<br>地理位置：'+response['gcj']['lng']+'°E&nbsp;&nbsp;'+response['gcj']['lat']+'°N<br>客户端IP：'+response['ip'];
        document.getElementById("client_info").innerHTML = '客户端IP：'+response['ip'];
    },
    error:function(e){
        //失败执行
        alert(e.status+','+ e.statusText);
    }
    });
}

function check_num()
{
    $.ajax({
        type: "get",
        url: "./php/check_num.php",
        data: {},
        dataType: "json",

        success: function(msg){
            console.log(msg);
            document.getElementById('pending_num').innerHTML = msg['pending'];
            document.getElementById('all_num').innerHTML = msg['all'];


        } //成功后回调函数结束
    });  //ajax请求结束
}
function reservation(){
    var id = $(".card-link.pre").attr("id");
    console.log(id);
    $.ajax({
        type: "post",
        url: "../resevation.php",
        data: {"id":id},
        dataType: "json",//后端返回json数据
        success: function(msg){
            console.log(msg);
            var json_errcode = msg['err_code'];
            var json_msg = msg['text'];
            // console.log(msg['msg']);
            if(json_errcode==0)
            {
                swal({
                icon: "success",
                text: json_msg,
                }).then(function () {
                    window.location.href = "./reservation.php";
                    
                })
            }
            else
            {
                swal({
                    icon: "error",
                    text: json_msg,
                })
            }

        }
    });

}
function complete()
{
    var id = $(".card-link").attr("id");
    var complete=1;
    swal("填写负责人：",{
        content: "input",
      }).then((value)=>{
            var head=value;
            $.ajax({
                type: "post",
                url: "../change.php",
                data: {"head":head,"id":id,"complete":complete},
                dataType: "json",//后端返回json数据
                success: function(msg){
                    console.log(msg);
                    var json_errcode = msg['err_code'];
                    var json_msg = msg['text'];
                    // console.log(msg['msg']);
                    if(json_errcode==0)
                    {
                        swal({
                        icon: "success",
                        text: json_msg,
                        }).then(function () {
                            window.location.href = "./admin.php";
                            
                        })
                    }
                    else
                    {
                        swal({
                            icon: "error",
                            text: json_msg,
                        })
                    }
        
                }
            });
      });
}
function completebut()
{
    var id = $(".card-link").attr("id");
    var complete=2;
    swal("填写负责人：",{
        content: "input",
      }).then((value)=>{
            var head=value;
            $.ajax({
                type: "post",
                url: "../change.php",
                data: {"head":head,"id":id,"complete":complete},
                dataType: "json",//后端返回json数据
                success: function(msg){
                    console.log(msg);
                    var json_errcode = msg['err_code'];
                    var json_msg = msg['text'];
                    // console.log(msg['msg']);
                    if(json_errcode==0)
                    {
                        swal({
                        icon: "success",
                        text: json_msg,
                        }).then(function () {
                            window.location.href = "./admin.php";
                            
                        })
                    }
                    else
                    {
                        swal({
                            icon: "error",
                            text: json_msg,
                        })
                    }
        
                }
            });
      });
}
function signup(){
    var uname = $("#name").val();
    var phone = $("#phone").val();
    var QQ = $("#QQ").val();
    var mail = $("#mail").val();
    var passwd = $("#password").val();
    var cpasswd= $("#confirm-password").val();
    if (cpasswd != "" && passwd != "") {
        if (cpasswd == passwd) {
            $.ajax({
                type: "post",
                url: "./php/signup.php",
                data: {"uname":uname,"phone":phone,"QQ":QQ,"mail":mail,"passwd":passwd},
                dataType: "json",//后端返回json数据
        
                success: function(msg){
                    console.log(msg);
                    var json_errcode = msg['err_code'];
                    var json_msg = msg['text'];
                    // console.log(msg['msg']);
                    if(json_errcode==0)
                    {
                        swal({
                        icon: "success",
                        text: json_msg,
                        }).then(function () {
                            window.location.href = "./signin.html";
                            
                        })
                    }
                    else
                    {
                        swal({
                            icon: "error",
                            text: json_msg,
                        })
                    }
        
                }
            });
        }
        else{
            swal({
                icon:"error",
                text:"两次输入密码不一致",
            })
        }
    }

}
function signin(){
    var mail = $("#mail").val();
    var passwd = $("#password").val();
    $.ajax({
        type: "post",
        url: "./php/signin.php",
        data: {"mail":mail,"passwd":passwd},
        dataType: "json",//后端返回json数据

        success: function(msg){
            console.log(msg);
            var json_errcode = msg['err_code'];
            var json_msg = msg['text'];
            // console.log(msg['msg']);
            if(json_errcode==0)
            {
                swal({
                icon: "success",
                text: json_msg,
                }).then(function () {
                    window.location.href = "./index.php";
                    
                })
            }
            else
            {
                swal({
                    icon: "error",
                    text: json_msg,
                })
            }

        }
    });    
}
function logout()
{
    $.ajax({
        type: "post",
        url: "./php/logout.php",
        data: {},
        dataType: "json",//后端返回json数据

        success: function(msg){
            console.log(msg);
            var json_errcode = msg['err_code'];
            var json_msg = msg['text'];
            // console.log(msg['msg']);
            if(json_errcode==0)
            {
                swal({
                icon: "success",
                text: json_msg,
                }).then(function () {
                    window.location.href = "./index.php";
                    
                })
            }
            else
            {
                swal({
                    icon: "error",
                    text: json_msg,
                })
            }

        }
    });    
}