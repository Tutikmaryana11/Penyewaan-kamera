<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

$sewa_id_user = addslashes(strip_tags ($_POST['sewa_id_user']));
$sewa_id = addslashes(strip_tags ($_POST['sewa_id']));
$sewa_customer =  addslashes(strip_tags ($_POST['sewa_customer']));
$sewa_alamat =  addslashes(strip_tags ($_POST['sewa_alamat']));
$sewa_status = 1;
// $cm_id = addslashes(strip_tags ($_POST['cm_id']));

$qry = "UPDATE sewa SET sewa_customer='$sewa_customer',sewa_alamat='$sewa_alamat' WHERE sewa_id = '$sewa_id' ";
// echo $qry;
// exit();

$qry2 = mysql_query($qry);
// $delete = mysql_query("DELETE FROM detail_sewa where id_sewa = '$sewa_id' ");




if ($qry2) {
	$detail = $_POST['sewa_'];

	foreach ($detail as $value) {

		$data = mysql_fetch_array(mysql_query("SELECT * FROM camera where cm_jumlah_ketersediaan > 0 and cm_id = '$value[cm_id]' "));
		if ($data['cm_jumlah_ketersediaan']  == null) {
			$hasil = 0;
		} else {
			$hasil = $data['cm_jumlah_ketersediaan']-$value['detail_qty'];
		}

		// detail penyewaan
		$detail_alat = addslashes(strip_tags ($value['detail_alat']));
		$cm_id = addslashes(strip_tags ($value['cm_id']));
		$detail_jml_jam = addslashes(strip_tags ($value['detail_jml_jam']));
		$detail_qty = addslashes(strip_tags ($value['detail_qty']));
		$detail_tgl_kirim = addslashes(strip_tags ($value['detail_tgl_kirim']));
		$detail_harga = addslashes(strip_tags ($value['detail_harga']));
		$detail_total = addslashes(strip_tags ($value['TotalCurrenctyToNumber']));



		// if ($delete) {
			# code...
			$qry2 = "INSERT into detail_sewa (id_sewa,id_ab,jumlah_jam,qty,tanggal_kirim,harga,total) values ('$sewa_id','$cm_id','$detail_jml_jam','$detail_qty','$detail_tgl_kirim','$detail_harga','$detail_total')";
			$insert_detail = mysql_query($qry2);
			// exit();

			if ($insert_detail) {
				$kurangiStok = mysql_query("UPDATE camera set cm_jumlah_ketersediaan = $hasil where cm_id = '$cm_id' ");
				echo "<script>document.location.href='index.php?view=penyewaan&status=success&detail=true';</script>";
			}
			else {
				echo "<script>document.location.href='index.php?view=penyewaan&status=failInsert';</script>";
			}
		// }


	}
	echo "<script>document.location.href='index.php?view=penyewaan&status=success';</script>";
}
else {
	echo "<script>document.location.href='index.php?view=penyewaan&status=failInsert';</script>";
}

?>