    $.ajax({
        type: "get",
        url: "https://api.asilu.com/geo/",
        data: {},
        dataType: "json",

        success: function(msg){
            console.log(msg);
            // if(json_errcode==0)
            // {
            //     swal({
            //     icon: "success",
            //     text: json_msg,
            //     }).then(function () {
            //         window.location.href = "./admin.php";
                    
            //     })
            // }
            // else
            // {
            //     swal({
            //         icon: "error",
            //         text: json_msg,
            //     })
            // }

        }
    });   
