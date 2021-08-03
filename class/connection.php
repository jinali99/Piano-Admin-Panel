<?php

function connect(){
    $con = mysqli_connect("localhost", "root", "", "musical");
    return $con;
}

function check_admin_login(){
    session_start();
    if(!isset($_SESSION["admin_id"])){
        header("location:admin-login.php");
    }
}

function check_musical_login(){
    session_start();
    if(!isset($_SESSION["musical_academy_id"])){
        header("location:musical-academy-login.php");
    }
}