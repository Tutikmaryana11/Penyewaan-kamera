<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

$user_id = addslashes(strip_tags ($_POST['user_id']));
$keterangan = addslashes(strip_tags ($_POST['keterangan']));
$password     = md5($_POST['password']);  
$password2     = md5($_POST['password2']);  
$password3     = $_POST['password3']; 



if ($password != $password2) {
		# code...
	echo "<script>alert('Password tidak cocok');</script>";
	echo "<script>document.location.href='index.php?view=user_profile&status=failInsert';</script>";
}

elseif ($password =='d41d8cd98f00b204e9800998ecf8427e') {
	# code...

	$qry = "UPDATE user set user_info='$keterangan',user_password='$password3' where user_id='$user_id'";
	$qry2 = mysql_query($qry);


	if ($qry2) {
		echo "<script>document.location.href='index.php?view=user_profile&status=success';</script>";
	}
	else {
		echo "<script>document.location.href='index.php?view=user_profile&status=failInsert';</script>";
	}

} elseif ($password !='d41d8cd98f00b204e9800998ecf8427e') {
	# code...
	$qry = "UPDATE user set user_info='$keterangan',user_password='$password' where user_id='$user_id'";
	$qry2 = mysql_query($qry);


	if ($qry2) {
		echo "<script>document.location.href='index.php?view=user_profile&status=success';</script>";
	}
	else {
		echo "<script>document.location.href='index.php?view=user_profile&status=failInsert';</script>";
	}
}


?>