<?php
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();

$bayar_sewa_id = addslashes(strip_tags ($_POST['bayar_sewa_id']));
$bayar_jumlah_harga = addslashes(strip_tags ($_POST['bayar_jumlah_harga']));
$bayar_tanggal = addslashes(strip_tags ($_POST['bayar_tanggal']));
$bayar_keterangan = addslashes(strip_tags ($_POST['bayar_keterangan']));
$bayar_status = addslashes(strip_tags ($_POST['bayar_status']));

$foto_nama = ($_FILES['foto']['name']);
$foto = ($_FILES['foto']['tmp_name']);
$folder_f = "file/pembayaran";
$folder_f = $folder_f."/".basename($_FILES['foto']['name']);

$qry = "INSERT INTO bayar (bayar_sewa_id,bayar_jumlah_harga,bayar_tanggal,bayar_keterangan,bayar_status,bayar_bukti) VALUES ('$bayar_sewa_id','$bayar_jumlah_harga','$bayar_tanggal','$bayar_keterangan','$bayar_status','$foto_nama')";
// echo $qry;

// exit();
$qry2 = mysql_query($qry);

if (move_uploaded_file($foto, $folder_f)) {

	if ($qry2) {
// 	$detail = $_POST['sewa_'];

// 	foreach ($detail as $value) {
// 		$data = mysql_fetch_array(mysql_query("SELECT * FROM alat_berat where ab_id = '$value[detail_id_ab]' "));
// 		if ($data['ab_jumlah_ketersediaan']) {
// 			$hasil = $data['ab_jumlah_ketersediaan']+$value['detail_qty'];
// 		}

// 		$tambahStok = mysql_query("UPDATE alat_berat set ab_jumlah_ketersediaan = $hasil where ab_id = '$value[detail_id_ab]' ");
// 		$update_status_sewa = mysql_query("UPDATE sewa set sewa_status=2 where sewa_id = '$bayar_sewa_id'");
// 	}
// 	// exit();
// 	echo "<script>document.location.href='index.php?view=pembayaran&status=success';</script>";
// }
// else {
		echo "<script>document.location.href='index.php?view=pembayaran&status=success';</script>";
		
	} else {
		echo "<script>document.location.href='index.php?view=pembayaran&status=failInsert';</script>";

	}

echo "<script>document.location.href='index.php?view=pembayaran&status=success';</script>";
		
	} else {
		echo "<script>document.location.href='index.php?view=pembayaran&status=failInsert';</script>";

	}

?>