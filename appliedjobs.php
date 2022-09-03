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
$make_call = NODEAPIGET('jobapply',$_SESSION['token'],null,'GET');
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

                                            <th>Job Name</th>
                                            <th>Job Description</th>
                                            <th>Shop Name</th>
                                            <th>Resume</th>
                                            <th>Applicant Name</th>
                                            <th>Applicant Contact</th>
                                            <th>Applicant Email</th>
                                            <th>Applied On</th>
                                            <th>Owner Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($response['data'] as $data){
                                            $uid = array("id" => $data['jobId'] );
                                            $call_user = NODEAPIGET('job/uid',$_SESSION['token'],json_encode($uid,true),'POST');
                                            $cuser = json_decode($call_user, true);
                                            // if(isset($cuser['data'][0]))
                                            {$user = $cuser['data'][0];}

                                        
                                        ?>
                                        <tr>

                                            <td><?php echo $count ?></td>

                                            <td> <?php if(isset($user['designationName'])){
                                                echo $user['designationName'];
                                            }else{
                                                echo 'NaN';
                                            } ?></td>
                                            <td> <?php if(isset($user['description'])){
                                                echo $user['description'];
                                            }else{
                                                echo 'NaN';
                                            } ?></td>
                                            <td> <?php if(isset($user['shopName'])){
                                                echo $user['shopName'];
                                            }else{
                                                echo 'NaN';
                                            } ?></td>
                                            <td><a href="<?php echo $data['resumeLink'] ?>" target="_blank"
                                                    rel="noopener noreferrer">Open Resume</a></td>

                                            <td>
                                                <?php echo $data['applicantName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['applicantContact'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['applicantEmail'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['timeStamp'] ?>
                                            </td>
                                            <td><?php
                                            if(isset($user['contactNumber'])){
                                                echo $user['contactNumber'];
                                            }
                                            else{
                                                echo 'NaN';
                                            }?></td>
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