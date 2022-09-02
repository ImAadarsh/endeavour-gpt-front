<?php
include 'admin/connect.php';
include 'admin/session.php';
include 'admin/header.php';
$sql1="Select * from sitesettings where id =1";
          $results1=$connect->query($sql1);
          $f=$results1->fetch_assoc();
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
                    <a href="dashboard.php">
                        <button type="button" class="btn btn-primary">Dashboard</button>
                    </a>
                    <div class="card-header">
                        <strong class="card-title">Website Settings</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="sitehandler.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" value="1" name="form_id">
                                    <div class="form-group mb-3">

                                        <label for="simpleinput">Site Name</label>
                                        <input type="text" id="simpleinput" class="form-control" placeholder="Tax"
                                            name="site_name" value="<?php echo $f['site_name']; ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Favicon</label>
                                        <input required type="file" id="simpleinput" class="form-control"
                                            placeholder="Shipping Charge" name="favicon">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Site Logo</label>
                                        <input required type="file" id="simpleinput" class="form-control"
                                            placeholder="Shipping Charge" name="logo">
                                    </div>
                                    <input type="submit" id="example-palaceholder" class="btn btn-primary" name="update"
                                        value="Submit">


                            </div>
                        </div> <!-- /.col -->
                        </form>
                    </div>
                </div>
            </div>





    </div> <!-- .container-fluid -->

    <?php include "admin/footer.php"; ?>