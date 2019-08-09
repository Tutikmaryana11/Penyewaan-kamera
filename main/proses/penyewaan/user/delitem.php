<?php
$q = "DELETE FROM sewa WHERE sewa_id='$_GET[sewa_id]'";
$sql = mysql_query($q) or die(mysql_error());
$data = mysql_fetch_array(mysql_query("SELECT * FROM alat_berat where ab_id = $_GET[ab_id] "));

$hasil = $data['ab_jumlah_ketersediaan']+1;

if($sql){
	$tambahStok = mysql_query("UPDATE alat_berat set ab_jumlah_ketersediaan = $hasil where ab_id = $_GET[ab_id] ");
	echo "<script>document.location.href='index.php?view=penyewaan&status=success'</script>";
}

?>
