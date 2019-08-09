<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
	//ambil konfigurasi database untuk melakukan koneksi ke database
	require_once 'database/connection.php';
    //ambil seluruh halaman yang telah dipisah
    require_once 'template/page.php';
}

else {
    echo "<script>document.location.href='../login.php?view=loginError';</script>";
}


?>