<?php

session_start();
include_once "config.php";
$unique_id = $_SESSION["unique_id"];

$keyword = $_GET["keyword"];
$query = "SELECT * FROM users WHERE NOT unique_id = '$unique_id' AND (fname LIKE '%$keyword%' OR lname LIKE '%$keyword%')";
$contact_list = mysqli_query($conn, $query);
$output = "";

if (mysqli_num_rows($contact_list) > 0) {
    while ($row = mysqli_fetch_assoc($contact_list)) {
        $fullname = $row["fname"] . ' ' . $row["lname"];
        $status = $row["status"] == "Aktif" ? "#4bb543" : "#d3d3d3";
        $output .= '<a class="px-2 p-4 contact-list mb-3" href="chat.php?id='. $row["unique_id"] .'">
                        <!-- Profile -->
                        <div class="profile-pict contact-profile" style="background: '. $row["profile_color"] .';">'. $row["alias_name"] .'</div>
                        <!-- Contact Details -->
                        <div class="details contact-details">
                            <p>'. $fullname .'</p>
                            <p>Hallo Apa Kabar</p>
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