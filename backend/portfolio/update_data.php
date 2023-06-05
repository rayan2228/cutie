<?php

require_once("../db_connect.php");
session_start();

$portfolio_image = $_FILES["portfolio_image"]["name"];
$tmp_name = $_FILES["portfolio_image"]["tmp_name"];
$portfolio_category = htmlspecialchars(trim($_POST["portfolio_category"]));
$portfolio_status = htmlspecialchars(trim($_POST["portfolio_status"]));
$id = $_POST["id"];



if ($portfolio_image) {
    $portfolio_list = "SELECT portfolio_image FROM portfolioes";
    $portfolio_list_query = mysqli_query($db_connect, $portfolio_list);
    $portfolio_image_name = mysqli_fetch_assoc($portfolio_list_query)["portfolio_image"];
    unlink("../../uploads/portfolio/" . $portfolio_image_name);
    $portfolio_image_arr = explode(".", $portfolio_image);
    $file_extension  = end($portfolio_image_arr);

    $new_name = date("Y_m_d") . "_" . $_SESSION["user_id"] . "_" . time() . "." . $file_extension;
    $file_path = "../../uploads/portfolio/"
        . $new_name;
    move_uploaded_file($tmp_name, $file_path);

    $update_portfolio_query
    = "UPDATE `portfolioes` SET `portfolio_image`='$new_name',`portfolio_category`='$portfolio_category',`portfolio_status`='$portfolio_status' WHERE id=$id";
     mysqli_query($db_connect, $update_portfolio_query);
    $_SESSION["success"] = "portfolio updated successfully";
    header("location:./portfolio_lists.php");
} else {
    $update_portfolio_query = "UPDATE `portfolioes` SET `portfolio_category`='$portfolio_category',`portfolio_status`='$portfolio_status' WHERE id=$id";
    mysqli_query($db_connect, $update_portfolio_query);
    $_SESSION["success"] = "portfolio updated successfully";
    header("location:./portfolio_lists.php");
}
