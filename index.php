<?php
session_start();

if (isset($_SESSION['user_id'])) {
    switch ($_SESSION['user_level']) {
        case 1:
            header("Location: layout/admin/dashboard.php");
            break;
        case 2:
            header("Location: layout/guru/dashboard.php");
            break;
        case 3:
            header("Location: layout/siswa/dashboard.php");
            break;
        case 4:
            header("Location: layout/staff_admin/dashboard.php");
            break;
        case 5:
            header("Location: layout/admin_sekolah/dashboard.php");
            break;
        case 6:
            header("Location: layout/orang_tua/dashboard.php");
            break;
    }
}

if (isset($_POST['login'])) {
    include "config.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id_user"];
            $_SESSION["user_level"] = $row["level"];
            $_SESSION["username"] = $username;

            switch ($row['level']) {
                case 1:
                    echo "<script>alert('Berhasil masuk sebagai super admin');window.location='layout/admin/dashboard.php';</script>";
                    break;
                case 2:
                    echo "<script>alert('Berhasil masuk sebagai guru');window.location='layout/guru/dashboard.php';</script>";
                    break;
                case 3:
                    echo "<script>alert('Berhasil masuk sebagai siswa');window.location='layout/siswa/dashboard.php';</script>";
                    break;
                case 4:
                    echo "<script>alert('Berhasil masuk sebagai staff admin');window.location='layout/staff_admin/dashboard.php';</script>";
                    break;
                case 5:
                    echo "<script>alert('Berhasil masuk sebagai admin sekolah');window.location='layout/admin_sekolah/dashboard.php';</script>";
                    break;
                case 6:
                    echo "<script>alert('Berhasil masuk sebagai orang tua');window.location='layout/orang_tua/dashboard.php';</script>";
                    break;
            }
        } else {
            echo "<script>alert('Password salah');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan');window.location='index.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>

<body style="background-color: var(--bs-secondary);">
    <div class="container-fluid d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="card" style="width: 25rem;">
            <div class="card-body py-5 px-4">
                <form action="index.php" method="post">
                    <h3 class="card-title text-center mb-2">
                        Masuk
                    </h3>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="login">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>