<?php
include '../class/connection.php';
$con = connect();

if (isset($_POST["payment_date"]) && isset($_POST["payment_amount"]) && isset($_POST[" payment_mode "]) && isset($_POST["payment_status"]) && isset($_POST["enrollment_id"]))
    {
    $txtDate = $_POST["payment_date"];
    $txtAmount = $_POST["payment_amount"];
    $txtPaymentMode= $_POST["payment_mode"];
    $txtPaymentStatus = $_POST["payment_status"];
    $txtEnrollmentId = $_POST["enrollment_id"];

    $result = mysqli_query($con, "INSERT INTO `feedback`( `payment_date`, `payment_amount`, ` payment_mode `, `payment_status`,`enrollment_id`) VALUES ('{$txtDate}','{$txtAmount}','{$txtPaymentMode}','{$txtEnrollmentId}' , '{$txtAcademyId}')") or die(mysqli_error($con));
    if ($result) {
        $response ["success"] = "1";
        $response = "Course Added Successfully";
    } else {
        $response ["success"] = "0";
        $response["message"] = "Query Error";
    }
} else {
    $response ["success"] = "0";

    $response["message"] = "Message Field Missing";
}
echo json_encode($response);





?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

