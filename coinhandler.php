<?php
include ("admin/connect.php");
include ("admin/session.php");
$data_array =  array(
    "amount" => $_POST['amount'],
    "token" => $_SESSION['usertoken'],
    "email" => $_POST['email'],
);
    $make_call = callAPI1('POST', 'addCoin', $data_array,$_SESSION['token']);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='users.php';
        </script>
        ";
    }
?>