<?php

session_start();
include_once "php/config.php";
$unique_id = $_SESSION["unique_id"];
if (!isset($unique_id)) {
    header("location: login.php");
}

$user_query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '$unique_id'");
if (mysqli_num_rows($user_query) > 0) {
    $row = mysqli_fetch_assoc($user_query);
}

?>

<?php include_once "header.php"; ?>
<link rel="stylesheet" href="./styles/users.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <!-- User Header -->
                        <header>
                            <!-- Profile -->
                            <div class="profile-pict user-profile" style="background: <?= $row["profile_color"]; ?>;"><?= $row["alias_name"]; ?></div>
                            <!-- User Details -->
                            <div class="details user-details">
                                <p><?= $row["fname"]. ' ' .$row["lname"]; ?></p>
                                <p><?= $row["status"]; ?></p>
                            </div>
                            <!-- Dropdown Menu -->
                            <div class="menu">
                                <button class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="profile.php?id=<?= $row["unique_id"]; ?>">Profile &nbsp; <i class="fas fa-user"></i></a></li>
                                    <li><a class="dropdown-item" href="php/logout.php?id=<?= $row["unique_id"]; ?>">Logout &nbsp; <i class="fas fa-sign-out-alt"></i></a></li>
                                </ul>
                            </div>
                        </header>
                        <!-- Search Bar -->
                        <div class="d-flex">
                            <input type="search" class="my-3 form-control" placeholder="Cari...">
                            <button class="btn"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <a class="px-2 p-4 contact-list mb-3" href="#">
                            <!-- Profile -->
                            <div class="profile-pict contact-profile" style="background: darkorange;">SY</div>
                            <!-- Contact Details -->
                            <div class="details contact-details">
                                <p>Siapa Ya</p>
                                <p>Hallo Apa Kabar</p>
                            </div>
                            <!-- Status ; active = #4bb543 ; inactive = #d3d3d3 -->
                            <div class="contact-status" style="color: #4bb543;">
                                <i class="fas fa-circle"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>