$(document).ready(function(){
    $(".submit-btn").click(function(e){
        e.preventDefault();
        $.ajax({
           type : "POST",
           url: "php/sign_up.php",
           data : {
               fullname : btoa($("#name").val()),
               username : btoa($("#email").val()),
               password :btoa($("#password").val())
           },
           beforeSend : function(){
             $(".submit-btn").html("Processing please wait....");
           },
           success : function(responce){
             if(responce.trim()=='sending success')
             {
               $("#signup-form").fadeOut(500,function(){
                 $(".activator").removeClass("d-none");
               });
             }
             else
             {
                $(".signup_notice").removeClass("d-none");
                 $(".signup_notice").fadeOut(3000,function(){
                    $(".submit-btn").html("Register now");
                     $("#signup-form").trigger('reset');
                     $(".email-loader").removeClass("fa fa-check-circle text-primary");
                     $(".submit-btn").Attr("disabled","disabled");
                 });
             }
           }
        });
    });
});