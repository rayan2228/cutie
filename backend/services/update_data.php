<?php
session_start();
require_once("../db_connect.php");

$id = $_POST["id"];
$service_name = htmlspecialchars(trim($_POST["service_name"]));
$service_description = htmlspecialchars(trim($_POST["service_description"]));
$service_icon = htmlspecialchars(trim($_POST["service_icon"]));
$service_status = htmlspecialchars(trim($_POST["service_status"]));


if ($service_name && $service_description && $service_icon && $service_status) {
    $update_service_query = "UPDATE services SET service_name='$service_name' , service_description = '$service_description', service_icon='$service_icon', status= '$service_status' WHERE id=$id";
    $update_service = mysqli_query($db_connect, $update_service_query);
    $_SESSION["success"] = "service updated successfully";
    header("location:./service_lists.php");
} else {
    $_SESSION["error"] = "all fields are required";
    header("location:./update.php?id={$id}");
}
