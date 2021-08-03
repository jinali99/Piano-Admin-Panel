<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["user_name"]) && isset($_POST["user_email"]) && isset($_POST["user_password"])) {
    $txtUserName = $_POST["user_name"];
    $txtUserEmail = $_POST["user_email"];
    $txtusergender = $_POST["user_password"];


    $result = mysqli_query($con, "INSERT INTO `user`( `user_name`, `user_email`, `user_password`) VALUES ('{$txtUserName}','{$txtUserEmail}','{$txtusergender}')") or die(mysqli_error($con));
    if ($result) {
        $response["success"] = "1";
        $response["message"] = "Registration Successfull";
    } else {
        $response["success"] = "0";
        $response["message"] = "Query Error";
    }
} else {
    $response["success"] = "0";
    $response["message"] = "Message Field Missing";
}
echo json_encode($response);




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

