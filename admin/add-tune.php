 <?php

include '../class/connection.php';
$con = connect();

check_admin_login();

if($_POST){
    $txtTuneName = $_POST["txtTuneName"];
    $txtTuneUrl = $_POST["txtTuneUrl"];
    $txtInstrumentId= $_POST["txtInstrumentId"];
    
    $result = mysqli_query($con, "INSERT INTO `tune`( `tune_name`, `tune_url`, `instrument_id`) VALUES ('{$txtTuneName}','{$txtTuneUrl}','{$txtInstrumentId}')") or die(mysqli_error($con));
    if($result){
        echo "<script>alert('Data Inserted')</script>";
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
                                            Add New Tune
                                        </div>
                                        <div class="card-block m-t-35">
                                            <form action="" class="form-horizontal  login_validator" id="form_block_validator" method="POST">
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Name *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" id="required2" name="txtTuneName" class="form-control" required>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label"> Tune-Url *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" id="required2" name="txtTuneUrl" class="form-control" required>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-lg-4  text-lg-right">
                                                        <label for="required2" class="form-control-label">Instrument id *</label>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select name="txtInstrumentId" class="form-control">
                                                            <option>--Select Instrument Id--</option>
                                                            <?php
                                                            
                                                            $courseresult = mysqli_query($con, "Select * from instrument")or die(mysqli_error($con));
                                                            while($courserow = mysqli_fetch_assoc($courseresult)){
                                                                echo "<option value='{$courserow["instrument_id"]}'>{$courserow["instrument_name"]}</option>";
                                                            }
                                                            
                                                            ?>
                                                        </select>
                                                        
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

