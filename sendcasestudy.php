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
                    <a href="casestudy.php">
                        <button type="button" class="btn btn-primary">View Casestudy</button>
                    </a>
                    <div class="card-header">
                        <strong class="card-title">Send Casestudy</strong>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="controllers/sendcasestudyhandler.php" method="POST"
                                    enctype="multipart/form-data">


                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Casestudy ID</label>
                                        <input required type="text" id="simpleinput" class="form-control"
                                            placeholder="Case Study ID" name="caseid">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Recivers Email</label>
                                        <input required type="email" id="simpleinput" class="form-control"
                                            placeholder="Email Address" name="email">
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