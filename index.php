<?php
session_start();
//cek session dulu, kalau ada session username dan password maka redirect page ke halaman utama
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

	echo "<script>document.location.href='main/index.php?view=home';</script>";

}
//jika session tidak ditemukan maka kembali ke halaman login
else {
	echo "<script>document.location.href='landing/index.php?view=start';</script>";

}


?>