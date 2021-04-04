<?php include_once "header.php"; ?>
<link rel="stylesheet" href="./styles/register.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <h5 class="text-center">Login</h5>
                        <form action="" method="POST" autocomplete="off" class="mt-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukin Email">
                            </div>
                            <div class="mb-3 position-relative password">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Pilih Password">
                                <div class="position-absolute d-flex pw-btn-container" onclick="showPw('password', '.password .pw-btn')">
                                    <i class="fas fa-eye-slash pw-btn"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                Belum punya akun? Tenang aja! <a href="register.php" class="link-secondary">Buat Sini</a>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-dark">Login</button>
                                <button type="button" class="btn btn-dark disabled d-none">
                                    <i class="fas fa-spinner"></i>
                                    Oke Bentar...
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="./js/show-pw.js"></script>
    <script src="./js/login.js"></script>
</body>
</html>