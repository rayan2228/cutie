<?php
require_once("../db_connect.php");
$id = $_GET["id"];
$delete_query = "DELETE FROM services WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header("location:http://localhost/cutie/backend/services/service_lists.php");
?>