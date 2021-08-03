<?php

include '../class/connection.php';
$con = connect();
   
$result= mysqli_query($con,"Select * from video") or die(mysqli_error($con));
$response["video"] = array();
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        array_push($response["video"],$row);
    }
    $response["success"] = "1";
}
    else {
        $response["success"] = "0";
        $response["message"] = "No Record Found";
    }
    echo json_encode($response);


