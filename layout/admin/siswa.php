<?php
session_start();
include "../../config.php";

$restrictedLevels = ['', 2, 3, 4, 5, 6];

if (in_array($_SESSION['user_level'], $restrictedLevels)) {
    echo "<script>alert('Tidak memiliki otoritas');window.location='../../index.php';</script>";
}

$foreign1 = "SELECT DISTINCT kelas FROM kelas";
$optionKelas = mysqli_query($conn, $foreign1);

$foreign2 = "SELECT DISTINCT agama FROM agama";
$optionAgama = mysqli_query($conn, $foreign2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
                        <a href="guru.php" class="nav-link">Data Guru</a>
                    </li>
                    <li class="nav-item">
                        <a href="siswa.php" class="nav-link active" aria-current="page">Data Siswa</a>
                    </li>
                </ul>
                <a href="../../logout.php" class="btn btn-sm btn-danger" role="button"
                    onclick="return confirm('Apakah anda yakin ingin keluar dari akun anda?')">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>Data Siswa</h3>
            </div>
            <div class="col text-end">
                <a href="../../export/data_siswa_generate.php" target="_blank" class="btn btn-sm btn-secondary"
                    role="button">Cetak
                    Laporan</a>
                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addForm">Tambah
                    Data</button>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = "SELECT * FROM siswa";
                            $result = mysqli_query($conn, $sql);
                            if ($result->num_rows > 0):
                                while ($row = mysqli_fetch_assoc($result)):
                                    ?>
                                    <tr>
                                        <th>
                                            <?= $no++ ?>
                                        </th>
                                        <td>
                                            <?= $row['nis'] ?>
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
                                            <?= $row['kelas'] ?>
                                        </td>
                                        <td>
                                            <?= $row['agama'] ?>
                                        </td>
                                        <td>
                                            <?= $row['alamat'] ?>
                                        </td>
                                        <td><button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#editForm<?= $no ?>">Ubah</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirm<?= $no ?>">Hapus</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="editForm<?= $no ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3>Ubah Data</h3>
                                                    <button class="btn-close" role="button" data-bs-dismiss="modal"
                                                        data-bs-target="#editForm"></button>
                                                </div>
                                                <form action="../../controller/siswa_controller.php" method="post">
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="text" name="nama" id="nama"
                                                                        class="form-control" placeholder="Nama"
                                                                        value="<?= $row['nama'] ?>" required>
                                                                    <label for="nama">Nama</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="number" name="nis" id="nis"
                                                                        class="form-control" placeholder="NIS"
                                                                        value="<?= $row['nis'] ?>" required>
                                                                    <label for="nis">NIS</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="text" name="tempat_lahir" id="tempat-lahir"
                                                                        class="form-control" placeholder="TempatLahir"
                                                                        value="<?= $row['tempat_lahir'] ?>" required>
                                                                    <label for="tempat-lahir">Tempat Lahir</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <input type="date" name="tgl_lahir" id="tgl-lahir"
                                                                        class="form-control" placeholder="TanggalLahir"
                                                                        value="<?= date('Y-m-d', strtotime($row['tgl_lahir'])) ?>"
                                                                        required>
                                                                    <label for="tgl-lahir">Tanggal Lahir</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <select name="jenis_kelamin" id="jenis-kelamin"
                                                                        class="form-select">
                                                                        <option value="L" <?= ($row['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                                                                        <option value="P" <?= ($row['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                                                    </select>
                                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <select name="kelas" id="kelas" class="form-select">
                                                                        <?php foreach ($optionKelas as $key => $value): ?>
                                                                            <option value="<?= $value['kelas'] ?>"
                                                                                <?= ($value['kelas'] == $row['kelas']) ? 'selected' : '' ?>>
                                                                                <?= $value['kelas'] ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <label for="kelas">Kelas</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <select name="agama" id="agama" class="form-select">
                                                                        <?php foreach ($optionAgama as $key => $value): ?>
                                                                            <option value="<?= $value['agama'] ?>"
                                                                                <?= ($value['agama'] == $row['agama']) ? 'selected' : '' ?>>
                                                                                <?= $value['agama'] ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <label for="agama">Agama</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-floating">
                                                                    <textarea name="alamat" id="alamat"
                                                                        class="form-control"><?= $row['alamat'] ?></textarea>
                                                                    <label for="alamat">Alamat</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="<?= $row['id_siswa'] ?>">
                                                        <button type="submit" class="btn btn-primary w-100" name="edit">Ubah
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="deleteConfirm<?= $no ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3>Hapus Data</h3>
                                                    <button class="btn-close" role="button" data-bs-dismiss="modal"
                                                        data-bs-target="#deleteConfirm"></button>
                                                </div>
                                                <form action="../../controller/siswa_controller.php" method="post">
                                                    <div class="modal-body text-center">
                                                        <p class="fs-3">Apakah anda yakin ingin menghapus data ini?<br>
                                                        <h3 class="text-danger"><?= $row['nama'] ?> -
                                                            <?= $row['nis'] ?>
                                                        </h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="<?= $row['id_siswa'] ?>">
                                                        <button type="submit" class="btn btn-primary w-100" name="delete">Hapus
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                            else: ?>
                                <td colspan="10" class="text-center">Data tidak tersedia...</td>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addForm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Tambah Data</h3>
                    <button class="btn-close" role="button" data-bs-dismiss="modal" data-bs-target="#addForm"></button>
                </div>
                <form action="../../controller/siswa_controller.php" method="post">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama"
                                        required>
                                    <label for="nama">Nama</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="number" name="nis" id="nis" class="form-control" placeholder="NIS"
                                        required>
                                    <label for="nis">NIS</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" name="tempat_lahir" id="tempat-lahir" class="form-control"
                                        placeholder="TempatLahir" required>
                                    <label for="tempat-lahir">Tempat Lahir</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="date" name="tgl_lahir" id="tgl-lahir" class="form-control"
                                        placeholder="TanggalLahir" required>
                                    <label for="tgl-lahir">Tanggal Lahir</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-floating">
                                    <select name="jenis_kelamin" id="jenis-kelamin" class="form-select">
                                        <option selected disabled>...</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <select name="kelas" id="kelas" class="form-select">
                                        <option selected disabled>...</option>
                                        <?php foreach ($optionKelas as $key => $subject): ?>
                                            <option value="<?= $subject['kelas'] ?>">
                                                <?= $subject['kelas'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="kelas">Kelas</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating">
                                    <select name="agama" id="agama" class="form-select">
                                        <option selected disabled>...</option>
                                        <?php foreach ($optionAgama as $key => $subject): ?>
                                            <option value="<?= $subject['agama'] ?>">
                                                <?= $subject['agama'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="agama">Agama</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100" name="add">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>