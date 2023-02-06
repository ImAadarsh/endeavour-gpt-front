<?php
include ("../admin/connect.php");
include ("../admin/session.php");

$data_array =  array(
    "text" => $_POST['text'],
    "name" => $_POST['name'],
    "link" => curl_file_create( $_FILES['link']['tmp_name'], $_FILES['link']['type'], $_FILES['link']['name']),
    "icon" => curl_file_create( $_FILES['icon']['tmp_name'], $_FILES['icon']['type'], $_FILES['icon']['name']),
);

echo json_encode($data_array,true);
$make_call = callAPI1('POST', 'casestudy', $data_array,$_SESSION['token']);
$response = json_decode($make_call, true);
if($response['message']){
    echo "<script>alert('".$response['message']."')
    window.location.href='../casestudy.php';
    </script>
    ";
    }  

?>