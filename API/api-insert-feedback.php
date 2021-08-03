<?php


include '../class/connection.php';
$con = connect();

if (isset($_POST["feedback_date"]) && isset($_POST["feedback_description"]) && isset($_POST[" feedback_rating "]) && isset($_POST["user_id"]) && isset($_POST["academy_id"]))
    {
    $txtFeedbackDate = $_POST["feedback_date"];
    $txtFeedbackDescription = $_POST["feedback_description"];
    $txtFeedbackRating= $_POST["feedback_rating"];
    $txtUserId = $_POST["user_id"];
    $txtAcademyId = $_POST["academy_id"];

    $result = mysqli_query($con, "INSERT INTO `feedback`( `feedback_date`, `feedback_description`, ` feedback_rating `, `user_id`,`academy_id`) VALUES ('{$txtFeedbackDate}','{$txtFeedbackDescription}','{$txtFeedbackRating}','{$txtUserId}' , '{$txtAcademyId}')") or die(mysqli_error($con));
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

