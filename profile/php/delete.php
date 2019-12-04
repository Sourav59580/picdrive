<?php
session_start();
$table_name = $_SESSION['table_name'];
$img_path = $_POST['path'];
require("../../php/database.php");
$complete_path = "../".$img_path;
if(unlink("../".$img_path))
{
    $delete_query = "DELETE FROM $table_name WHERE image_path = '$complete_path'";
    if($db->query($delete_query))
    {
    echo "successfully delete from database";
    }
    else {
        echo "delete failed from database";
    }
}

else {
    echo "delete failed";
}








?>