<?php
error_reporting(0);
ini_set('display_errors', 0);
include 'admin/connect.php';
include 'admin/session.php';
include 'admin/header.php';
?>

<body class="vertical  light  ">
    <div class="wrapper">
        <?php
include 'admin/navbar.php';
include 'admin/aside.php';
// echo $_SESSION['token'];
if(isset($_GET['activate'])){
    $data = array("id" => $_GET['activate']);
    $make_call = NODEAPIGET('shop/active',$_SESSION['token'],json_encode($data,true),'POST');
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }  
}
if(isset($_GET['inactivate'])){
    $data = array("id" => $_GET['inactivate'] );
    $make_call = NODEAPIGET('shop/inactive',$_SESSION['token'],json_encode($data,true),'POST');
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }  
}
$make_call = NODEAPIGET('salesoffer',$_SESSION['token'],null,'GET');
    $response = json_decode($make_call, true);
    if($response['message']){
        // echo "<script>alert('".$response['message']."')
        // </script>
        // ";
    }
    
?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <!-- <div class="row justify-content-center"> -->

                <!-- / .row -->
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Description</th>
                                            <th>Location</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Image</th>
                                            <th>Owner Name</th>
                                            <th>Owner Email</th>
                                            <th>Owner Contact</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($response['data'] as $data){
                                            $uid = array("id" => $data['ownerId'] );
                                            $call_user = NODEAPIGET('user/uid',$_SESSION['token'],json_encode($uid,true),'POST');
                                            $cuser = json_decode($call_user, true);
                                            // if(isset($cuser['data'][0]))
                                            {$user = $cuser['data'][0];}

                                        
                                        ?>
                                        <tr>

                                            <td><?php echo $count ?></td>
                                            <td><?php echo $data['description'] ?></td>
                                            <td><?php echo $data['location'] ?></td>
                                            <td><?php echo $data['startDate'] ?></td>
                                            <td><?php echo $data['endDate'] ?></td>
                                            <td><a href="<?php echo $data['offerImage'] ?>" target="_blank"
                                                    rel="noopener noreferrer">Open Image</a></td>

                                            <td>
                                                <?php if(isset($user['name'])){
                                                echo $user['name'];
                                            }else{
                                                echo 'NaN';
                                            } ?>
                                            </td>
                                            <td><?php if(isset($user['email'])){
                                                echo $user['email'];
                                            }else{
                                                echo 'NaN';
                                            } ?></td>
                                            <td><?php 
                                            if(isset($user['mobile'])){
                                                echo $user['mobile'];
                                            }else{
                                                echo 'NaN';
                                            }
                                             ?></td>
                                        </tr>
                                        <?php
                                        $count= $count+1; 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
    </div>
    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>