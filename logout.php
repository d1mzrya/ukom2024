<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Berhasil keluar dari akun anda');window.location='index.php';</script>";