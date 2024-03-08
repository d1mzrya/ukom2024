<?php
session_start();
include "../config.php";

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$kelas = $_POST['kelas'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];

if (isset($_POST["add"])) {
    $add = "INSERT INTO siswa (nis,nama,tempat_lahir,tgl_lahir,jenis_kelamin,kelas,agama,alamat) VALUES ('$nis','$nama','$tempat_lahir','$tgl_lahir','$jenis_kelamin','$kelas','$agama','$alamat')";
    $query = mysqli_query($conn, $add);

    if ($query) {
        echo "alert('Berhasil menambahkan data');</script>";
        switch ($_SESSION["user_level"]) {
            case 1:
                echo "<script>window.location='../layout/admin/siswa.php';</script>";
                break;
            case 2:
                echo "<script>window.location='../layout/guru/siswa.php';</script>";
                break;
        }
    } else {
        echo "<script>alert('Terjadi kesalahan');</script>";
    }
}

if (isset($_POST["edit"])) {
    $edit = "UPDATE siswa SET nis='$nis',nama='$nama',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',jenis_kelamin='$jenis_kelamin',kelas='$kelas',agama='$agama',alamat='$alamat' WHERE id_siswa='$_POST[id]'";
    $query = mysqli_query($conn, $edit);

    if ($query) {
        echo "alert('Berhasil menambahkan data');</script>";
        switch ($_SESSION["user_level"]) {
            case 1:
                echo "<script>window.location='../layout/admin/siswa.php';</script>";
                break;
            case 2:
                echo "<script>window.location='../layout/guru/siswa.php';</script>";
                break;
        }
    } else {
        echo "<script>alert('Terjadi kesalahan');</script>";
    }
}

if (isset($_POST["delete"])) {
    $delete = "DELETE FROM siswa WHERE id_siswa='$_POST[id]'";
    $query = mysqli_query($conn, $delete);

    if ($query) {
        echo "alert('Berhasil menambahkan data');</script>";
        switch ($_SESSION["user_level"]) {
            case 1:
                echo "<script>window.location='../layout/admin/siswa.php';</script>";
                break;
            case 2:
                echo "<script>window.location='../layout/guru/siswa.php';</script>";
                break;
        }
    } else {
        echo "<script>alert('Terjadi kesalahan');</script>";
    }
}