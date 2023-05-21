<?php

require_once("../db_connect.php");
session_start();

$portfolio_image = $_FILES["portfolio_image"]["name"];
$tmp_name = $_FILES["portfolio_image"]["tmp_name"];
// $portfolio_category = htmlspecialchars(trim($_POST["portfolio_category"]));
// $portfolio_status = htmlspecialchars(trim($_POST["portfolio_status"]));

$portfolio_image_arr = explode(".", $portfolio_image);
$file_extension  = end($portfolio_image_arr);

$new_name = date("Y_m_d") . "_" . $_SESSION["user_id"] . "_" . time() . "." . $file_extension;
$file_path = "../../uploads/portfolio/"
. $new_name;

print_r($file_path);
move_uploaded_file($tmp_name,$file_path);
