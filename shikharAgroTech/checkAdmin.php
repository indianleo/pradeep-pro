<?php
	session_start();
			if(isset( $_REQUEST['admin_user'] )){
				$user = $_REQUEST['admin_user'];
				$pass = $_REQUEST['admin_pass'];
				if($user == "admin" && $pass == "admin_abc" ){
					$_SESSION["admin"] = $user;
					$html = '<div class="alert alert-success" role="alert">
							   Login Successful..
							</div>
							<a hef="admin.php">click to Go</a>';
					echo $html;
					header("location:admin.php");
				} else {
					$html = '<div class="alert alert-danger" role="alert">
							   Wrong User Id or Password. Please Try Again..
							</div>';
					
					echo $html;
					header("location:admin_login.php");
				}
			}
?>