<?php    
    session_start();
    $username = $_SESSION['username'];
    require("../../php/database.php");
    $email = $username;
    $getStorageData = "SELECT storage,used_storage FROM adse WHERE username='$email'";
    $get_response = $db->query($getStorageData);
    $data = $get_response->fetch_assoc();
    $used_memory =$data['used_storage'];
    $total =$data['storage'];
    $free_space = $total-$used_memory;
    $response = [$used_memory."MB/".$total."MB",$free_space];
    echo json_encode($response);
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
    ?>