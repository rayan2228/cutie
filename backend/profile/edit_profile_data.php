<?php
session_start();
require_once("../../db_connect.php");
$user_id = $_SESSION["user_id"];
$flag = false;

// basic info update
if (isset($_POST["basic_information"])) {
    $name = htmlspecialchars(trim($_POST["name"]));
    $bio = htmlspecialchars(trim($_POST["bio"]));
    if ($name) {
        if (strlen($bio) <= 200) {
            $user_data_update_query = " UPDATE `users` SET name='$name',bio='$bio' WHERE id= $user_id";
            $query_to_database = mysqli_query($db_connect, $user_data_update_query);
            $flag = true;
        } else {
            $_SESSION["error"] = "bio 200 upore";
            $flag = true;
        }
    } else {
        $_SESSION["error"] = "name field is required";
        $flag = true;
    }
}



// password update
if (isset($_POST["change_password"])) {
    $old_password = htmlspecialchars(trim($_POST["old_password"]));
    $new_password = htmlspecialchars(trim($_POST["new_password"]));
    $confirm_password = htmlspecialchars(trim($_POST["confirm_password"]));
    if ($old_password) {
        $enc_password = sha1($old_password);
        $checking_old_password_query = "SELECT  COUNT(*) AS result FROM users WHERE id='$user_id' AND password='$enc_password'";
        $checking_old_password_query_to_db = mysqli_query($db_connect, $checking_old_password_query);
        $result_to_array = mysqli_fetch_assoc($checking_old_password_query_to_db)["result"];
        if ($result_to_array) {
            if ($new_password) {
                if (preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $new_password)) {
                    if ($new_password === $old_password) {
                        echo "error 5";
                    } else {
                        if ($confirm_password) {
                            if ($confirm_password === $new_password) {
                                $enc_password = sha1($confirm_password);
                                $password_update_query = " UPDATE `users` SET password='$enc_password' WHERE id= $user_id";
                                $password_update_query_to_database = mysqli_query($db_connect, $password_update_query);
                                $flag = true;
                            } else {
                                echo "error 7";
                            }
                        } else {
                            echo "error 6";
                        }
                    }
                } else {
                    echo "error 4";
                }
            } else {
                echo "error 3";
            }
        } else {
            echo "error 2";
        }
    } else {
        echo "error 1";
    }
}












if ($flag) {
    header("location:./edit_profile.php");
}
