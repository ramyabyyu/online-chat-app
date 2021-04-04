<?php

session_start();
include_once "config.php";
$outgoing_id = $_SESSION["unique_id"];

$keyword = $_GET["keyword"];
$query = "SELECT * FROM users WHERE NOT unique_id = '$outgoing_id' AND (fname LIKE '%$keyword%' OR lname LIKE '%$keyword%')";
$contact_list = mysqli_query($conn, $query);
$output = "";

if (mysqli_num_rows($contact_list) > 0) {
    while ($row = mysqli_fetch_assoc($contact_list)) {
        $incoming_id = $row["unique_id"];
        $sql = "SELECT * FROM messages WHERE 
                (incoming_msg_id = '$incoming_id' OR outgoing_msg_id = '$incoming_id')
                AND (outgoing_msg_id = '$outgoing_id' OR incoming_msg_id = '$outgoing_id')
                ORDER BY msg_id DESC LIMIT 1";
        $query_msg = mysqli_query($conn, $sql);
        $row_msg = mysqli_fetch_assoc($query_msg);
        if (mysqli_num_rows($query_msg) > 0) {
            if ($row_msg["outgoing_msg_id"] == $outgoing_id) {
                $result = 'Anda : ' . $row_msg["msg"];
            } else {
                $result = $row_msg["msg"];
            }
        } else {
            $result = "Belum ada chat";
        }
    
        // triming message
        (strlen($result) > 20) ? $msg = substr($result, 0, 20).'...' : $msg = $result;
    
        $fullname = $row["fname"] . ' ' . $row["lname"];
        $status = $row["status"] == "Aktif" ? "#4bb543" : "#d3d3d3";
        $output .= '<a class="px-2 p-4 contact-list mb-3" href="chat.php?id='. $row["unique_id"] .'">
                        <!-- Profile -->
                        <div class="profile-pict contact-profile" style="background: '. $row["profile_color"] .';">'. $row["alias_name"] .'</div>
                        <!-- Contact Details -->
                        <div class="details contact-details">
                            <p>'. $fullname .'</p>
                            <p>'. $msg .'</p>
                        </div>
                        <!-- Status ; active = #4bb543 ; inactive = #d3d3d3 -->
                        <div class="contact-status" style="color: '. $status .';">
                            <i class="fas fa-circle"></i>
                        </div>
                    </a>';
    }
} else {
    $output .= "Gak Ketemu";
}

echo $output;