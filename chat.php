<?php include_once "header.php"; ?>
<link rel="stylesheet" href="./styles/chat.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded shadow">
                    <div class="card-body chat-room">
                        <!-- Header -->
                        <header>
                            <!-- Profile -->
                            <div class="contact-profile" style="background: darkorange;">SY</div>
                            <!-- Details -->
                            <div class="contact-details">
                                <p>Siapa Ya</p>
                                <p>Aktif</p>
                            </div>
                            <!-- Dropdown -->
                            <div class="menu">
                                <button class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="profile.php">Lihat Profile &nbsp; <i class="fas fa-user"></i></a></li>
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
                        <main>
                            <div class="chat outgoing">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem ipsam magni corporis facilis autem odit modi molestiae iure veniam ut.</p>
                            </div>
                            <div class="chat incoming">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque, nulla!</p>
                            </div>
                            <div class="chat incoming">
                                <p>AOkqwokaowkoawkowak ngomong naon🤣</p>
                            </div>
                            <div class="chat outgoing">
                                <p>Anjay aowokwokaowk</p>
                            </div>
                            <div class="chat incoming">
                                <p>Kumaha euy🤣</p>
                            </div>
                            <div class="chat outgoing">
                                <p>Kumaha Kumaha</p>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Message -->
        <div class="row justify-content-center">
            <div class="col-md 8">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <form action="" class="typing-area d-flex">
                            <input type="text" placeholder="Tulis Pesan..." class="form-control" autocomplete="off">
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
</body>
</html>