 //download coding
$(document).ready(function(){
    $(".download-icon").each(function(){
        $(this).click(function(){
            var photo_name = $(this).attr("img-name");
            var download_link = $(this).attr("data-location");
            var a = document.createElement("A");
            a.href = download_link;
            a.download = photo_name;
            a.click();
        });
    });
});
