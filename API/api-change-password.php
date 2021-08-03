<?php
include '../class/connection.php';
$con = connect();

if (isset($_POST["cuurent_password"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"]) && isset($_POST["user_id"])) {
    $oldpassword = $_POST["cuurent_password"];
    $newpassword = $_POST["new_password"];
    $confirmpassword = $_POST["confirm_password"];
    $user_id = $_POST['user_id'];

    $select = mysqli_query($con, "select * from user where `user_id`='{$user_id}'")or die(mysqli_error($con));
    $result = mysqli_fetch_assoc($select);
    if ($result["user_password"] == $oldpassword) {
        if ($newpassword == $confirmpassword) {
            $update = mysqli_query($con, "UPDATE user SET `user_password`='{$confirmpassword}' where `user_id`='{$user_id}'")or die(mysqli_error($con));
            if ($update) {

                $response["success"] = "1";
                $response["message"] = "Password Changed Sucessfully ";
            } else {
                $response["success"] = "0";
                $response["message"] = "Query Error ";
            }
        } else {
            $response["success"] = "0";
            $response["message"] = "New And Confirm Passsword Donot Match ";
        }
    } else {
        $response["success"] = "0";
        $response["message"] = "Old Password Donot Match ";
    }
}else{
        $response["success"] = "0";
        $response["message"] = "Field Missing";
}
echo json_encode($response);
?>





/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

