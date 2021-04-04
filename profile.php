<?php

session_start();
include_once "php/config.php";

if (!isset($_SESSION["unique_id"])) {
    header("location: login.php");
}

$current_user = $_GET["id"];
$sql = "SELECT * FROM users WHERE unique_id = '$current_user'";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $date = date_create($row["register_at"]);
}

?>

<?php include_once "header.php"; ?>
<link rel="stylesheet" href="./styles/profile.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <!-- Header -->
                        <header class="mb-5">
                            <!-- Back -->
                            <div class="back-link">
                                <a href="users.php" class="btn">
                                    <i class="fas fa-arrow-left" title="Kembali"></i>
                                </a>
                            </div>
                            <!-- User Details -->
                            <div class="user-details">
                                <div class="profile-pict" style="background: <?= $row["profile_color"] ?>;"><?= $row["alias_name"] ?></div>
                                <div class="user-info">
                                    <p><?= $row["fname"]. ' ' .$row["lname"] ?></p>
                                    <p>Bergabung pada <?= date_format($date, "d M Y") ?></p>
                                </div>
                            </div>
                        </header>
                        <!-- Profile -->
                        <div class="my-3">
                            <p>Maaf apabila aplikasi ini masih banyak kekurangannya. <br>
                            Fiturnya masih dikit <br>
                            UI nya masih berantakan <br>
                            Belum bisa upload poto <em>Profile</em> <br>
                            dan kodingnya pun masih banyak yang <em>Repetitif</em> <br>
                            Maklum saya masih pemula😢</p>
                            <p>Sekiranya ada yang mau nambahin boleh ngasih <em>Pull Request</em> ke github project ini <br>
                            Jangan lupa kasih bintang ya... <br>
                            <a href="https://github.com/ramyabyyu/online-chat-app" target="_blank" class="link-dark">Source Code</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>