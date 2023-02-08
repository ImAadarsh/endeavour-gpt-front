<?php
include 'admin/connect.php';
include 'admin/session.php';


$data_array =  array(
    "email" => $_SESSION['email'],
    "query" => $_POST['comment']
);
    $make_call = callAPI('POST', 'chat', json_encode($data_array),$_SESSION['token']);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo $response['message'];
    } 
?>