<?php
include '../class/connection.php';
$con = connect();

if (isset($_POST["video_title"]) && isset($_POST[" video_description "]) && isset($_POST[" course_id "]) && isset($_POST[" video_url "]) )
    {
    $txtVideoTitle = $_POST["video_title"];
    $txtVideoDescription = $_POST[" video_description "];
    $txtCourseId= $_POST["course_id"];
    $txtVideoUrl= $_POST["video_url"];
  

    $result = mysqli_query($con, "INSERT INTO `video`( `video_title`, ` video_description `, ` course_id `,`video_url`) VALUES ('{$txtVideoTitle}','{$txtVideoDescription}','{$txtCourseId}','{$txtVideoUrl}'") or die(mysqli_error($con));
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


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

