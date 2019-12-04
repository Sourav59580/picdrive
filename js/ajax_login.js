$(document).ready(function(){
  $(".login-submit-btn").click(function(e){
    e.preventDefault();
    $.ajax({
     type : "POST",
     url : 'php/login.php',
     data : {
         username : btoa($("#login-email").val()),
         password : btoa($("#login-password").val())
     },
     beforeSend : function(){
     $(".login-submit-btn").html("Processing please wait....");
     },
     success : function(response){
      if(response.trim()=='login success')
      {
        window.location="profile/profile.php"; 
      }
      else if(response.trim()=='user not found')
      {
          $(".loginNotice").removeClass("d-none");
          $("#alertmessage").html("User not found,Please Signup..");
          setTimeout(function(){
            $(".loginNotice").addClass("d-none");
            $("#alertmessage").html("");
            $("#login-form").trigger('reset');
            $(".login-submit-btn").html("login now");
          },2000);
      }
      else if(response.trim()=='password not match')
      {
        $(".loginNotice").removeClass("d-none");
        $("#alertmessage").html("Password not matched,please try again..");
        setTimeout(function(){
          $(".loginNotice").addClass("d-none");
          $("#alertmessage").html("");
          $("#login-form").trigger('reset');
          $(".login-submit-btn").html("login now");
        },2000);
      }
      else if(response.trim()=='pandding'){
          $("#login-form").fadeOut(500,function(){
            $(".login-activator").removeClass('d-none');
            $(".login-activate-btn").click(function(){
              $.ajax({
               type : "POST",
               url : "php/activator.php",
               data : {
                code : btoa($("#login-code").val()),
                username : btoa($("#login-email").val())
               },
               beforeSend : function(){
               $(".login-activate-btn").html("Activation is processing,please wait....");
               $(".login-activate-btn").attr("disabled");
               },
              success : function(response){ 
                alert(response);
               if(response.trim()=='user varified')
               {
                window.location="profile/profile.php";  
               }
               else
               {
                $(".login-activate-btn").html("Activate now");
                $(".login-activate-btn").removeAttr('disabled');
                $("#login-code").val(""); 
                var notice = document.createElement("DIV");
                notice.className = "alert alert-warning";
                notice.innerHTML = "<b>Wrong activation code</b>";
                $(".login-notice").append(notice);
                setTimeout(function(){
                  $(".login-notice").html("");
                },3000);
               }
              }
              });
            });
          });
      }


     }
    });
  });
});