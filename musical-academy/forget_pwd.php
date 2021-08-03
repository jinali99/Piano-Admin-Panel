<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../class/connection.php';
$con = connect();

if ($_POST) {
    $txtAdminEmail = $_POST["txtAdminEmail"];
    $result = mysqli_query($con, "select * from musical_academy where musical_academy_email='{$txtAdminEmail}'") or die(mysqli_error($con));
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Load Composer's autoloader
        require '../vendor/autoload.php';
// Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'project.rexontechnologies@gmail.com';                     // SMTP username
            $mail->Password = 'rexon@1654';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('project.rexontechnologies@gmail.com', 'MusicalAcademy');
            $mail->addAddress($txtAdminEmail, $row["musical_academy_name"]);     // Add a recipient
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Recovery password';
            $mail->Body = 'password : ' . $row["musical_academy_password"];
            $mail->AltBody = 'password:' . $row["musical_academy_password"];
            $mail->send();
            echo "<script>alert('Message has been sent')</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo '<script>alert("email not registered with  us.")</script>';
    }
}
?>


<!DOCTYPE html>
<html>

    <!-- Mirrored from dev.lorvent.com/admire/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Feb 2017 02:08:45 GMT -->
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
                                    <img src="my-theme/img/logow.png" alt="josh logo" class="admire_logo"><span class="text-white"> ADMIRE &nbsp;<br/>
                                        Recover Password</span>
                                </h3>
                            </div>
                            <div class="bg-white login_content login_border_radius">
                                <form  id="login_validator" method="post" class="login_validator">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label"> E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon input_email"><i
                                                    class="fa fa-envelope text-primary"></i></span>
                                                    <input type="email" class="form-control  form-control-md" required="" id="email" name="txtAdminEmail" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <!--</h3>-->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="submit" value="Recover Password" class="btn btn-primary btn-block login_button">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-6 text-xs-right forgot_pwd">
                                            <a href="musical-academy-login.php" class="custom-control-description forgottxt_clr">Click to Login</a>
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


    <!-- Mirrored from dev.lorvent.com/admire/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Feb 2017 02:08:45 GMT -->
</html>