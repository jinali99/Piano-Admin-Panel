<?php
include '../class/connection.php';
$con = connect();

if (isset($_POST["user_id"]) && isset($_POST["course_id"]) && isset($_POST["enrollment_amount"])) {
    $txtUserId = $_POST["user_id"];
    $txtCourseId = $_POST["course_id"];
    $txtEnrollmentDate = date('Y-m-d');
    $txtEnrollmentAmount = $_POST["enrollment_amount"];

    $eresult = mysqli_query($con, "Select * from enrollment where user_id = '{$txtUserId}' and course_id = '{$txtCourseId}'")or die(mysqli_error($con));

    if (mysqli_num_rows($eresult) > 0) {
               $response["success"] = "1";
            $response["message"] = "You have already enrolled this course";
    } else {

        $result = mysqli_query($con, "INSERT INTO `enrollment`( `user_id`, `course_id`, `enrollment_date`, `enrollment_amount`) VALUES ('{$txtUserId}','{$txtCourseId}','{$txtEnrollmentDate}','{$txtEnrollmentAmount}')") or die(mysqli_error($con));
        if ($result) {
            $response["success"] = "1";
            $response["message"] = "You are successfully enrolled to the course";
        } else {
            $response ["success"] = "0";
            $response["message"] = "Query Error";
        }
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

