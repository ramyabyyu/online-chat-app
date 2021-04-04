<?php

session_start();
if (isset($_SESSION["unique_id"])) {
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST["outgoing_id"]);
    $incoming_id = mysqli_real_escape_string($conn, $_POST["incoming_id"]);
    $output = "";
    
    $sql = "SELECT * FROM messages WHERE (incoming_msg_id = '$incoming_id' AND outgoing_msg_id = '$outgoing_id')
            OR (incoming_msg_id = '$outgoing_id' AND outgoing_msg_id = '$incoming_id') ORDER BY msg_id";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row["outgoing_msg_id"] === $outgoing_id) { // this is a sender
                $output .= '<div class="chat outgoing">
                                <p>'. $row["msg"] .'</p>
                            </div>';
            } else {// this is a receiver
                $output .= '<div class="chat incoming">
                                <p>'. $row["msg"] .'</p>
                            </div>';
            }
        }

        echo $output;
    }
} else {
    header("location: ../login.php");
}