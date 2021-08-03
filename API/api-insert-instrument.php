<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["instrument_name"]) && isset($_POST["instrument_photo"]))
    {
    $txtInstrumentName = $_POST["instrument_name"];
    $txtInstrumentImage = $_POST["instrument_photo"];
   
    $result = mysqli_query($con, "INSERT INTO `instrument`( `instrument_name`, `instrument_photo`) VALUES ('{$txtInstrumentName}','{$txtInstrumentImage}')") or die(mysqli_error($con));
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

