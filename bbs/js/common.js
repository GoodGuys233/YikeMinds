 //获取url中的参数
 function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]); return null; //返回参数值
}


function delete_post(pid){
    $.ajax({
        type: "post",
        url: "../php/bbs/delete-post.php",
        data: {"pid":pid},
        dataType: "json",//后端返回json数据
        success: function(msg){
            var json_errcode = msg['err_code'];
            var json_msg = msg['err_msg'];
            // console.log(msg['msg']);
            if(json_errcode==0)
            {
                swal({
                icon: "success",
                text: json_msg,
                }).then(function () {
                    window.location.href = "./index.html";
                    
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