<?php
$id = $_GET['kategori_id'];
$nama = addslashes(strip_tags ($_POST['kategori_nama']));


if(trim($nama) == "&nbsp;" || trim($nama) =='') {
	echo "<script>document.location.href='index.php?view=kategori&status=failTrim';</script>";

}
else {
	$sql = "UPDATE kategori set kategori_nama = '$nama' where kategori_id = '$id'";
	$qry = mysql_query($sql);


	if ($qry) {
		echo "<script>document.location.href='index.php?view=kategori&status=success';</script>";
	}
	else {
		echo "<script>document.location.href='index.php?view=kategori&status=failInsert';</script>";
	}

}
?>