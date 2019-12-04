<?php
    session_start();
    $username = $_SESSION['username'];
    $buyer_name = $_SESSION['buyer_name'];
    require("../../instamojo/instamojo.php");
    $amount = $_GET['amount'];
    $api = new Instamojo\Instamojo('test_c2bb1c309d111c59923e30606ff','test_65db6f68825688481c7358ca397', 'https://test.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => "PICDRIVE PLAN",
            "amount" => $amount,
            "send_email" => true,
            "buyer_name" => $buyer_name,
            "email" => $username,
            "phone" => "8972365711",
            "redirect_url" => "https://wapinstitute.com/"
            ));
        $payment_url = $response['longurl'];
        header("Location:$payment_url");
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }






?>