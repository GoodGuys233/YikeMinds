function submit_item()
{

    var name = $("#name").val();
    var phone = $("#phone").val();
    var QQ = $("#QQ").val();
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
        data: {"name":name,"phone":phone,"QQ":QQ,"obj":obj,'des':des,"extra":extra,"预约":preserve},
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
        data: {"name":name,"phone":phone,"QQ":QQ,"obj":obj,'des':des,"extra":extra,"预约":preserve},
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
function change_item()
{
    var head = $("#head").val();
    var id = $("#id").val();
    var complete=1;
    console.log(id);
    console.log(head);
    console.log(complete);
    //console.log(preserve);

    $.ajax({
        type: "post",
        url: "./change.php",
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
}
function change1_item()
{
    var head = $("#head").val();
    var id = $("#id").val();
    var complete=2;
    console.log(id);
    console.log(head);
    console.log(complete);
    //console.log(preserve);

    $.ajax({
        type: "post",
        url: "./change.php",
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
}
function tobedo()
{
    var head = $("#head").val();
    var id = $("#id").val();
    var complete=3;
    console.log(id);
    console.log(head);
    console.log(complete);
    //console.log(preserve);

    $.ajax({
        type: "post",
        url: "./change.php",
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
}
function change_item1()
{
    var head = $("#head1").val();
    var id = $("#id1").val();

    console.log(id);
    console.log(head);
    //console.log(preserve);

    $.ajax({
        type: "post",
        url: "./change.php",
        data: {"head":head,"id":id},
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
function change_item2()
{
    var head = $("#head1").val();
    var id = $("#id1").val();

    console.log(id);
    console.log(head);
    //console.log(preserve);

    $.ajax({
        type: "post",
        url: "./changep.php",
        data: {"head":head,"id":id},
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
function change_item3()
{
    var id = $("#id2").val();

    console.log(id);
    //console.log(preserve);

    $.ajax({
        type: "post",
        url: "./del.php",
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
function change_item4()
{
    var id = $("#id3").val();

    console.log(id);
    //console.log(preserve);

    $.ajax({
        type: "post",
        url: "./changepp.php",
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

