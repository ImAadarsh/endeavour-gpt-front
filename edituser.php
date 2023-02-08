<?php
include 'admin/connect.php';
include 'admin/session.php';
include 'admin/header.php';
?>

<body class="vertical  light  ">
    <div class="wrapper">
        <?php
include 'admin/navbar.php';
include 'admin/aside.php';
if(isset($_GET['activate'])){ 
    $uu = $_GET['activate'];
    $uid = array("id" => $_GET['activate'] );
                                            $call_user = NODEAPIGET('user/uid',$_SESSION['token'],json_encode($uid,true),'POST');
                                            $cuser = json_decode($call_user, true);
                                            // if(isset($cuser['data'][0]))
                                            {$user = $cuser['data'][0];}
}else{
    $uu = $_SESSION['userid'];
    $uid = array("id" => $_SESSION['userid'] );
    $call_user = NODEAPIGET('user/uid',$_SESSION['token'],json_encode($uid,true),'POST');
    $cuser = json_decode($call_user, true);
    // if(isset($cuser['data'][0]))
    {$user = $cuser['data'][0];}
}
?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <!-- <a href="users.php">
                        <button type="button" class="btn btn-primary">View Users</button>
                    </a> -->
                    <div class="card-header">
                        <strong class="card-title">Edit User</strong>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="controllers/edituserhandler.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <input hidden required type="text" id="simpleinput" class="form-control"
                                            value="<?php echo $uu ?>" name="id">
                                        <input hidden required type="text" id="simpleinput" class="form-control"
                                            value="<?php echo $user['email'] ?>" name="email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Name</label>
                                        <input required type="text" id="simpleinput" class="form-control"
                                            value="<?php echo $user['name'] ?>" name="name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Email</label>
                                        <input disabled type="text" id="simpleinput" class="form-control"
                                            value="<?php echo $user['email'] ?>" name="name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Mobile</label>
                                        <input required type="text" id="simpleinput" class="form-control"
                                            value="<?php echo $user['mobile'] ?>" name="mobile">
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="custom-select">User Type</label>
                                        <select disabled required name="user_type" class="custom-select"
                                            id="custom-select">
                                            <option selected value="<?php echo $user['userType'] ?>">
                                                <?php echo $user['userType'] ?>
                                            </option>
                                        </select>
                                    </div>



                                    <div class="form-group mb-3">

                                        <input type="submit" id="example-palaceholder" class="btn btn-primary"
                                            value="Submit">
                                    </div>
                            </div> <!-- /.col -->
                            </form>
                        </div>
                    </div>
                </div>





            </div> <!-- .container-fluid -->

            <?php include "admin/footer.php"; ?>