<?php include_once "header.php"; ?>
<link rel="stylesheet" href="./styles/register.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rounded shadow">
                    <div class="card-body">
                        <h5 class="text-center">Buat Akun</h5>
                        <div class="alert alert-danger rounded error-msg" style="display: none;"></div>
                        <form action="" method="POST" autocomplete="off" class="mt-4">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="fname" class="form-label">Nama Depan</label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Nama Depan" required>
                                </div>
                                <div class="col">
                                    <label for="lname" class="form-label">Nama Belakang</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Nama Belakang" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Jgn pake email asli ya..</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Pilih Email" required>
                            </div>
                            <div class="mb-3 position-relative password">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Pilih Password" required>
                                <div class="position-absolute d-flex pw-btn-container" onclick="showPw('password', '.password .pw-btn')">
                                    <i class="fas fa-eye-slash pw-btn"></i>
                                </div>
                            </div>
                            <div class="mb-3 position-relative c_password">
                                <label for="c_password" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Masukin lagi Passwordnya" required>
                                <div class="position-absolute d-flex pw-btn-container" onclick="showPw('c_password', '.c_password .pw-btn')">
                                    <i class="fas fa-eye-slash pw-btn"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                Udah punya akun? ya <a href="login.php" class="link-secondary">Login</a> lah
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-dark">Bikin</button>
                                <button type="button" class="btn btn-dark disabled d-none">
                                    <i class="fas fa-spinner"></i> &nbsp;
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
    <script src="./js/register.js"></script>
</body>
</html>