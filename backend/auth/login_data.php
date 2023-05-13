<?php
require_once("../db_connect.php");
session_start();
$email = htmlspecialchars(trim($_POST["email"]));
$password = htmlspecialchars(trim($_POST["password"]));


$flag = false;

if ($email && $password) {
    $enc_password = sha1($password);
    $checking_query = "SELECT id,name,email,role, COUNT(*) AS result FROM users WHERE email='$email' AND password='$enc_password'";
    $checking_query_to_db = mysqli_query($db_connect, $checking_query);
    $result_to_array = mysqli_fetch_assoc($checking_query_to_db);
    if ($result_to_array["result"]) {
        $_SESSION["user_id"] = $result_to_array["id"];
        $_SESSION["user_name"] = $result_to_array["name"];
        $_SESSION["user_email"] = $result_to_array["email"];
        $_SESSION["user_role"] = $result_to_array["role"];
        header("location:../dashboard/dashboard.php");
    } else {
        $flag = true;
        $_SESSION["error"] = "email or password is incorrect";
    }
} else {
    $flag = true;
    $_SESSION["error"] = "all fields are required ";
}

if ($flag) {
    header("location:login.php");
}
