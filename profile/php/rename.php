<?php
session_start();
require("../../php/database.php");
$new_name = $_POST['photo_name'];
$old_path = $_POST['photo_path'];

$pathinfo = pathinfo($old_path);
$dirname = $pathinfo['dirname'];
$extension = $pathinfo['extension'];
if(file_exists("../".$dirname."/".$new_name.".".$extension))
{
    echo "File already exits please enter another name";
}
else {
    
    if(rename("../".$old_path,"../".$dirname."/".$new_name.".".$extension))
    {
      $new_path = "../".$dirname."/".$new_name.".".$extension;
      $change_name = $new_name.".".$extension; 
      $previous_path = "../".$old_path; 
      $table_name = $_SESSION['table_name'];
      $update_path = "UPDATE $table_name SET image_path = '$new_path'  WHERE image_path = '$previous_path'";
        if($db->query($update_path))
       {
        $update_name = "UPDATE $table_name SET image_name = '$change_name '  WHERE image_path = '$new_path'";
        if($db->query($update_name))
        {
            echo "success update name";
        }
        else {
            echo "failed name update";
        }
       }
        else 
       {
        echo "img path rename failed";
        }
    }
    else 
    {
        echo "failed";
    }

}



















?>