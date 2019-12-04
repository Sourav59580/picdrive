<?php 
 require("database.php");
 $fullname = base64_decode($_POST['fullname']);
 $username = base64_decode($_POST['username']);
 $password = md5(base64_decode($_POST['password']));
 $pattern = "0123456789";
 $length = strlen($pattern)-1;
 $i;
 $code = [];
 for($i=0;$i<6;$i++)
 {
  $indexNumber = rand(0,$length);
  $code[]=$pattern[$indexNumber];
 }
 $activationCode = implode($code);

 $storeData = "INSERT INTO adse(full_name,username,password,activation_code)
 VALUE('$fullname','$username','$password','$activationCode')";
 if($db->query($storeData)){
  $checkmail = mail($username,"Picdrive activation code","Thank you for choosing us.Your activation code is : ".$activationCode);
  if($checkmail==true)
  {
   echo "sending success";
  }
  else
  {
      echo "sending failed";
  }
 }
 else
 {
     echo "signup failed";
 }



















?>