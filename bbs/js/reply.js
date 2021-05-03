function reply_post()
{
    var pid = getUrlParam('pid');
    var content = $("#user_reply").val();


    $.ajax({
        type: "post",
        url: "../php/bbs/reply.php",
        data: {"pid":pid,"content":content},
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
                    window.location.reload();
                    
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