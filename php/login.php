<?php

session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

if (!empty($email) && !empty($password)) {
    // verify email
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($query) > 0) {
        // verify password
        $row = mysqli_fetch_assoc($query);
        $verify_pass = password_verify($password, $row["password"]);
        if ($password == $verify_pass) {
            $status = "Aktif";
            $unique_id = $row["unique_id"];
            $set_status = mysqli_query($conn, "UPDATE users SET status = '$status' WHERE unique_id = '$unique_id'");
            if ($set_status) {
                $_SESSION["unique_id"] = $unique_id;
                echo "success";
                return;
            } else {
                echo "ups terjadi kesalahan nih.. coba lagi nanti ya";
                return;
            }
        } else {
            echo "Password nya salah hahaha";
            return;
        }
    } else {
        echo "Email nya salah hahaha";
        return;
    }
} else {
    echo "Kolomnya diisi semua dong";
    return;
}