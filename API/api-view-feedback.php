<?php

include '../class/connection.php';
$con = connect();
   
$result= mysqli_query($con,"Select * from feedback") or die(mysqli_error($con));
$response["feedback"] = array();
if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        array_push($response["feedback"],$row);
    }
    $response["success"] = "1";
}
    else {
        $response["success"] = "0";
        $response["message"] = "No Record Found";
    }
    echo json_encode($response);




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

