<?php
$q = "DELETE FROM `user` WHERE user_id='$_GET[user_id]' ";
$sql = mysql_query($q) or die(mysql_error());
if($sql){
	echo "<script>document.location.href='index.php?view=pelanggan&status=success'</script>";
}
	
?>
