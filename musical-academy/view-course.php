<?php
include '../class/connection.php';
$con = connect();
check_musical_login();
if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $result = mysqli_query($con, "DELETE from course where course_id ='{$did}'") or die(mysqli_error($con));
    if ($result) {
        header("location:view-course.php");
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
                                            <i class="fa fa-table"></i> Course List
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

                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Instrument</th>
                                                        <th>Academy</th>

                                                        <th>course cost</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php
$result = mysqli_query($con, "Select * from course inner join instrument on instrument.instrument_id = course.instrument_id inner join musical_academy on musical_academy.musical_academy_id = course.academy_id where course.academy_id= '{$_SESSION["musical_academy_id"]}'") or die(mysqli_error($con));
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
                                                        <td>{$row["course_id"]}</td>
                                                        <td>{$row["course_name"]}</td>
                                                        <td>{$row["instrument_name"]}</td>
                                                        <td>{$row["musical_academy_name"]}</td>
                                                        <td>Rs.{$row["course_cost"]}</td>
                                                        <td> <a href='edit-course.php?eid={$row["course_id"]}'> Edit </a> |<a href='?did={$row["course_id"]}'> Delete </a></td>
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

