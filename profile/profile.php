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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="js/profile.js"></script>
    <style>
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
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-3 border py-0 px-5">
                <div class="d-flex mb-4 justify-content-center align-items-center flex-column  w-100 bg-white rounded shadow" style="height:250px;">
                <i class="fa fa-folder-open upload-icon" style="font-size:80px;cursor:pointer;"></i>
                <h5>UPLOAD FILES</h5>
                <span class="space_status">
                <?php    
                require("../php/database.php");
                $email = $username;
                $getStorageData = "SELECT storage,used_storage FROM adse WHERE username='$email'";
                $get_response = $db->query($getStorageData);
                $data = $get_response->fetch_assoc();
                $used_memory =$data['used_storage'];
                $total =$data['storage'];
                $free_space = $total-$used_memory;
                echo "FREE SPACE : ".$free_space."MB";
                ?>
                </span>
                <div class="progress w-50 my-2" style="height:5px;">
                    <div class="progress-bar progress-bar-animated progress-bar-striped upload-progress"></div>
                </div>
                <div>
                    <span>50%</span>
                    <i class="fa fa-pause-circle"></i>
                    <i class="fa fa-times-circle"></i>
                </div>
                </div>

                <!-- 2nd row same column -->
                <div class="d-flex justify-content-center align-items-center flex-column  w-100 bg-white rounded shadow" style="height:250px;">
                <i class="fa fa-database storage-icon" style="font-size:80px;cursor:pointer;"></i>
                <h5>MEMORY STATUS</h5>
                <span class="status"><?php    
                require("../php/database.php");
                $email = $username;
                $getStorageData = "SELECT storage,used_storage FROM adse WHERE username='$email'";
                $get_response = $db->query($getStorageData);
                $data = $get_response->fetch_assoc();
                $used_memory =$data['used_storage'];
                $total =$data['storage'];
                $percentage = round((($used_memory/$total)*100),2);
                $color = "";
                if($percentage>80)
                {
                    $color = "bg-danger";
                }
                else
                {
                    $color = "bg-primary";
                }
                echo $used_memory."MB/".$total."MB";
                ?></span>
                <div class="progress w-50 my-2" style="height:5px;">
                    <div class="progress-bar progress-bar-animated <?php echo $color ?>" style="width:<?php echo $percentage ?>%"></div>
                </div>
                </div>
            </div>
            <div class="col-6 border p-5">


            </div>

            <div class="col-md-3 border py-0 px-5">
            <div class="d-flex mb-4 justify-content-center align-items-center flex-column  w-100 bg-white rounded shadow" style="height:250px;">
                <a href="gallery.php"><i class="fa fa-image gallery-icon" style="font-size:80px;cursor:pointer;"></i></a>
                <h5>GALLERY</h5>
                <span class="total_photo"><?php
                  $get_id = "SELECT id FROM adse WHERE username = '$username'";
                  $response = $db->query($get_id);
                  $data = $response->fetch_assoc();
                  $id = $data['id'];
                  $table_name = "user_".$id;

                  $count_data = "SELECT COUNT(id) AS total FROM $table_name";

                  $count_response = $db->query($count_data);
                  $count_data = $count_response->fetch_assoc();
                  $count = $count_data['total'];
                  echo $count." PHOTOS";
                  $_SESSION['table_name'] = $table_name;
                ?>
                </span>                
            </div>

            <!--second row same column-->

            <div class="d-flex mb-4 justify-content-center align-items-center flex-column  w-100 bg-white rounded shadow" style="height:250px;">
                <a href="shop.php"><i class="fa fa-shopping-cart shopping-cart-icon" style="font-size:80px;cursor:pointer;color:black;"></i></a>
                <h5>SHOPING</h5>
                <span>START FROM <i class="fa fa-shopping-cart"></i> 99.00/mo</span>
            </div>
            </div>
        </div>
    </div>















    <!-- <div class="p-4">
    <form enctype="multipart/form-data" id="upload_form">
       <input type="file" name="data" accept="image/*">
       <button type="submit">Upload</button>
    </form>
    </div> -->
    <!-- <script>
    $(document).ready(function(){
        $("#upload_form").submit(function(e){
        e.preventDefault();
        $.ajax({
        type : "POST",
        url : "php/upload.php",
        data : new FormData(this),
        contentType : false,
        processData : false,
        cache : false,
        success : function(response){
         alert(response);
        }
        });
        });
    });
    
    </script> -->

    <script>
    
    </script>
</body>

</html>