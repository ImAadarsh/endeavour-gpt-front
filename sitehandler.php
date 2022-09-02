<?php
include ("admin/connect.php");
include ("admin/session.php");


$data_array =  array(
    "token" => $_SESSION["usertoken"],
    "site_name" => $_POST['site_name'],
 'logo'=> curl_file_create( $_FILES['logo']['tmp_name'], $_FILES['logo']['type'], $_FILES['logo']['name']),
 'favicon'=> curl_file_create( $_FILES['favicon']['tmp_name'], $_FILES['favicon']['type'], $_FILES['favicon']['name']),
);
    $make_call = callAPI1('POST', 'siteSetting', $data_array,$_SESSION['token']);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='siteedit.php';
        </script>
        ";
        
    }  

?>