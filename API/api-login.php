<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["user_email"]) && isset($_POST["user_password"])) {
    $txtUserEmail = $_POST["user_email"];
    $txtUserPassword = $_POST["user_password"];

    $result = mysqli_query($con, "select * from user where user_email='{$txtUserEmail}' and user_password='{$txtUserPassword}'")or die(mysqli_error($con));
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $response["user"] = array();
        array_push($response["user"], $row);
        $response["success"] = "1";
        $response["message"] = "Login Success";
    } else {
        $response["success"] = "0";
        $response["message"] = "Invalid Login Details ";
    }
} else {
    $response["success"] = "0";
    $response["message"] = "Field Missing ";
}
echo json_encode($response);
?>