<?php

session_start();
include_once "config.php";
$unique_id = $_SESSION["unique_id"];
if (!isset($unique_id)) {
    header("location: ../login.php");
}

$logout_id = mysqli_real_escape_string($conn, $_GET["id"]);
if (isset($logout_id)) {
    $status = "Gak Aktif";
    $set_status = mysqli_query($conn, "UPDATE users SET status = '$status' WHERE unique_id = '$unique_id'");
    if ($set_status) {
        session_unset();
        session_destroy();
        header("location: ../login.php");
    }
} else {
    header("location: ../users.php");
}