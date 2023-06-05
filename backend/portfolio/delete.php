<?php
require_once("../db_connect.php");
$id = $_GET["id"];
$portfolio_list = "SELECT portfolio_image FROM portfolioes";
$portfolio_list_query = mysqli_query($db_connect, $portfolio_list);
$portfolio_image_name = mysqli_fetch_assoc($portfolio_list_query)["portfolio_image"];
unlink("../../uploads/portfolio/" . $portfolio_image_name);
$delete_query = "DELETE FROM portfolioes WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header("location:./portfolio_lists.php");
