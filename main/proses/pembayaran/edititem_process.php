<?php
$id = $_GET['bayar_id'];
$bayar_sewa_id = addslashes(strip_tags ($_POST['bayar_sewa_id']));
$bayar_jumlah_harga = addslashes(strip_tags ($_POST['bayar_jumlah_harga']));
$bayar_tanggal = addslashes(strip_tags ($_POST['bayar_tanggal']));
$bayar_keterangan = addslashes(strip_tags ($_POST['bayar_keterangan']));


	$sql = "UPDATE bayar set bayar_sewa_id = '$bayar_sewa_id',bayar_jumlah_harga = '$bayar_jumlah_harga',bayar_tanggal ='$bayar_tanggal',bayar_sewa_id = '$bayar_sewa_id' ,bayar_keterangan = '$bayar_keterangan' where bayar_id = '$id'";
	$qry = mysql_query($sql);
	// echo $sql;
	// exit();

	if ($qry) {
		echo "<script>document.location.href='index.php?view=pembayaran&status=success';</script>";
	}
	else {
		echo "<script>document.location.href='index.php?view=pembayaran&status=failInsert';</script>";
	}
	?>