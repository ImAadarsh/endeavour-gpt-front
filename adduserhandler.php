<?php
include ("admin/connect.php");
include ("admin/session.php");


$data_array =  array(
    "email" => $_POST['email'],
    "name" => $_POST['name'],
    "mobile" => $_POST['mobile'],
    "user_type" => $_POST['user_type'],
    "password" => $_POST['password'],
    "token" => $_SESSION['usertoken'], 
);
    $make_call = callAPI1('POST', 'register', $data_array,$_SESSION['token']);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='users.php';
        </script>";
    }  

?>