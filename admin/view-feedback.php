<?php
include '../class/connection.php';
$con = connect();
check_admin_login();
if (isset($_GET["did"]))
{
    $did =$_GET["did"];
    $result= mysqli_query($con,"DELETE from feedback  where feedback_id  ='{$did}'") or die(mysqli_error($con));
    if($result)
    {
        header("location:view-feedback.php");
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
                                            <i class="fa fa-table"></i> Feedback List
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
                                                     
                                                        <th>feedback_id</th>
                                                        <th>feedback_date </th>
                                                        <th> feedback_description</th>
                                                        <th> feedback_rating</th>
                                                        <th>user_id</th> 	
                                                        <th> academy_id </th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    
                                                    $result = mysqli_query($con, "Select * from feedback inner join user on user.user_id = feedback.user_id inner join musical_academy on musical_academy.musical_academy_id = feedback.academy_id") or die(mysqli_error($con));
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        echo "<tr>
                                                        <td>{$row["feedback_id"]}</td>
                                                        <td>{$row["feedback_date"]}</td>
                                                        <td>{$row["feedback_description"]}</td>
                                                        <td>{$row["feedback_rating"]}</td>
                                                        <td>{$row["user_id"]}</td>
                                                        <td>{$row["academy_id"]}</td>
                                                        <td> <a href='edit-feedback.php?eid={$row["feedback_id"]}'>Edit </a> |<a href='?did={$row["feedback_id"]}'>  Delete</a></td>
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

