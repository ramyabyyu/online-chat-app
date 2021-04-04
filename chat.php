<?php

session_start();
include_once "php/config.php";

if (!isset($_SESSION["unique_id"])) {
    header("location: login.php");
}

?>


<?php include_once "header.php"; ?>
<link rel="stylesheet" href="./styles/chat.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded shadow">
                    <div class="card-body chat-room">
                        <!-- Header -->
                        <header>
                            <?php 
                                include_once "php/config.php";
                                $user_id = $_GET["id"];
                                $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '$user_id'");
                                if (mysqli_num_rows($query)) {
                                    $row = mysqli_fetch_assoc($query);
                                }
                            ?>
                            <!-- Back Link -->
                            <div class="back-link">
                                <a href="users.php" class="btn">
                                    <i class="fas fa-arrow-left" title="Kembali"></i>
                                </a>
                            </div>
                            <!-- Profile -->
                            <div class="contact-profile" style="background: <?= $row["profile_color"] ?>;"><?= $row["alias_name"] ?></div>
                            <!-- Details -->
                            <div class="contact-details">
                                <p><?= $row["fname"]. ' '.$row["lname"] ?></p>
                                <p><?= $row["status"] ?></p>
                            </div>
                            <!-- Dropdown -->
                            <div class="menu">
                                <button class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="profile.php?id=<?= $row["unique_id"] ?>">Lihat Profile &nbsp; <i class="fas fa-user"></i></a></li>
                                </ul>
                            </div>
                        </header>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Main Chat Room -->
                <div class="card rounded shadow">
                    <div class="card-body">
                        <main id="chat-box-container">
                            
                            
                        </main>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Message -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <form action="" class="typing-area d-flex" id="typing-area">
                            <input type="text" name="outgoing_id" value="<?= $_SESSION["unique_id"]; ?>" hidden>
                            <input type="text" name="incoming_id" value="<?= $user_id; ?>" hidden>
                            <input type="text" placeholder="Tulis Pesan..." class="form-control" autocomplete="off" name="message-text">
                            <button type="submit" class="btn btn-dark">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="./js/chat.js"></script>
</body>
</html>