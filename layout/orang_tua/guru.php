<?php
session_start();
include "../../config.php";

$restrictedLevels = ['', 1, 2, 3, 4, 5];

if (in_array($_SESSION['user_level'], $restrictedLevels)) {
    echo "<script>alert('Tidak memiliki otoritas');window.location='../../index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link rel="stylesheet" href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">Sistem Informasi RPL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navItem"
                aria-controls="navItem" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navItem">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="guru.php" class="nav-link active" aria-current="page">Data Guru</a>
                    </li>
                    <li class="nav-item">
                        <a href="siswa.php" class="nav-link">Data Siswa</a>
                    </li>
                </ul>
                <a href="../../logout.php" class="btn btn-sm btn-danger" role="button"
                    onclick="return confirm('Apakah anda yakin ingin keluar dari akun anda?')">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3 class="mt-5">Data Guru</h3>
        <hr>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = "SELECT * FROM guru";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0):
                            while ($row = mysqli_fetch_assoc($result)):
                                ?>
                                <tr>
                                    <th>
                                        <?= $no++ ?>
                                    </th>
                                    <td>
                                        <?= $row['nip'] ?>
                                    </td>
                                    <td>
                                        <?= $row['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $row['tempat_lahir'] ?>
                                    </td>
                                    <td>
                                        <?= $row['tgl_lahir'] ?>
                                    </td>
                                    <td>
                                        <?= $row['jenis_kelamin'] ?>
                                    </td>
                                    <td>
                                        <?= $row['agama'] ?>
                                    </td>
                                    <td>
                                        <?= $row['alamat'] ?>
                                    </td>
                                </tr>
                            <?php endwhile;
                        else: ?>
                            <td colspan="8" class="text-center">Data tidak tersedia...</td>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>