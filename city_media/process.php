<?php
	$action = $_REQUEST['action'];
	switch ($action) {
		case 'admin_login': admin_login();
			break;
		case 'user_login': user_login();
			break;
		case 'detail_save': detail_save();
			break;
		default:
			echo "Data not Found";
			break;
	}

	function detail_save(){
		header("location:user.php");
	}

	function user_login(){
		header("location:user.php");
	}

	function admin_login(){
		header("location:admin.php");
	}

?>