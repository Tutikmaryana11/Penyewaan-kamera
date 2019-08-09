<?php if ($_SESSION['user_id']==1) {
	include_once 'template/menu/menu_admin.php';
	include_once 'template/menu/page_admin.php';
	# code...
} else {
	include_once 'template/menu/menu_user.php';
	include_once 'template/menu/page_user.php';
} ?>