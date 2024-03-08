<?php
session_start();

$restrictedLevels = ['', 1, 2, 3, 5, 6];

if (in_array($_SESSION['user_level'], $restrictedLevels)) {
    echo "<script>alert('Tidak memiliki otoritas');window.location='../../index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-dark navbar-expand-lg bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">Sistem Informasi RPL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navItem"
                aria-controls="navItem" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navItem">
                <a href="../../logout.php" class="btn btn-sm btn-danger ms-auto mb-2 mb-lg-0" role="button"
                    onclick="return confirm('Apakah anda yakin ingin keluar dari akun anda?')">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="row align-items-center">
            <div class="col">
                <p class="fs-2">Selamat Datang,<br>
                <h2>
                    <?= $_SESSION['username'] ?>
                </h2>
                </p>
            </div>
            <div class="col">
                <img src="../../assets/agt-login-icon.png" width="700" alt="Hero" class="img-fluid">
            </div>
        </div>
    </div>

    <script src="../../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>