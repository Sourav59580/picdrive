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
         $_SESSION['buyer_name'] = "Er.".$fullname['full_name'];
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
        <div class="row">
            <div class="col-md-6 p-5">
                <ul class="list-group w-100">
                    <li class="list-group-item bg-success">
                        <h3 class="text-center text-light">STARTER PLAN</h3>
                    </li>
                    <li class="list-group-item">1GB STORAGE</li>
                    <li class="list-group-item">24*7 TECHINICAL SUPPORT</li>
                    <li class="list-group-item">INSTANT EMAIL SOLUTION</li>
                    <li class="list-group-item">DATA SECURITY</li>
                    <li class="list-group-item">SEO SERVICE</li>
                    <li class="list-group-item bg-light text-center buy-btn" amount='99' plan='starter' style="cursor:pointer">
                      <h4><i class="fa fa-inr"></i>99.00/monthly</h4>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 p-5">
            <ul class="list-group">
                    <li class="list-group-item bg-warning">
                        <h3 class="text-center text-light">EXCLUSIVE PLAN</h3>
                    </li>
                    <li class="list-group-item">UNLIMITED STORAGE</li>
                    <li class="list-group-item">24*7 TECHINICAL SUPPORT</li>
                    <li class="list-group-item">INSTANT EMAIL SOLUTION</li>
                    <li class="list-group-item">DATA SECURITY</li>
                    <li class="list-group-item">SEO SERVICE</li>
                    <li class="list-group-item bg-light text-center buy-btn" amount='499' plan='exclusive' style="cursor:pointer">
                      <h4><i class="fa fa-inr"></i>499.00/monthly</h4>
                    </li>
                </ul>


            </div>
        </div>
    </div>



<script>
  $(document).ready(function(){
      $(".buy-btn").each(function(){
          $(this).click(function(){
           var amount = $(this).attr("amount");
           var plan = $(this).attr("plan");
           location.href = "php/payment.php?amount="+amount
           //alert(amount);
           //alert(plan);
          });
      });
  });



</script>











    
</body>

</html>