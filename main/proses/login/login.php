
<?php
session_start();

include "../../database/connection.php";

$username = addslashes(strip_tags($_POST['user_username']));
$pass = md5($_POST['user_password']);
// $level = 'admin';

	$sql = "select * from user where user_username = '$username' ";
	$qry = mysql_query($sql);
	$data = mysql_fetch_array($qry);

			if ($pass == $data['user_password'])
			{

			    $_SESSION['username'] = $data['user_username'];
	    		$_SESSION['password'] = $data['user_password'];
	    		$_SESSION['level'] = $data['user_level'];
	    		$_SESSION['user_id'] = $data['user_id'];

				echo "<script>document.location.href='../../index.php?view=home&status=success';</script>"; 
	    		
			}

			else {
			    // echo "<script>alert('Login failed');</script>";
				echo "<script>document.location.href='../../index.php';</script>";
			}

?>