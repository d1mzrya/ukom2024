<?php
session_start();

include "../config.php";

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];

if (isset($_POST["add"])) {
    $add = "INSERT INTO guru (nip,nama,tempat_lahir,tgl_lahir,jenis_kelamin,agama,alamat) VALUES ('$nip','$nama','$tempat_lahir','$tgl_lahir','$jenis_kelamin','$agama','$alamat')";
    $query = mysqli_query($conn, $add);

    if ($query) {
        echo "alert('Berhasil menambahkan data');</script>";
        switch ($_SESSION["user_level"]) {
            case 1:
                echo "<script>window.location='../layout/admin/guru.php';</script>";
                break;
            case 5:
                echo "<script>window.location='../layout/admin_sekolah/guru.php';</script>";
                break;
        }
    } else {
        echo "<script>alert('Terjadi kesalahan');</script>";
    }
}

if (isset($_POST["edit"])) {
    $edit = "UPDATE guru SET nip='$nip',nama='$nama',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',jenis_kelamin='$jenis_kelamin',agama='$agama',alamat='$alamat' WHERE id_guru='$_POST[id]'";
    $query = mysqli_query($conn, $edit);

    if ($query) {
        echo "alert('Berhasil mengubah data');</script>";
        switch ($_SESSION["user_level"]) {
            case 1:
                echo "<script>window.location='../layout/admin/guru.php';</script>";
                break;
            case 5:
                echo "<script>window.location='../layout/admin_sekolah/guru.php';</script>";
                break;
        }
    } else {
        echo "<script>alert('Terjadi kesalahan');</script>";
    }
}

if (isset($_POST["delete"])) {
    $delete = "DELETE FROM guru WHERE id_guru='$_POST[id]'";
    $query = mysqli_query($conn, $delete);

    if ($query) {
        echo "alert('Berhasil menghapus data');</script>";
        switch ($_SESSION["user_level"]) {
            case 1:
                echo "<script>window.location='../layout/admin/guru.php';</script>";
                break;
            case 5:
                echo "<script>window.location='../layout/admin_sekolah/guru.php';</script>";
                break;
        }
    } else {
        echo "<script>alert('Terjadi kesalahan');</script>";
    }
}