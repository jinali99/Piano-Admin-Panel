<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["course_name"]) && isset($_POST["instrument_id"]) && isset($_POST["academy_id"]) && isset($_POST["course_cost"])) {
    $txtCourseName = $_POST["course_name"];
    $txtInstrumentId = $_POST["instrument_id"];
    $txtAcademyId = $_POST["academy_id"];
    $txtCourseCost = $_POST["course_cost"];

    $result = mysqli_query($con, "INSERT INTO `course`( `course_name`, `instrument_id`, `academy_id`, `course_cost`) VALUES ('{$txtCourseName}','{$txtInstrumentId}','{$txtAcademyId}','{$txtCourseCost}')") or die(mysqli_error($con));
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