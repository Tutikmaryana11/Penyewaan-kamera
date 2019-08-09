<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

$ab_nama = addslashes(strip_tags ($_POST['ab_nama']));
$ab_harga = addslashes(strip_tags ($_POST['ab_harga']));
$ab_keterangan = addslashes(strip_tags ($_POST['ab_keterangan']));
$ab_status = addslashes(strip_tags ($_POST['ab_status']));
$ab_kategori_id = addslashes(strip_tags ($_POST['ab_kategori_id']));
$ab_jumlah = addslashes(strip_tags ($_POST['ab_jumlah']));
// $ab_foto = $_POST['foto'];

$foto_nama = ($_FILES['foto']['name']);
$foto = ($_FILES['foto']['tmp_name']);
$folder_f = "file";
$folder_f = $folder_f."/".basename($_FILES['foto']['name']);

	$qry = "INSERT INTO camera (cm_nama,cm_harga,cm_keterangan,cm_status,cm_kategori_id,cm_foto,cm_jumlah_ketersediaan) VALUES ('$ab_nama','$ab_harga','$ab_keterangan','$ab_status','$ab_kategori_id','$foto_nama','$ab_jumlah')";

	$qry2 = mysql_query($qry);
	if (move_uploaded_file($foto, $folder_f)) {

	if ($qry2) {
		echo "<script>document.location.href='index.php?view=camera&status=success';</script>";
	}
	else {
		echo "<script>document.location.href='index.php?view=camera&status=failInsert';</script>";
	}
}

	

	?>