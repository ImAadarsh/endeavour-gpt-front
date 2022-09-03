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
$make_call = NODEAPIGET('shop',$_SESSION['token'],null,'GET');
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
                                            <th>Shop Name</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>Owner Name</th>
                                            <th>Owner Email</th>
                                            <th>Owner Contact</th>
                                            <th>Is Active</th>
                                            <th>Action</th>
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
                                            <td><?php echo $data['shopName'] ?></td>
                                            <td><?php echo $data['location'] ?></td>
                                            <td><?php echo $data['description'] ?></td>

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
                                            <td><?php 
                                            if($data['isActive']==1){
                                                echo "<h6 style='color:green'>Active</h6>";
                                            }else{
                                                echo "<h6 style='color:red'>Inactive</h6>";
                                            }
                                            ?></td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="shops.php?activate=<?php echo $data['_id'] ?>">Activate
                                                        Shop</a>
                                                    <a class="dropdown-item"
                                                        href="shops.php?inactivate=<?php echo $data['_id'] ?>">Inactivate
                                                        Shop</a>
                                                </div>
                                            </td>
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