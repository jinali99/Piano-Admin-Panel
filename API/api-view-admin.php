<?php

include '../class/connection.php';
$con = connect();
   
$result= mysqli_query($con,"Select * from admin") or die(mysqli_error($con));
$response["admin"] = array();
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        array_push($response["admin"],$row);
    }
    $response["success"] = "1";
}
    else {
        $response["success"] = "0";
        $response["message"] = "No Record Found";
    }
    echo json_encode($response);


