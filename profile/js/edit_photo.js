$(document).ready(function(){
    $(".edit-icon").each(function(){
        $(this).click(function(){
        var path = $(this).attr('data-location');
        var footer = this.parentElement;
        var span = footer.getElementsByTagName("SPAN")[0];
        //span.style.color = "red";
        span.contentEditable = "true";
        span.focus();
        var old_name = span.innerHTML;
        $(this).addClass("d-none");
        var save_icon = footer.getElementsByClassName("save-icon");
        var loader = footer.getElementsByClassName("loader-icon");
        var edit = footer.getElementsByClassName("edit-icon");
        $(save_icon).removeClass("d-none");
        $(save_icon).click(function(){
            //var span_node_value = footer.getElementsByTagName("SPAN")[0].childNodes[0].nodeValue;
            var photo_name = span.innerHTML;
            $.ajax({
                type : "POST",
                url : "php/rename.php",
                data : {
                    photo_name : photo_name,
                    photo_path : path
                },
                beforeSend : function(){
                $(loader).removeClass("d-none");
                $(save_icon).addClass("d-none");
                },
                success : function(response){
                    if(response.trim()=='success update name'){
                    $(loader).addClass("d-none");
                    $(edit).removeClass("d-none");
                    span.contentEditable = "false";
                    var previous_download_link = footer.getElementsByClassName("download-icon")[0].getAttribute("data-location");
                    var current_download_link = previous_download_link.replace(old_name,photo_name);
                    footer.getElementsByClassName("download-icon")[0].setAttribute("data-location",current_download_link);
                    footer.getElementsByClassName("download-icon")[0].setAttribute("file-name",photo_name);
                    }
                    else if(response.trim()=='File already exits please enter another name')
                    {
                        alert(response);
                        span.contentEditable = "true";
                        span.focus();
                        $(loader).addClass("d-none");
                        $(save_icon).removeClass("d-none");
                    }
                }
                
            });
        });
       });
    });
});


