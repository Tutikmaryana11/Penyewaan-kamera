<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

$ab_id = addslashes(strip_tags ($_POST['cm_id']));
$ab_nama = addslashes(strip_tags ($_POST['ab_nama']));
$ab_harga = addslashes(strip_tags ($_POST['ab_harga']));
$ab_keterangan = addslashes(strip_tags ($_POST['ab_keterangan']));
$ab_status = addslashes(strip_tags ($_POST['ab_status']));
$ab_kategori_id = addslashes(strip_tags ($_POST['ab_kategori_id']));
$ab_jumlah = addslashes(strip_tags ($_POST['ab_jumlah']));

// $foto_nama = ($_FILES['foto']['name']);
// $foto = ($_FILES['foto']['tmp_name']);
// $folder_f = "file";
// $folder_f = $folder_f."/".basename($_FILES['foto']['name']);


$qry = "UPDATE camera set cm_nama='$ab_nama',cm_harga='$ab_harga',cm_keterangan='$ab_keterangan',cm_status='$ab_status',cm_kategori_id='$ab_kategori_id', cm_jumlah_ketersediaan='$ab_jumlah' where cm_id='$ab_id'";
$qry2 = mysql_query($qry);


if ($qry2) {
    echo "<script>document.location.href='index.php?view=camera&status=success';</script>";
}
else {
    echo "<script>document.location.href='index.php?view=camera&status=failInsert';</script>";
}

?>