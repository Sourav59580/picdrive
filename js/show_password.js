$(document).ready(function(){
    $(".show_icon").click(function(){
        if($("#password").attr("type")=="text")
        {
            $("#password").attr("type","password");
            $(".password-loader").css({color:"grey"});
        }
        else{
            $("#password").attr("type","text");
            $(".password-loader").css({color:"black"});
            
        }
        
    });
});