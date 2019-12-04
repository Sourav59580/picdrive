<?php
require("../../php/database.php");
session_start();
$username = $_SESSION["username"];
$get_id = "SELECT id FROM adse WHERE username = '$username'";
$get_response = $db->query($get_id);
$data = $get_response->fetch_assoc();
$folder_name = "../gallery/user_".$data['id']."/";
$file = $_FILES['data'];
$user_path = $file['tmp_name'];
$file_name = strtolower($file['name']);
$file_size = round($file['size']/1024/1024,2);
$table_name = "user_".$data['id'];
$complete_path = $folder_name.$file_name;
//check free space
$check_space = "SELECT storage,used_storage FROM adse WHERE username = '$username'";
$response = $db->query($check_space);
$data = $response->fetch_assoc();
$total = $data['storage'];
$used = $data['used_storage'];
$free_space = $total-$used;
if($free_space>=$file_size)
{
   if(file_exists($folder_name.$file_name)==true)
   {
       echo "file already exits pls remain the name";
   }
   else{
       if(move_uploaded_file($user_path,$folder_name.$file_name))
       {
        $img_dataStore = "INSERT INTO $table_name(image_name,image_path,image_size)
        VALUE('$file_name','$complete_path','$file_size')";
        if($db->query($img_dataStore))
        {
            $select_storage = "SELECT used_storage FROM adse WHERE username = '$username'";
            $response_storage = $db->query($select_storage);
            $storage_data =$response_storage->fetch_assoc();
            $used_memory = $storage_data['used_storage']+$file_size;
            $update_storage ="UPDATE adse SET used_storage =' $used_memory' WHERE username = '$username'";
            if($db->query($update_storage))
            {
            echo "success";
            }
            else
            {
                echo "faild to update database storage";
            }

        }
        else
        {
            echo "upload faild";
        }
       }
       else
       {
           echo "failed";
       }
   }
}
else{
    echo "File size is too large,please purchase some memory plan";
}





// move_uploaded_file($user_path,$folder_name.$file_name);


// $imgDataStore = "INSERT INTO "
// echo "success";




// if($_SERVER['REQUEST_METHOD'] == "POST")
// {
//     $upload_file = $_FILES["data"];
//     $location = $upload_file["tmp_name"];
//     $name = $upload_file["name"];
//     move_uploaded_file($location,"profilePhoto/".$name);
//     echo "success";
// }














?>