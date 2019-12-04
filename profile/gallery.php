<?php
 session_start();
 $username = $_SESSION['username'];
 if(empty($username)){
     header("Location:../index.php");
     exit;
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="js/profile.js"></script>
    <script src="js/edit_photo.js"></script>
    <script src="js/download_photo.js"></script>
    <script src="js/delete_photo.js"></script>
    <style>
    span:focus {
        outline: 2px dashed red;
        padding: 2px;
        box-shadow: 0px 0px 5px #ccc;
        box-sizing: border-box;
        margin: 0;

    }

    body {
        background-color: aquamarine;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="#">
            <?php    
         require("../php/database.php");
         $email = $_SESSION['username'];
         $getFullname = "SELECT full_name FROM adse WHERE username='$email'";
         $get_response = $db->query($getFullname);
         $fullname = $get_response->fetch_assoc();
         echo "Er.".$fullname['full_name'];
         
        ?>

        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="php/logout.php">
                    <i class="fa fa-sign-out" style="font-size:18px;"></i>Logout
                </a>
            </li>
        </ul>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <?php
      $table_name = $_SESSION['table_name'];

      $get_image_path = "SELECT image_path,image_name FROM $table_name";
      $response = $db->query($get_image_path);
      while($data = $response->fetch_assoc())
      {
        $filename = pathinfo($data['image_name']);
        $name = $filename['filename'];
          $path = str_replace("../","",$data['image_path']);
          echo "<div class='col-md-3 px-3'>
                   <div class='card mb-4 shadow-lg'>
                      <div class='card-body d-flex justify-content-center align-items-center'><img src='".$path."' width='100' height='150' class='rounded-circle pic'></div>
                      <div class='card-footer d-flex justify-content-around align-items-center'>
                      <span>".$name."</span>
                      <i class='fa fa-save save-icon d-none' data-location='".$path."'></i>
                      <i class='fa fa-spinner fa-spin loader-icon d-none' data-location='".$path."'></i>
                      <i class='fa fa-edit edit-icon' data-location='".$path."' ></i>
                      <i class='fa fa-download download-icon' data-location='".$path."' img-name='".$name."'></i>
                      <i class='fa fa-trash trash-icon' data-location='".$path."'></i>
                      </div>
                   </div>
                </div>";
      }
    ?>
        </div>
    </div>
<!--modal coding-->
<div class="modal my-3 animated fadeIn" id="view-modal">
 <div class="modal-dialog">
 <i class="fa fa-times-circle float-right text-light" data-dismiss="modal"></i>
   <div class="modal-content">
      <div class="modal-body">
       
      </div>
   </div>
  </div>

</div>



<script>
  $(Document).ready(function(){
    $(".pic").each(function(){
        $(this).click(function() {
          
          var img = document.createElement("IMG");
          img.src = $(this).attr("src");
          img.style.width = "100%";  
          $(".modal-body").html(img);
          $("#view-modal").modal();
        });
    });
  });



</script>
</body>
</html>