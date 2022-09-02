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
?>

        <main role="main" class="main-content">
            <div class="container-fluid">


                <div class="card shadow mb-4">
                    <a href="users.php">
                        <button type="button" class="btn btn-primary">View Users</button>
                    </a>
                    <div class="card-header">
                        <strong class="card-title">Edit User</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="userhandler.php" method="POST" enctype="multipart/form-data">

                                    <?php
                                    $id = $_GET['id'];
          $sql="Select * from users where id=$id ";
          $results=$connect->query($sql);
          $final=$results->fetch_assoc();?>
                                    <div class="form-group mb-3">

                                        <input hidden type="text" id="simpleinput" class="form-control"
                                            placeholder="Caption" name="email" value="<?php echo $final['email']?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Name</label>
                                        <input type="text" id="simpleinput" class="form-control" placeholder="Caption"
                                            name="name" value="<?php echo $final['name']?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">User Coin</label>
                                        <input disabled type="text" id="simpleinput" class="form-control"
                                            placeholder="User Coin" name="user_coin"
                                            value="<?php echo $final['user_coin']?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Mobile</label>
                                        <input type="text" id="simpleinput" class="form-control" placeholder="Caption"
                                            name="mobile" value="<?php echo $final['mobile']?>">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="custom-select">User Type</label>
                                        <select name="user_type" class="custom-select" id="custom-select">
                                            <option value="<?php echo $final['user_type']?>
                                            " selected><?php if($final['user_type']=='s_admin'){
                                                    echo 'Super Admin';
                                                }
                                                elseif($final['user_type']=='s_master'){
                                                    echo 'Super Master';
                                                }
                                                elseif($final['user_type']=='master'){
                                                    echo 'Master';
                                                }
                                                elseif($final['user_type']=='user'){
                                                    echo 'User';
                                                }?>
                                            </option>
                                            <option value="s_admin">Super Admin
                                            </option>
                                            <option value="s_master">Super Master
                                            </option>
                                            <option value="master">Master
                                            </option>
                                            <option value="user">User
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

                <div class="card shadow mb-4">
                    <a href="users.php">
                        <button type="button" class="btn btn-primary">Add Coins</button>
                    </a>
                    <div class="card-header">
                        <strong class="card-title">Coin</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="coinhandler.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-3">

                                        <input hidden type="text" id="simpleinput" class="form-control"
                                            placeholder="Caption" name="email" value="<?php echo $final['email']?>">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Add Coin</label>
                                            <input type="text" id="simpleinput" class="form-control"
                                                placeholder="Coin Amount" name="amount" value="">
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

                </div>
                <div class="container-fluid">
                    <!-- <div class="row justify-content-center"> -->

                    <!-- / .row -->
                    <div class="row">
                        <!-- Recent orders -->
                        <div class="col-md-12">
                            <div class="card shadow eq-card">
                                <div class="card-header">
                                    <strong class="card-title">All Balance Credit </strong>
                                    <a class="float-right small text-muted" href="#!"></a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>from</th>
                                                <th>Amount</th>
                                                <th>Time</th>
                                                <th>User Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
         $uid = $_GET['id'];
         $sql = "select * from transactions where to_id=$uid";
         $results = $connect->query($sql);
         while($final=$results->fetch_assoc()){?>
                                            <tr>
                                                <td><?php echo $final['id']?></td>
                                                <th scope="col"><?php 
                                                $uuid = $final['from_id'];
                                                $sqlw = "select * from users where id=$uuid";
         $resultsw = $connect->query($sqlw);
         $ft=$resultsw->fetch_assoc(); echo $ft['name']?></th>

                                                <td><?php echo $final['amount']?></td>
                                                <td><?php echo $final['created_at']?></td>
                                                <td>
                                                    <?php 
                                                if($ft['user_type']=='s_admin'){
                                                    echo 'Super Admin';
                                                }
                                                elseif($ft['user_type']=='s_master'){
                                                    echo 'Super Master';
                                                }
                                                elseif($ft['user_type']=='master'){
                                                    echo 'Master';
                                                }
                                                elseif($ft['user_type']=='user'){
                                                    echo 'User';
                                                }
                                                ?>
                                                </td>

                                            </tr>
                                            <?php }
         ?>
                                        </tbody>
                                    </table>
                                </div> <!-- .card-body -->
                            </div> <!-- .card -->
                        </div> <!-- / .col-md-8 -->
                        <!-- Recent Activity -->
                        <!-- / .col-md-3 -->
                    </div> <!-- end section -->
                </div>
            </div> <!-- .row -->
            <div class="container-fluid">
                <!-- <div class="row justify-content-center"> -->

                <!-- / .row -->
                <div class="row">
                    <!-- Recent orders -->
                    <div class="col-md-12">
                        <div class="card shadow eq-card">
                            <div class="card-header">
                                <strong class="card-title">All Balance Debit/Sent to </strong>
                                <a class="float-right small text-muted" href="#!"></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>To</th>
                                            <th>Amount</th>
                                            <th>Time</th>
                                            <th>User Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
         $uid = $_GET['id'];
         $sql = "select * from transactions where from_id=$uid";
         $results = $connect->query($sql);
         while($final=$results->fetch_assoc()){?>
                                        <tr>
                                            <td><?php echo $final['id']?></td>
                                            <th scope="col"><?php 
                                                $uuid = $final['to_id'];
                                                $sqlw = "select * from users where id=$uuid";
         $resultsw = $connect->query($sqlw);
         $ft=$resultsw->fetch_assoc(); echo $ft['name']?></th>

                                            <td><?php echo $final['amount']?></td>
                                            <td><?php echo $final['created_at']?></td>
                                            <td>
                                                <?php 
                                                if($ft['user_type']=='s_admin'){
                                                    echo 'Super Admin';
                                                }
                                                elseif($ft['user_type']=='s_master'){
                                                    echo 'Super Master';
                                                }
                                                elseif($ft['user_type']=='master'){
                                                    echo 'Master';
                                                }
                                                elseif($ft['user_type']=='user'){
                                                    echo 'User';
                                                }
                                                ?>
                                            </td>

                                        </tr>
                                        <?php }
         ?>
                                    </tbody>
                                </table>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- / .col-md-8 -->
                    <!-- Recent Activity -->
                    <!-- / .col-md-3 -->
                </div> <!-- end section -->
            </div>
    </div> <!-- .row -->
    </div> <!-- .container-fluid -->

    </div> <!-- .container-fluid -->



    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>