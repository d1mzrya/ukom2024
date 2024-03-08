<?php
session_start();
include "../config.php";

$restrictedLevels = ['', 3, 4, 6];

if (in_array($_SESSION['user_level'], $restrictedLevels)) {
    echo "<script>alert('Tidak memiliki otoritas');window.location='../../index.php';</script>";
}

?>

<head>
    <title>Laporan Data Guru</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>

<body onload="print()">
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
            <?php endwhile; ?>
        </tbody>
    </table>
</body>