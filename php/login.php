<?php
require("database.php");
$username = base64_decode($_POST['username']);
$password = md5(base64_decode($_POST['password']));
    $user_mail = "SELECT username FROM adse WHERE username='$username'";
    $response=$db->query($user_mail);
    if(($response->num_rows)!=0)
    {
        $user_password = "SELECT username password FROM adse WHERE username='$username' AND password='$password'";
        $responsePassword=$db->query($user_password);
        if(($responsePassword->num_rows)!=0)
        {
            $user_status ="SELECT status FROM adse WHERE username='$username' AND password='$password' AND status='active'";
            $response_status=$db->query($user_status);
            if(($response_status->num_rows)!=0)
            {
                echo "login success";
                session_start();
                $_SESSION['username'] = $username;
            }
            else
            {
                $get_activation_code= "SELECT activation_code FROM adse WHERE username='$username' AND password='$password'";
                $response_activation_code=$db->query($get_activation_code);
                $data=$response_activation_code->fetch_assoc();
                $final_code=$data['activation_code'];
                $check_code_mail=mail($username,"Picdrive Activation Code","Thank you for choosing us : ".$final_code);
                if($check_code_mail==true)
                {
                echo "pandding";
                }
            }
        }
        else
        {
            echo "password not match";
        }
    }
    else
    {
        echo "user not found";
    }













?>