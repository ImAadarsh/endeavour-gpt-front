<?php

use LDAP\Result;
error_reporting(0);
ini_set('display_errors', 0);
session_start();
include("admin/connect.php");

if (isset($_POST['login'])) {
    $data_array =  array(
    "userType" => 'user',
    "email" => $_POST['email'],
    "password" => $_POST['password'],
    "mobile" => $_POST['mobile'],
    "name" => $_POST['name'],
    
);
    $make_call = callAPI('POST', 'user/signup', json_encode($data_array),NULL);
    $response = json_decode($make_call, true);
    if($response['message']){
        echo '<script>alert("'.$response['message'].'")</script>';
    }  
if ($response['user'][0]['_id']) {
    header('location: index.php');
}
}
?>
<?php include("partials/header.php"); ?>

<body class="light ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="register.php" method="POST">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="index.php">
                    <img id="logo" width="190px" height="100px"
                        src="https://endeavourdigital.in/assets/images/logo/Endeavour_Logo_black_bg.png" alt="">
                </a>
                <h1 class="h6 mb-3">Sign up</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Name</label>
                    <input name="name" type="text" id="inputEmail" class="form-control form-control-lg"
                        placeholder="Your Name" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input name="email" type="email" id="inputEmail" class="form-control form-control-lg"
                        placeholder="Email address" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Mobile</label>
                    <input name="mobile" type="text" id="inputEmail" class="form-control form-control-lg"
                        placeholder="Mobile" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control form-control-lg"
                        placeholder="Password" name="password" required="">
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <!-- <input type="checkbox" value="remember-me"> Stay logged in </label> -->
                </div>
                <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Register</button>
                <br>
                <h4></h4>
                <b class="mt-5 mb-3"> <a href="index.php"> Login</a></b>
                </h4>
                <br>
                <p class="mt-5 mb-3 text-muted"> Endeavour GPT © 2023</p>
            </form>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
</body>

</html>
</body>

</html>