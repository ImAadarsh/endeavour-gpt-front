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
                                <strong class="card-title">All Placed Orders</strong> <br>
                                <strong class="card-title">Some Part of Order will we yours.</strong>
                                <a class="float-right small text-muted" href="#!"></a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Name of Customer</th>
                                            <th>Customer Email</th>
                                            <th>Customer Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
         $vid = $_SESSION['userid'];
         $sqlv = "select Distinct order_id from cartitems where vendor_id=$vid";
         $resultsv = $connect->query($sqlv);
         while($finalv=$resultsv->fetch_assoc()){?>

                                        <?php
                                        $vidd = $finalv['order_id'];
         $sql = "select * from orders where is_placed=1 AND order_id=$vidd";
         $results = $connect->query($sql);
         while($final=$results->fetch_assoc()){?>
                                        <?php
         $uid = $final['user_id'];
         $sqlu = "select * from users where id=$uid";
         $resultsu = $connect->query($sqlu);
         $finalu=$resultsu->fetch_assoc()?>
                                        <tr>
                                            <td><?php echo $final['order_id']?></td>
                                            <th scope="col"><?php echo $finalu['name']?></th>
                                            <td><?php echo $finalu['email']?>
                                            </td>
                                            <td><?php echo $finalu['mobile']?></td>
                                            <td>
                                                <a href="orderdetails.php?id=<?php echo $final['order_id']?>">View
                                                    Order</a>
                                                <br>
                                                <a
                                                    href="shipment.php?id=<?php echo $final['order_id']?>&uid=<?php echo $final['user_id']?>">Update
                                                    Shipment</a>
                                            </td>
                                        </tr>
                                        <?php }
         ?>
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