<?php
require("database.php");
$username = base64_decode($_POST['username']);
$getData = "SELECT username from adse WHERE username = '$username'";
$responce = $db->query($getData);
if(($responce->num_rows)!=0)
{
    echo "user found";
}
else
echo "user not found";

?>