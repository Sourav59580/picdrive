$(document).ready(function(){
    $(".trash-icon").each(function(){
        $(this).click(function(){
            var del_icon = this;
            var img_path = $(this).attr("data-location");
            $.ajax({
                type : "POST",
                url : "php/delete.php",
                data : {
                  path : img_path
                },
                beforeSend : function(){
                 $(this).removeClass("fa fa-trash");
                 $(this).addClass("fa fa-spinner fa-spin");

                },
                success : function(response){
                 if(response.trim()=='successfully delete from database')
                 {
                     del_icon.parentElement.parentElement.style.display='none';
                 }
                } 
                 
            });
        });
    });
});
