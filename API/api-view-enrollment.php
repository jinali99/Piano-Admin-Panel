<?php

include '../class/connection.php';
$con = connect();

$result = mysqli_query($con, "Select * from enrollment inner join course on course.course_id = enrollment.course_id inner join instrument on instrument.instrument_id= course.instrument_id where user_id = '{$_POST["user_id"]}'") or die(mysqli_error($con));
$response["enrollment"] = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($response["enrollment"], $row);
    }
    $response["success"] = "1";
} else {
    $response["success"] = "0";
    $response["message"] = "No Record Found";
}
echo json_encode($response);


