<?php
    session_start();
    $username = $_SESSION['username'];
    require("../../php/database.php");
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