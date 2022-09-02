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
                <!-- <div class="row justify-content-center"> -->

                <!-- / .row -->
                <div class="row">
                    <!-- Recent orders -->
                    <div class="col-md-12">
                        <div class="card shadow eq-card">
                            <div class="card-header">
                                <strong class="card-title">All <?php if(isset($_GET['user_type'])){
           if($_GET['user_type']=='s_admin'){
            echo 'Super Admin';
        }
        elseif($_GET['user_type']=='s_master'){
            echo 'Super Master';
        }
        elseif($_GET['user_type']=='master'){
            echo 'Master';
        }
        elseif($_GET['user_type']=='user'){
            echo 'User';
        }
         }
         else{
           echo  " Users";
         } ?> </strong>
                                <a class="float-right small text-muted" href="#!"></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Game Id</th>
                                            <th>Multiply Value</th>
                                            <th>Bet Amount</th>
                                            <th>Match Status</th>
                                            <th>Reward Amount</th>
                                            <th>Last Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
         $sql = "select * from game_transactions";
         $results = $connect->query($sql);
         while($final=$results->fetch_assoc()){?>
                                        <tr>
                                            <td><?php echo $final['id']?></td>
                                            <th scope="col"><?php
                                            $uuid = $final['user_id'];
                                            $sqlq = "select * from users where id=$uuid";
                                            $resultsq = $connect->query($sqlq);
                                            $fl=$resultsq->fetch_assoc();
                                            echo $fl['name']?></th>
                                            <td><?php echo $final['game_id']?>
                                            </td>
                                            <td><?php echo $final['multiply_value']?></td>
                                            <td><?php echo $final['amount']?></td>
                                            <td><?php echo $final['status']?></td>
                                            <td><?php echo $final['reward_amount']?></td>
                                            <td><?php echo $final['updated_at']?></td>

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

    <?php include "admin/footer.php"; ?>