<?php

require_once("../db_connect.php");
session_start();

$portfolio_image = $_FILES["portfolio_image"]["name"];
$tmp_name = $_FILES["portfolio_image"]["tmp_name"];
$portfolio_category = htmlspecialchars(trim($_POST["portfolio_category"]));
$portfolio_status = htmlspecialchars(trim($_POST["portfolio_status"]));


if ($portfolio_image && $portfolio_category) {
    $portfolio_image_arr = explode(".", $portfolio_image);
    $file_extension  = end($portfolio_image_arr);

    $new_name = date("Y_m_d") . "_" . $_SESSION["user_id"] . "_" . time() . "." . $file_extension;
    $file_path = "../../uploads/portfolio/"
        . $new_name;
    move_uploaded_file($tmp_name, $file_path);

    $insert_portfolio_query = "INSERT INTO `portfolioes`(`portfolio_image`, `portfolio_category`, `portfolio_status`) VALUES ('$new_name','$portfolio_category','$portfolio_status')";
    $insert_portfolio = mysqli_query($db_connect, $insert_portfolio_query);
    $_SESSION["success"] = "portfolio added successfully";
    header("location:./add.php");
}
