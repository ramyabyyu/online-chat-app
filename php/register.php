<?php
session_start();
include_once "config.php";

$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$c_password = mysqli_real_escape_string($conn, $_POST["c_password"]);

// VALIDATE

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($c_password)) {
    // fname and lname char must be <= 10
    if (strlen($fname) > 10) {
        echo "Nama Depan tidak boleh lebih dari 10 huruf";
        return;
    }
    if (strlen($lname) > 10) {
        echo "Nama Belakang tidak boleh lebih dari 10 huruf";
        return;
    }

    // check email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // if email valid
        // if email not exist yet
        $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($check_email) > 0) {
            echo "Email udah ada yang pake. Coba email lain";
            return;
        }
    } else { // if not valid
        echo "Email nya harus gini = contoh@email.com";
        return;
    }

    // password and c_password must be same
    if ($password != $c_password) {
        echo "Password dan Konfirmasi Password harus sama";
        return;
    }

    // encrypt the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // set unique_id
    $unique_id = rand(time(), 100000000);

    // set alias_name
    $char_fname = substr($fname, 0, 1);
    $char_lname = substr($lname, 0, 1);
    $alias_name = $char_fname.$char_lname;

    // set profile color
    $colors = array(
        "darkgoldenrod",
        "darkturquoise",
        "darkmagenta",
        "darkslateblue",
        "darkolivegreen",
        "darkorange",
        "firebrick",
        "chartreuse",
        "deeppink",
        "greenyellow",
        "limegreen",
        "lime",
        "peru",
        "rebeccapurple",
        "olivedrab",
        "orangered",
        "mediumblue",
        "mediumspringgreen",
        "mediumslateblue",
        "mediumvioletred",
        "crimson",
        "chocolate",
        "cadetblue",
        "teal",
        "steelblue",
        "sandybrown",
        "slateblue",
        "silver",
        "magenta"
    );
    $key = array_rand($colors, 1);
    $profile_color = $colors[$key];

    // set status
    $status = "Aktif";

    // insert user data into database
    $insert_data = mysqli_query(
        $conn, 
        "INSERT INTO users (unique_id, fname, lname, alias_name, email, password, profile_color, status) 
        VALUES ($unique_id, '$fname', '$lname', '$alias_name', '$email', '$password', '$profile_color', '$status')"
    );
    // var_dump($unique_id); 
    // var_dump($fname); 
    // var_dump($lname); 
    // var_dump($alias_name); 
    // var_dump($email); 
    // var_dump($password); 
    // var_dump($profile_color); 
    // var_dump($status); 
    // var_dump($conn); 
    // die;
    if ($insert_data) {
        $select_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($select_email) > 0) {
            $result = mysqli_fetch_assoc($select_email);
            $_SESSION["unique_id"] = $result["unique_id"];
            echo "success";
            return;
        } else {
            echo "Email nya kok ilang??";
            return;
        }
    } else {
        echo "ups ada kesalahan kayaknya. Coba lagi nanti ya...";
        return;
    }
} else {
    echo "Semua kolom harus diisi";
    return;
}
