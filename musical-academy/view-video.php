
<?php
include '../class/connection.php';
$con = connect();
check_musical_login();

if (isset($_GET["did"]))
{
    $did =$_GET["did"];
    $result= mysqli_query($con,"DELETE from video  where video_id ='{$did}'") or die(mysqli_error($con));
    if($result)
    {
        header("location:view-video.php");
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
                                            <i class="fa fa-table"></i> Video List
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
                                                     
                                                        <th>video_id</th>
                                                        <th> video_title</th>
                                                        <th>video_description </th>
                                                        <th> course_id</th>
                                                        <th>video_url</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    
                                                    $result = mysqli_query($con, "Select * from video inner join course on course.course_id = video.course_id") or die(mysqli_error($con));
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        echo "<tr>
                                                        <td>{$row["video_id"]}</td>
                                                        <td>{$row["video_title"]}</td>
                                                        <td>{$row["video_description"]}</td>
                                                        <td>{$row["course_id"]}</td>
                                                        <td>{$row["video_url"]}</td>
                                                        <td> <a href='edit-video.php?eid={$row["video_id"]}'> Edit </a> |<a href='?did={$row["video_id"]}'>  Delete </a></td>
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

