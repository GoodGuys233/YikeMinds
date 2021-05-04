function new_post(){
    var title = $("#inputTopicTitle").val();
    var content = $("#inputTopicContent").val();
    var tags = $("#inputTopicTags").val();

    var admin_tags = [];
    $('input[name="admin_tags"]:checked').each(function(){
        admin_tags.push($(this).val());
        });

    admin_tags = admin_tags.join('@');
    console.log("admin_tags="+admin_tags);


    $.ajax({
        type: "post",
        url: "../php/bbs/new-post.php",
        data: {"title":title,"content":content,"tag":tags,"ext_tag":admin_tags},
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