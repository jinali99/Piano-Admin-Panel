<?php
include '../class/connection.php';
$con = connect();

if ($_POST) {
    $txtAdminEmail = $_POST["txtAdminEmail"];
    $txtAdminPassword = $_POST["txtAdminPassword"];

    $result = mysqli_query($con, "select * from musical_academy where musical_academy_email='{$txtAdminEmail}' and musical_academy_password='{$txtAdminPassword}'")or die(mysqli_error($con));
    if (mysqli_num_rows($result) == 1) {
        session_start();
        $row = mysqli_fetch_assoc($result);
        $_SESSION["musical_academy_id"] = $row["musical_academy_id"];
        $_SESSION["musical_academy_name"] = $row["musical_academy_name"];
        $_SESSION["musical_academy_logo"] = $row["musical_academy_logo"];
        header("location:index.php");
    } else {
        echo "<script>alert('Invalid login details')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './my-theme/header-script.php'; ?>;
    </head>
    <body>
        <div class="preloader" style=" position: fixed;
             width: 100%;
             height: 100%;
             top: 0;
             left: 0;
             z-index: 100000;
             backface-visibility: hidden;
             background: #ffffff;">
            <div class="preloader_img" style="width: 200px;
                 height: 200px;
                 position: absolute;
                 left: 48%;
                 top: 48%;
                 background-position: center;
                 z-index: 999999">
                <img src="my-theme/img/loader.gif" style=" width: 40px;" alt="loading...">
            </div>
        </div>
        <div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
            <div class="row">
                <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_top_bottom">
                    <div class="row">
                        <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-12">
                            <div class="login_logo login_border_radius1">
                                <h3 class="text-xs-center">
                                    <img src="my-theme/img/logow.png" alt="josh logo" class="admire_logo"><span class="text-white"> Musical Academy Login &nbsp;<br/>
                                        Log In</span>
                                </h3>
                            </div>
                            <div class="bg-white login_content login_border_radius">
                                <form  id="login_validator" method="post" class="login_validator">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label"> E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon input_email"><i
                                                    class="fa fa-envelope text-primary"></i></span>
                                            <input type="text" class="form-control  form-control-md" id="email" name="txtAdminEmail" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <!--</h3>-->
                                    <div class="form-group">
                                        <label for="password" class="form-control-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-addon addon_password"><i
                                                    class="fa fa-lock text-primary"></i></span>
                                            <input type="password" class="form-control form-control-md" id="password"   name="txtAdminPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="submit" value="Log In" class="btn btn-primary btn-block login_button">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <a href="add-musical-academy.php" class="custom-control-description forgottxt_clr">Register Now</a>
                                        </div>
                                        <div class="col-xs-6 text-xs-right forgot_pwd">
                                            <a href="forget_pwd.php" class="custom-control-description forgottxt_clr">Forgot password?</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- global js -->
        <?php include './my-theme/scripts.php'; ?>
    </body>
</html>