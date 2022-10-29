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
if(isset($_GET['delete'])){
    $data = array("id" => $_GET['delete']);
    $make_call = NODEAPIGET('category/delete',$_SESSION['token'],json_encode($data,true),'GET');
    $response = json_decode($make_call, true);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        </script>
        ";
    }
}
// if(isset($_GET['inactivate'])){
//     $data = array("id" => $_GET['inactivate'] );
//     $make_call = NODEAPIGET('shop/inactive',$_SESSION['token'],json_encode($data,true),'POST');
//     $response = json_decode($make_call, true);
//     if($response['message']){
//         echo "<script>alert('".$response['message']."')
//         </script>
//         ";
//     }  
// }
$make_call = NODEAPIGET('category',$_SESSION['token'],null,'GET');
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
                                            <th>Category Name</th>
                                            <!-- <th>Discount in Rs</th>
                                            <th>Count</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 1;
                                        foreach($response['data'] as $data){
                                        
                                        ?>
                                        <tr>

                                            <td><?php echo $count ?></td>
                                            <td><?php echo $data['categoryName'] ?></td>
                                            <!-- <td><?php echo $data['discount'] ?></td>
                                            <td><?php echo $data['count'] ?></td> -->
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a style="color: red;" class="dropdown-item"
                                                        href="category.php?delete=<?php echo $data['_id'] ?>">Delete
                                                        Category</a>
                                                </div>
                                            </td>

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