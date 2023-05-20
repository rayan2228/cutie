<?php
session_start();
require_once("../db_connect.php");

$service_name = htmlspecialchars(trim($_POST["service_name"]));
$service_description = htmlspecialchars(trim($_POST["service_description"]));
$service_icon = htmlspecialchars(trim($_POST["service_icon"]));
$service_status = htmlspecialchars(trim($_POST["service_status"]));


if ($service_name && $service_description && $service_icon && $service_status) {
    $insert_service_query = "INSERT INTO `services`(`service_name`, `service_description`, `service_icon`, `status`) VALUES ('$service_name','$service_description','$service_icon','$service_status')";
    $insert_service = mysqli_query($db_connect, $insert_service_query);
    $_SESSION["success"] = "service added successfully";
    header("location:./add.php");
}else{
    $_SESSION["error"] = "all fields are required";
    header("location:./add.php");
}

