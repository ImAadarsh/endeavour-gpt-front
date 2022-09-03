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
                    <a href="coupons.php">
                        <button type="button" class="btn btn-primary">View Coupon</button>
                    </a>
                    <div class="card-header">
                        <strong class="card-title">New User</strong>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="controllers/addcouponhandler.php" method="POST"
                                    enctype="multipart/form-data">


                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Coupon Code</label>
                                        <input required type="text" id="simpleinput" class="form-control"
                                            placeholder="Coupon Code" name="code">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Discount in Rs.</label>
                                        <input required type="text" id="simpleinput" class="form-control"
                                            placeholder="Rupees" name="discount">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">No. Times Code will be used</label>
                                        <input required type="text" id="simpleinput" class="form-control"
                                            placeholder="Count" name="count">
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