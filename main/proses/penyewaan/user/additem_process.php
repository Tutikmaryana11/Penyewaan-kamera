<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

$sewa_id_user = addslashes(strip_tags ($_POST['sewa_id_user']));
$sewa_id = addslashes(strip_tags ($_POST['sewa_id']));
$no_invoice =  addslashes(strip_tags ($_POST['no_invoice']));
$sewa_customer =  addslashes(strip_tags ($_POST['sewa_customer']));
$sewa_alamat =  addslashes(strip_tags ($_POST['sewa_alamat']));
$sewa_status = 1;
// $ab_id = addslashes(strip_tags ($_POST['ab_id']));

$qry = "INSERT INTO sewa (sewa_id,sewa_id_user, sewa_status,sewa_invoice, sewa_customer, sewa_alamat) VALUES ('$sewa_id','$sewa_id_user','$sewa_status','$no_invoice','$sewa_customer','$sewa_alamat')";
// echo $qry;
// exit();

$qry2 = mysql_query($qry);


if ($qry2) {
	$detail = $_POST['sewa_'];

	foreach ($detail as $value) {

		$data = mysql_fetch_array(mysql_query("SELECT * FROM alat_berat where ab_jumlah_ketersediaan > 0 and ab_id = '$value[ab_id]' "));
		if ($data['ab_jumlah_ketersediaan']  == null) {
			$hasil = 0;
		} else {
			$hasil = $data['ab_jumlah_ketersediaan']-$value['detail_qty'];
		}

		// detail penyewaan
		$detail_alat = addslashes(strip_tags ($value['detail_alat']));
		$ab_id = addslashes(strip_tags ($value['ab_id']));
		$detail_jml_jam = addslashes(strip_tags ($value['detail_jml_jam']));
		$detail_qty = addslashes(strip_tags ($value['detail_qty']));
		$detail_tgl_kirim = addslashes(strip_tags ($value['detail_tgl_kirim']));
		$detail_harga = addslashes(strip_tags ($value['detail_harga']));
		$detail_total = addslashes(strip_tags ($value['TotalCurrenctyToNumber']));

		$qry2 = "INSERT into detail_sewa (id_sewa,id_ab,jumlah_jam,qty,tanggal_kirim,harga,total) values ('$sewa_id','$ab_id','$detail_jml_jam','$detail_qty','$detail_tgl_kirim','$detail_harga','$detail_total')";
		$insert_detail = mysql_query($qry2);

		// echo $insert_detail;
		// exit();

		if ($insert_detail) {
			$kurangiStok = mysql_query("UPDATE alat_berat set ab_jumlah_ketersediaan = $hasil where ab_id = '$ab_id' ");
			echo "<script>document.location.href='index.php?view=penyewaan_user&status=success&detail=true';</script>";
		}
		else {
			echo "<script>document.location.href='index.php?view=penyewaan_user&status=failInsert';</script>";
		}
	}
echo "<script>document.location.href='index.php?view=penyewaan_user&status=success';</script>";
}
else {
	echo "<script>document.location.href='index.php?view=penyewaan_user&status=failInsert';</script>";
}

?>