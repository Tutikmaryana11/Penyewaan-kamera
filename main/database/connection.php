<?php
	$server = 'localhost'; //mesin yang dipakai atau lokal untuk database
	$user = 'root'; //user yang dipakai untuk database
	$pass = '';
	$dbname = 'tutech_camera'; //nama database
	$connect = mysql_connect($server, $user, $pass);

		if(!$connect) {
			echo "Cant access the database".mysql_error();
		}

	mysql_select_db($dbname);
?>

