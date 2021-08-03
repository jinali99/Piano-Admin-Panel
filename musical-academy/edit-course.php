<?php

include '../class/connection.php';
$con = connect();
check_musical_login();
if(!isset($_GET["eid"]) || empty($_GET["eid"]))
{
    header("location:view-course.php");
}

$eid=$_GET["eid"];
$result = mysqli_query($con,"select * from course where course_id='{$eid}'") or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

if($_POST){
    $txtCourseName = $_POST["txtCourseName"];
    $txtCourseCost = $_POST["txtCourseCost"];
    $txtInstrumentId = $_POST["txtInstrumentId"];
    $txtAcademyId = $_SESSION["musical_academy_id"];
    
    $result = mysqli_query($con, "UPDATE `course` SET `course_name`='{$txtCourseName}',`instrument_id`='{$txtInstrumentId}',`academy_id`='{$txtAcademyId}',`course_cost`='{$txtCourseCost}' WHERE `course_id`='{$eid}'") or die(mysqli_error($con));
    if($result){
        header("location:view-course.php");
    }
}

?>

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
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <i class="fa fa-file-text-o"></i>
                                            Add New Course
                                        </div>
                                        <div class="card-block m-t-35">
                                            <form action="" class="form-horizontal  login_validator" id="form_block_validator" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Name *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input value="<?php echo $row["course_name"]?>" type="text" id="required2" name="txtCourseName" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">course cost *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input value="<?php echo $row["course_cost"]?>" type="text" id="required2" name="txtCourseCost" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Instrument id *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select name="txtInstrumentId" class="form-control">
                                                            <option>--Select User--</option>
                                                            <?php
                                                            
                                                            $courseresult = mysqli_query($con, "Select * from instrument")or die(mysqli_error($con));
                                                            while($courserow = mysqli_fetch_assoc($courseresult)){
                                                                echo "<option value='{$courserow["instrument_id"]}'>{$courserow["instrument_name"]}</option>";
                                                            }
                                                            
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Academy id *</label>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-actions form-group row">
                                                    <div class="col-lg-4 push-lg-4">
                                                        <input  type="submit" value="Submit" class="btn btn-primary">
                                                    </div>
                                                </div>
                                            </form>
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