<?php
require_once("../../db_connect.php");
function adminSeeding($db_connect)
{
    $password = sha1("123456");
    $insert_admin_query = "INSERT INTO users (`name`, `email`, `password`, `phone_number`, `profile_pic`, `role`) VALUES ('rayan','rayan@gmail.com','$password',null,null,'admin')";
    mysqli_query($db_connect, $insert_admin_query);
}
$checking_query = "SELECT COUNT(*) AS result FROM users WHERE email='rayan@gmail.com'";
$checking_query_to_db = mysqli_query($db_connect, $checking_query);
$result_to_array = mysqli_fetch_assoc($checking_query_to_db)["result"]; 
if (!$result_to_array) {
    adminSeeding($db_connect);
}


