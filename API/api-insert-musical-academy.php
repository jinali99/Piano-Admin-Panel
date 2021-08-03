<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["musical_academy_name"]) && isset($_POST["musical_academy_logo"]) && isset($_POST[" musical_academy_mobileno "]) && isset($_POST["musical_academy_email"]) && isset($_POST[" musical_academy_password "]))
    {
    $txtAcademyName = $_POST["musical_academy_name"];
    $txtAcademyLogo = $_POST["musical_academy_logo"];
    $txtAcademyMobileno= $_POST["musical_academy_mobileno"];
    $txtAcademyEmail = $_POST["musical_academy_email"];
    $txtAcademyPassword = $_POST[" musical_academy_password "];

    $result = mysqli_query($con, "INSERT INTO `feedback`( `musical_academy_name`, `musical_academy_logo`, ` musical_academy_mobileno `, `musical_academy_email`,` musical_academy_password `) VALUES ('{$txtAcademyName}','{$txtAcademyLogo}','{$txtAcademyMobileno}','{$txtAcademyEmail}' , '{$txtAcademyPassword}')") or die(mysqli_error($con));
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

