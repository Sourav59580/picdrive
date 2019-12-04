<?php 
   $db = new mysqli("localhost","root","","picdrive");
   if($db->connect_error)
   {
       die("database is not connected in internally");
   }
?>