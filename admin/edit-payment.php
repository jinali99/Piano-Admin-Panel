<?php

include '../class/connection.php';
$con = connect();
if(!isset($_GET["eid"]) || empty($_GET["eid"]))
{
    header("location:view-payment.php");
}

$eid=$_GET["eid"];
$result = mysqli_query($con,"select * from payment where payment_id='{$eid}'") or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

if($_POST){
    $txtDate = $_POST["txtDate"];
    $txtAmount = $_POST["txtAmount"];
    $txtPaymentMode = $_POST["txtPaymentMode"];
    $txtPaymentStatus = $_POST["txtPaymentStatus"];
    $txtEnrollmentId = $_POST["txtEnrollmentId"];
    
    
    $result = mysqli_query($con, "UPDATE `payment` SET `payment_date`='{$txtDate}',`payment_amount`='{$txtAmount}',`payment_mode`='{$txtPaymentMode}',`payment_status`='{$txtPaymentStatus}',`enrollment_id`='{$txtEnrollmentId}' WHERE `payment_id`='{$eid}'") or die(mysqli_error($con));
    if($result){
        header("location:view-payment.php");
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
                                           Add Payment 
                                        </div>
                                        <div class="card-block m-t-35">
                                            <form action="" class="form-horizontal  login_validator" id="form_block_validator" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Date *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input  value="<?php echo $row["payment_date"]?>" type="date" id="required2" name="txtDate" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label"> Amount *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input value="<?php echo $row["payment_amount"]?>"  type="text" id="required2" name="txtAmount" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Payment Mode *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input value="<?php echo $row["payment_mode"]?>"  type="text" id="required2" name="txtPaymentMode" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Payment status *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input value="<?php echo $row["payment_status"]?>"  type="text" id="required2" name="txtPaymentStatus" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Enrollment id *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input value="<?php echo $row["enrollment_id"]?>"  type="text" id="required2" name="txtEnrollmentId" class="form-control" required>
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

