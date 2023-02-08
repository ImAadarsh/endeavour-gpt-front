<?php
include 'admin/connect.php';
include 'admin/session.php';
// $results1=$connect->query($sql1);
//           $f=$results1->fetch_assoc();
$data = array("email" => $_SESSION['email']);
$make_call = NODEAPIGET('chat/email',$_SESSION['token'],json_encode($data,true),'POST');
$response = json_decode($make_call, true);

$count = 1;
                                        foreach($response['data'] as $data){
        ?>
<div class="col-md-3">Query : <?php echo $data['query'];?></div>
<div class="col-md-7"><i>Response :<?php echo $data['response'];?></i></div>
<div class="col-md-9"><small><?php echo $data['responseTime'];?></small></div>
<div class="clearfix"></div>
<p>&nbsp;</p>
<?php
 $count= $count+1; 
}

?>