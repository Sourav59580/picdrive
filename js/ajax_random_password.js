$(document).ready(function(){
    $(".generate-btn").click(function(e){
        e.preventDefault();
        $("#password").attr("type","text");
        $(".show_icon").css({color:"black"});
        $.ajax({
            type : "POST",
            url : "php/random_password.php",
            beforeSend : function(){
                $(".show_icon").removeClass("fa fa-eye");
                $(".show_icon").addClass("fa fa-circle-o-notch fa-spin");
            },
            success : function(response){
                $(".show_icon").removeClass("fa fa-circle-o-notch fa-spin ");
                $(".show_icon").addClass("fa fa-eye");
                $("#password").val(response);   
            }
        });
    });
});