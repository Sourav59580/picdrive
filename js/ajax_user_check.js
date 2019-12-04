$(document).ready(function(){
    $("#email").on("change",function(){
        if($(this).val()!="")
        {
            $.ajax({
                type : "POST",
                url : "php/user_check.php",
                data : {
                username : btoa($(this).val())
                },
                beforeSend : function(){
                  $(".email-loader").removeClass("d-none");
                },
                success : function(responce){
                    if(responce.trim()=="user found")
                    {
                        $(".email-loader").removeClass("fa fa-circle-o-notch fa-spin");
                        $(".email-loader").addClass("fa fa-times-circle text-danger");
                        $(".submit-btn").Attr("disabled","disabled");
                    }
                    else{
                     $(".email-loader").removeClass("fa fa-circle-o-notch fa-spin");
                     $(".email-loader").addClass("fa fa-check-circle text-primary");
                     $(".submit-btn").removeAttr("disabled");
                    }
                }
            });
        }
    });
});