<?php
include '../class/connection.php';
$con = connect();
check_musical_login();
if(!isset($_GET["eid"]) || empty($_GET["eid"]))
{
    header("location:view-enrollment.php");
}

$eid=$_GET["eid"];
$result = mysqli_query($con,"select * from enrollment where enrollment_id='{$eid}'") or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);


if ($_POST) {
    $txtUserId = $_POST["txtUserId"];
    $txtCourseId = $_POST["txtCourseId"];
    $txtEnrollmentDate = $_POST["txtEnrollmentDate"];
    $txtEnrollmentAmount = $_POST["txtEnrollmentAmount"];


    $result = mysqli_query($con, "UPDATE `enrollment` SET `user_id`='{$txtUserId}',`course_id`='{$txtCourseId}',`enrollment_date`='{$txtEnrollmentDate}',`enrollment_amount`='{$txtEnrollmentAmount}' WHERE `enrollment_id`='{$eid}'") or die(mysqli_error($con));
    if ($result) {
        header("location:view-enrollment.php");
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
                                            Add  Enrollment
                                        </div>
                                        <div class="card-block m-t-35">
                                            <form action="" class="form-horizontal  login_validator" id="form_block_validator" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">User id *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select name="txtUserId" class="form-control">
                                                            <option>--Select User--</option>
                                                            <?php
                                                            
                                                            $courseresult = mysqli_query($con, "Select * from user")or die(mysqli_error($con));
                                                            while($courserow = mysqli_fetch_assoc($courseresult)){
                                                                echo "<option value='{$courserow["user_id"]}'>{$courserow["user_name"]}</option>";
                                                            }
                                                            
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Course id *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input value="<?php echo $row["course_id"]?>" type="text" id="required2" name="txtCourseId" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Enrollment date *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input value="<?php echo $row["enrollment_date"]?>" type="date" id="required2" name="txtEnrollmentDate" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Enrollment Amount *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input value="<?php echo $row["enrollment_amount"]?>" type="text" id="required2" name="txtEnrollmentAmount" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-actions form-group row">
                                                    <div class="col-lg-4 push-lg-4">
                                                        <input type="submit" value="Submit" class="btn btn-primary">
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

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

