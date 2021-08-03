<?php
include '../class/connection.php';
$con = connect();
check_admin_login();

if (isset($_GET["did"]))
{
    $did =$_GET["did"];
    $result= mysqli_query($con,"DELETE from payment where payment_id ='{$did}'") or die(mysqli_error($con));
    if($result)
    {
        header("location:view-payment.php");
    }
}

?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
<?php include './my-theme/header-script.php'; ?>
    </head>
    <body>
<?php include './my-theme/loader.php'; ?>
        <div class="bg-dark" id="wrap">
        <?php include './my-theme/header-top.php'; ?>
            <!-- /#top -->
            <div class="wrapper">
<?php include './my-theme/menu.php'; ?>
                <!-- /#left -->
                <div id="content" class="bg-container">
                    <div class="outer">
                        <div class="inner bg-container">
                            <div class="row">
                                <div class="col-xs-12 data_tables">
                                    <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <i class="fa fa-table"></i> Payment List
                                        </div>
                                        <div class="card-block p-t-25">
                                            <div class="">
                                                <div class="pull-sm-right">
                                                    <div class="tools pull-sm-right"></div>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                                <thead>
                                                    <tr>
                                                     
                                                        <th>payment_id</th>
                                                        <th>payment_date </th>
                                                        <th>payment_amount</th>
                                                        <th>payment_mode </th>
                                                        <th>payment_status</th>
                                                        <th>enrollment_id</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    
                                                    $result = mysqli_query($con, "Select * from payment") or die(mysqli_error($con));
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        echo "<tr>
                                                        <td>{$row["payment_id"]}</td>
                                                        <td>{$row["payment_date"]}</td>
                                                        <td>{$row["payment_amount"]}</td>
                                                        <td>{$row["payment_mode"]}</td>
                                                        <td>{$row["payment_status"]}</td>
                                                        <td>{$row["enrollment_id"]}</td>
                                                        <td> <a href='edit-payment.php?eid={$row["payment_id"]}'> Edit </a> |<a href='?did={$row["payment_id"]}'>  Delete </a></td>
                                                    </tr>";
                                                    }
                                                    
                                                    ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>

                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /.row -->
                            <!-- /.row -->
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
            </div>
            <!--wrapper-->            
            <!-- # right side -->
        </div>
        <!-- /#wrap -->
        <!-- global scripts-->
<?php include './my-theme/scripts.php'; ?>
        <!-- end page level scripts -->
    </body>
</html>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

