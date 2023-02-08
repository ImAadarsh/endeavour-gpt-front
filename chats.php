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
                    <div class="container">
                        <br>
                        <h1>Endeavour Chat</h1>
                        <br>
                        <div id='demo' class="col-md-5">
                            <br>

                            <textarea class="comment form-control" id="comment" placeholder="Your Messages" cols="30"
                                rows="3" required name="comment"></textarea>
                            <br>
                            <a href="javascript:void(0)" class="btn btn-primary submit">submit</a>
                        </div>
                        <br>
                        <div class="comment_listing"> </div>
                    </div>
                </div>





            </div> <!-- .container-fluid -->
            <script src="js/jquery.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/moment.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/simplebar.min.js"></script>
            <script src='js/daterangepicker.js'></script>
            <script src='js/jquery.stickOnScroll.js'></script>
            <script src="js/tinycolor-min.js"></script>
            <script src="js/config.js"></script>
            <script src="js/d3.min.js"></script>
            <script src="js/topojson.min.js"></script>
            <script src="js/datamaps.all.min.js"></script>
            <script src="js/datamaps-zoomto.js"></script>
            <script src="js/datamaps.custom.js"></script>
            <script src="js/Chart.min.js"></script>
            <script>
            /* defind global options */
            Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
            Chart.defaults.global.defaultFontColor = colors.mutedColor;
            </script>
            <script src="js/gauge.min.js"></script>
            <script src="js/jquery.sparkline.min.js"></script>
            <script src="js/apexcharts.min.js"></script>
            <script src="js/apexcharts.custom.js"></script>
            <script src="js/apps.js"></script>
            <!-- Global site tag (gtag.js) - Google Analytics -->

            <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Subscribe To Our Website Plan</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
                            <form action="subscribe.php">
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'admin/shortcut.php'; ?>
</body>

</html>

<script type="text/javascript">
$(function() {
    $.ajax({
        url: 'comment_list.php',
        success: function(res) {
            $('.comment_listing').html(res);
        }
    })
});
$(function() {
    // setInterval(function() {
    //     $.ajax({
    //         url: 'comment_list.php',
    //         success: function(res) {
    //             $('.comment_listing').html(res);
    //         }
    //     })
    // }, 10000);

    $('.submit').click(function() {
        var comment = $('#comment').val();
        document.getElementById("demo").innerHTML =
            "<h1><b style='color: blue;'>Endeavour GPT generating response.</b></h1>";
        $.ajax({
            url: 'save_comment.php',
            dataType: 'text',
            type: 'POST',
            data: {
                comment: comment,
            },

            success: function(response) {
                if (response === 'failed')
                    alert('Please check your login details!');
                else
                    window.location = window.location;
            }
        })
    })
})
</script>