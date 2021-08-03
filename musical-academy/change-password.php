<?php
include '../class/connection.php';
$con = connect();
check_musical_login();
if ($_POST) {
    $oldpassword = $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];
    $confirmpassword = $_POST["confirmpassword"];
    $admin_id = $_SESSION['musical_academy_id'];

    $select = mysqli_query($con, "select * from musical_academy where `musical_academy_id`='{$admin_id}'")or die(mysqli_error($con));
    $result = mysqli_fetch_assoc($select);
    if ($result["musical_academy_password"] == $oldpassword) {
        if ($newpassword == $confirmpassword) {
            $update = mysqli_query($con, "UPDATE musical_academy SET `musical_academy_password`='{$confirmpassword}' where `musical_academy_id`='{$admin_id}'")or die(mysqli_error($con));
            if ($update) {
                echo "<script>alert('Password changed');</script>";
            } else {
                echo "<script>alert('new password and  confirm Password is not match')</script>";
            }
        } else {
            echo "<script>alert('new password and  confirm Password is not match')</script>";
            
        }
    }else{
        echo "<script>alert('Old password not match')</script>";
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
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <i class="fa fa-file-text-o"></i>
                                            Add New Admin
                                        </div>
                                        <div class="card-block m-t-35">
                                            <form action="" class="form-horizontal  login_validator" id="form_block_validator" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Old Password *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="password" id="required2" name="oldpassword" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">New Password *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="password" id="required2" name="newpassword" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Confirm New Password *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="password" id="required2" name="confirmpassword" class="form-control" required>
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