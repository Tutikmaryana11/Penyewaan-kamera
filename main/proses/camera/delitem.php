<?php
$q = "DELETE FROM `camera` WHERE cm_id='$_GET[cm_id]'";
$sql = mysql_query($q) or die(mysql_error());
if($sql){
	echo "<script>document.location.href='index.php?view=camera&status=success'</script>";
}
	
?>
