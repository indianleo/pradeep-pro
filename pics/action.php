<?php
	$find=$_REQUEST['find'];
	switch($find)
	{
		case 'explore' : explore();
		break;
		case 'login' : login();
		break;
		case 'reg' : reg();
		break;
		default  : def();
		break;
	}
	function explore()
	{
		$search_str=$_REQUEST['search_bar'];
		header("location:index.php");
	}
	function login()
	{
		$user_id=$_REQUEST['login_name'];
		$user_pass=$_REQUEST['login_pass'];
		header("location:user.php");
	}
	function reg()
	{
		$name=$_REQUEST['reg_name'];
		$user_name=$_REQUEST['user_name'];
		$user_pass=$_REQUEST['user_pass'];
		$job=$_REQUEST['user_job'];
		$email=$_REQUEST['user_email'];
		$contact=$_REQUEST['user_contact'];
		$gender=$_REQUEST['gender'];
		header("location:index.php");
	}
	function def()
	{
		echo "Function is not working";
	}
?>