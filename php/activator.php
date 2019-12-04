<?php
   require("database.php");
   $code = base64_decode($_POST['code']);
   $username = base64_decode($_POST['username']);
   $getDetials = "SELECT activation_code FROM adse WHERE username = '$username' AND activation_code='$code'";
   $responce = $db->query($getDetials);
   if(($responce->num_rows)!=0)
   {
     $updateStatus = "UPDATE adse SET status = 'active' WHERE username = '$username' AND activation_code = '$code'";
     if($db->query($updateStatus))
     {
         $get_id = "SELECT id FROM adse WHERE username ='$username'";
         $get_id_response = $db->query($get_id);
         $id_data = $get_id_response->fetch_assoc();
         $table_name = "user_".$id_data['id'];
         $creat_table ="CREATE TABLE $table_name(
         id INT(255) NOT NULL AUTO_INCREMENT,
         image_name VARCHAR(255),
         image_path VARCHAR(255),
         image_size FLOAT(10),
         image_date DATETIME DEFAULT CURRENT_TIMESTAMP,
         PRIMARY KEY(id)
         )";
         if($db->query($creat_table))
         {
         mkdir("../profile/gallery/".$table_name);  
         echo "user varified";
         session_start();
         $_SESSION['username'] = $username;
         }
     }
     else
     {
         echo "Activation failed ,please try again later";
     }
   }
   else
   {
       echo "wrong activation key enter,please check";
   }
   










?>