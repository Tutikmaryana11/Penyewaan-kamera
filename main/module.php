<?php

$view = isset ($_GET['view']) ? $_GET['view']:null;
switch ($view) {
			
	case 'kategori':
	include_once "view/kategori.php";
		break;

		//anak kategori
		case 'kategori_add':
		include_once "proses/kategori/additem_process.php";
			break;

		case 'kategori_view_add':
		include_once "proses/kategori/additem.php";
			break;

		case 'kategori_del':
		include_once "proses/kategori/delitem.php";
			break;

		case 'kategori_edit':
		include_once "proses/kategori/edititem.php";
			break;

		case 'kategori_edit_process':
		include_once "proses/kategori/edititem_process.php";
			break;

	case 'camera':
	include_once "view/camera.php";
		break;

		//anak camera
		case 'camera_add':
		include_once "proses/camera/additem_process.php";
			break;

		case 'camera_view_add':
		include_once "proses/camera/additem.php";
			break;

		case 'camera_del':
		include_once "proses/camera/delitem.php";
			break;

		case 'camera_edit':
		include_once "proses/camera/edititem.php";
			break;

		case 'camera_edit_process':
		include_once "proses/camera/edititem_process.php";
			break;

	case 'penyewaan':
	include_once "view/penyewaan.php";
		break;

		//anak penyewaan
		case 'penyewaan_add':
		include_once "proses/penyewaan/additem_process.php";
			break;

		case 'penyewaan_view_add':
		include_once "proses/penyewaan/additem.php";
			break;

		case 'penyewaan_del':
		include_once "proses/penyewaan/delitem.php";
			break;

		case 'penyewaan_edit':
		include_once "proses/penyewaan/edititem.php";
			break;

		case 'penyewaan_edit_process':
		include_once "proses/penyewaan/edititem_process.php";
			break;

		case 'penyewaan_detail':
		include_once "proses/penyewaan/detail.php";
			break;

	case 'pembayaran':
	include_once "view/pembayaran.php";
		break;

		//anak pembayaran
		case 'pembayaran_add':
		include_once "proses/pembayaran/additem_process.php";
			break;

		case 'pembayaran_view_add':
		include_once "proses/pembayaran/additem.php";
			break;

		case 'pembayaran_del':
		include_once "proses/pembayaran/delitem.php";
			break;

		case 'pembayaran_edit':
		include_once "proses/pembayaran/edititem.php";
			break;

		case 'pembayaran_edit_process':
		include_once "proses/pembayaran/edititem_process.php";
			break;

		case 'pembayaran_detail':
		include_once "proses/pembayaran/detail.php";
			break;

	case 'pengembalian':
	include_once "view/pengembalian.php";
		break;

		//anak pengembalian
		case 'pengembalian_add':
		include_once "proses/pengembalian/additem_process.php";
			break;

		case 'pengembalian_view_add':
		include_once "proses/pengembalian/additem.php";
			break;

		case 'pengembalian_del':
		include_once "proses/pengembalian/delitem.php";
			break;

		case 'pengembalian_edit':
		include_once "proses/pengembalian/edititem.php";
			break;

		case 'pengembalian_edit_process':
		include_once "proses/pengembalian/edititem_process.php";
			break;

		case 'pengembalian_detail':
		include_once "proses/pengembalian/detail.php";
			break;

	case 'pelanggan':
	include_once "view/pelanggan.php";
		break;
		case 'pelanggan_del':
		include_once "proses/profile/delitem.php";
			break;

	case 'user_profile':
	include_once "view/profile.php";
		break;

		case 'profile_edit_process':
		include_once "proses/profile/edititem_process.php";
			break;
			

	// CASE UNTUK USER
	// =========================================================

	case 'profile':
	include_once "view/user/profile.php";
		break;

		case 'profile_edit_process_user':
		include_once "proses/profile/user/edititem_process.php";
			break;

	case 'pengembalian_user':
	include_once "view/user/pengembalian.php";
		break;

		//anak pengembalian
		case 'pengembalian_add_user':
		include_once "proses/pengembalian/user/additem_process.php";
			break;

		case 'pengembalian_view_add':
		include_once "proses/pengembalian/user/additem.php";
			break;

		case 'pengembalian_del':
		include_once "proses/pengembalian/user/delitem.php";
			break;

		case 'pengembalian_edit':
		include_once "proses/pengembalian/user/edititem.php";
			break;

		case 'pengembalian_edit_process':
		include_once "proses/pengembalian/user/edititem_process.php";
			break;

		case 'pengembalian_detail_user':
		include_once "proses/pengembalian/user/detail.php";
			break;

	case 'penyewaan_user':
	include_once "view/user/penyewaan.php";
		break;

		//anak penyewaan
		case 'penyewaan_add_user':
		include_once "proses/penyewaan/user/additem_process.php";
			break;

		case 'penyewaan_view_add_user':
		include_once "proses/penyewaan/user/additem.php";
			break;

		case 'penyewaan_del_user':
		include_once "proses/penyewaan/user/delitem.php";
			break;

		case 'penyewaan_edit_user':
		include_once "proses/penyewaan/user/edititem.php";
			break;

		case 'penyewaan_edit_process_user':
		include_once "proses/penyewaan/user/edititem_process.php";
			break;

		case 'penyewaan_detail_user':
		include_once "proses/penyewaan/user/detail.php";
			break;


	case 'pembayaran_user':
	include_once "view/user/pembayaran.php";
		break;

		//anak pembayaran
		case 'pembayaran_add_user':
		include_once "proses/pembayaran/user/additem_process.php";
			break;

		case 'pembayaran_view_add_user':
		include_once "proses/pembayaran/user/additem.php";
			break;

		case 'pembayaran_del_user':
		include_once "proses/pembayaran/user/delitem.php";
			break;

		case 'pembayaran_edit_user':
		include_once "proses/pembayaran/user/edititem.php";
			break;

		case 'pembayaran_edit_process_user':
		include_once "proses/pembayaran/user/edititem_process.php";
			break;

		case 'pembayaran_detail_user':
		include_once "proses/pembayaran/user/detail.php";
			break;

	// END CASE USER


	case 'logout':
	include_once "proses/logout/logout.php";
		break;


	default:
		if ($_SESSION['level']=='1') {
			include_once "view/home.php";
		}
		else{
			include_once "view/user/home.php";
		}
				
	break;

}