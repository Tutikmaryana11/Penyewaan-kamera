<?php
$q = "DELETE FROM `kategori` WHERE kategori_id='$_GET[kategori_id]'";
$sql = mysql_query($q) or die(mysql_error());
if($sql){
	echo "<script>document.location.href='index.php?view=kategori&status=success'</script>";
}
	
?>
