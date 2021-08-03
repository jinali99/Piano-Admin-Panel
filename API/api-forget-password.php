<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../class/connection.php';
$con = connect();

if (isset($_POST["user_email"])) {
    $txtUserEmail = $_POST["user_email"];
    $result = mysqli_query($con, "select * from user where user_email='{$txtUserEmail}'") or die(mysqli_error($con));
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
            $mail->addAddress($txtUserEmail, $row["user_name"]);     // Add a recipient
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Recovery password';
            $mail->Body = 'password : ' . $row["user_password"];
            $mail->AltBody = 'password:' . $row["user_password"];
            ;

            $mail->send();
            $response["success"] = "1";
            $response["message"] = "Mail Sent ";
        } catch (Exception $e) {
            $response["success"] = "0";
            $response["message"] = "Message Could Not Sent . Mailer Error: [$mail->ErrorInfo] ";
        }
    } else {
        $response["success"] = "0";
        $response["message"] = "Email Not Registered With Us ";
    }
} else {
    $response["success"] = "0";
    $response["message"] = "Field Missing";
}
echo json_encode($response);
?>
