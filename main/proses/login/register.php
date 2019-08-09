<?php
// print_r($_POST);
// exit();
include "../../database/connection.php";
	
	$nama = addslashes(strip_tags ($_POST['user_username']));
	$password = addslashes(strip_tags (md5($_POST['user_password'])));
	$password2 = addslashes(strip_tags (md5($_POST['user_password2'])));
	$user_info = addslashes(strip_tags ($_POST['user_info']));
	$user_level = addslashes(strip_tags ($_POST['user_level']));

	if ($password == $password2) {
	# code...

		$qry = "INSERT INTO user (user_username,user_password,user_level,user_info) VALUES ('$nama','$password','$user_level','$user_info')";
		$qry2 = mysql_query($qry);
		// echo $qry;
		// exit();


		if ($qry2) {
			echo "<script>document.location.href='../../../register.php?status=success&task=registerDone';</script>";
		}
		else {
			echo "<script>document.location.href='../../../register.php?status=failInsert&task=fail';</script>";
		}

	} else {
			echo "<script>document.location.href='../../../register.php?status=failInsert&task=passwordNotMatch';</script>";

	}


	?>