<?php
include '../class/connection.php';
$con = connect();

if ($_POST) {
    $txtAcademyName = $_POST["txtAcademyName"];
    $txtAcademyLogo = "images/musical-logo/" . time() . ".png";
    $txtAcademyMobileno = $_POST["txtAcademyMobileno"];
    $txtAcademyEmail = $_POST["txtAcademyEmail"];
    $txtAcademyPassword = $_POST["txtAcademyPassword"];

    $result = mysqli_query($con, "INSERT INTO `musical_academy`( `musical_academy_name`, `musical_academy_logo`, `musical_academy_mobileno`, `musical_academy_email`, `musical_academy_password`) VALUES ('{$txtAcademyName}','{$txtAcademyLogo }','{$txtAcademyMobileno}','{$txtAcademyEmail}','{$txtAcademyPassword}')") or die(mysqli_error($con));
    if ($result) {
        move_uploaded_file($_FILES["txtAcademyLogo"]["tmp_name"], "../" . $txtAcademyLogo);
        echo "<script>alert('Registration Successfull')</script>";
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
                                    <img src="my-theme/img/logow.png" alt="josh logo" class="admire_logo"><span class="text-white"> Musical Academy&nbsp;<br/>
                                        Sign Up</span>
                                </h3>
                            </div>
                            <div class="bg-white login_content login_border_radius">
                                <form  id="login_validator" method="post" class="login_validator" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label"> Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon input_email"><i
                                                    class="fa fa-user text-primary"></i></span>
                                            <input type="text" class="form-control  form-control-md" id="email" name="txtAcademyName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-control-label"> Mobile Number</label>
                                        <div class="input-group">
                                            <span class="input-group-addon input_email"><i
                                                    class="fa fa-mobile text-primary"></i></span>
                                            <input type="tel" class="form-control  form-control-md" id="email" name="txtAcademyMobileno" placeholder="Mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-control-label"> E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon input_email"><i
                                                    class="fa fa-envelope text-primary"></i></span>
                                            <input type="email" class="form-control  form-control-md" id="email" name="txtAcademyEmail" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <!--</h3>-->
                                    <div class="form-group">
                                        <label for="password" class="form-control-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-addon addon_password"><i
                                                    class="fa fa-lock text-primary"></i></span>
                                            <input type="password" class="form-control form-control-md" id="password" name="txtAcademyPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Logo</label>
                                        <div class="input-group">
                                            <span class="input-group-addon input_email"><i
                                                    class="fa fa-paperclip text-primary"></i></span>
                                            <input type="file" class="form-control  form-control-md" id="email" name="txtAcademyLogo" placeholder="Logo">
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
                                            <a href="musical-academy-login.php" class="custom-control-description forgottxt_clr">Sign In</a>
                                        </div>
                                        <div class="col-xs-6 text-xs-right forgot_pwd">
                                      
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