<?php 
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

	$bayar_sewa_id = addslashes(strip_tags ($_POST['bayar_sewa_id']));

	$detail = $_POST['sewa_'];

	foreach ($detail as $value) {
		$data = mysql_fetch_array(mysql_query("SELECT * FROM camera where cm_id = '$value[detail_id_ab]' "));
		if ($data['cm_jumlah_ketersediaan']) {
			$hasil = $data['cm_jumlah_ketersediaan']+$value['detail_qty'];
		}

		$tambahStok = mysql_query("UPDATE camera set cm_jumlah_ketersediaan = $hasil where cm_id = '$value[detail_id_ab]' ");
		$update_status_peminjaman = mysql_query("UPDATE detail_sewa set status_peminjaman=1 where id_sewa = '$bayar_sewa_id' and id_ab = '$value[detail_id_ab]' ");
	}
	// exit();
	echo "<script>document.location.href='index.php?view=pengembalian&status=success';</script>";

?>