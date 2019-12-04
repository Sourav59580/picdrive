$(document).ready(function(){
    $(".upload-icon").click(function(){
     var input = document.createElement("INPUT");
     input.type="file";
     input.name="data";
     input.accept="image/*";
     input.click();
     input.onchange = function(){
     var file = new FormData();
     file.append("data",this.files[0]);
      $.ajax({
      type : "POST",
      url : "php/upload.php",
      data : file,
      contentType : false,
      processData : false,
      cache : false,
      beforeSend : function()
      {
        $(".upload-progress").css("width","0%");
        // document.getElementsByClassName("upload-progress").addClass="w-70";
        // $(".login-submit-btn").html("Processing please wait....");
      },
      success : function(response){
        if(response.trim()=="success"){
        $(".upload-progress").css("width","100%");
        setTimeout(function(){ $(".upload-progress").hide()}, 2000);
        }
        else
        {
          alert(response);
        }
        //count photo live update
        $.ajax({
         type : "POST",
         url : "php/count_photo.php",
         beforeSend : function(){
          $(".total_photo").html("Updating...");
         },
         success : function(response){
           $(".total_photo").html(response);
         }
        });
     // memory status live update 
     $.ajax({
      type : "POST",
      url : "php/memory_status.php",
      beforeSend : function(){
       $(".status").html("Updating...");
       $(".space_status").html("Updating...");
      },
      success : function(response){
        var json_response = JSON.parse(response);
        var memory_status = json_response[0];
        var free_space = json_response[1];
        $(".status").html(memory_status);
        $(".space_status").html("FREE SPACE : "+free_space+"MB");
      }
     });
        
      }
      });

     }




    });
});