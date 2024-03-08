<?php
session_start();

$restrictedLevels = ['', 2, 3, 4, 5, 6];

if (in_array($_SESSION['user_level'], $restrictedLevels)) {
    echo "<script>alert('Tidak memiliki otoritas');window.location='../../index.php';</script>";
}

if (isset($_POST['register'])) {
    include "../../config.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = $_POST['level'];

    $sql = "INSERT INTO users (username,email,password,level) VALUES ('$username','$email','$password','$level')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Berhasil membuat akun');window.location='dashboard.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_close($conn);
    }
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
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link active" aria-current="page">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="guru.php" class="nav-link">Data Guru</a>
                    </li>
                    <li class="nav-item">
                        <a href="siswa.php" class="nav-link">Data Siswa</a>
                    </li>
                </ul>
                <button class="btn btn-sm btn-success me-1" data-bs-toggle="modal" data-bs-target="#createAcc">Buatkan
                    Akun</button>
                <a href="../../logout.php" class="btn btn-sm btn-danger" role="button"
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

    <div class="modal fade" id="createAcc" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Buat Akun</h3>
                    <button class="btn-close" role="button" data-bs-dismiss="modal"
                        data-bs-target="#createAcc"></button>
                </div>
                <form action="dashboard.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="col">
                                <label for="level" class="form-label">Pilih Privilege</label>
                                <select name="level" id="level" class="form-select">
                                    <option selected disabled>...</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Guru</option>
                                    <option value="3">Siswa</option>
                                    <option value="4">Staff Admin</option>
                                    <option value="5">Admin Sekolah</option>
                                    <option value="6">Orang Tua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100" name="register">Buat Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>