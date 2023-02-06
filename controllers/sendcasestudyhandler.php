<?php
include ("../admin/connect.php");
include ("../admin/session.php");

$data_array =  array(
    "email" => $_POST['email'],
    "caseid" => $_POST['caseid'],
);

echo json_encode($data_array,true);
    $make_call = NODEAPIGET('user/send',$_SESSION['token'],json_encode($data_array,true),'POST');
    $response = json_decode($make_call, true);
    //  print_r($response);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='../sendcasestudy.php';
        </script>";
    }  

?>