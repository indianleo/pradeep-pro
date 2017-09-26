<?php session_start(); ?>
<!doctype html>
<html>
	<head>
		<title> ADMIN | ABC NEWS EXPRESS </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	</head>
	<body>
		<?php 
			if( isset( $_REQUEST['admin_user'] ) ){
				$user = $_REQUEST['admin_user'];
				$pass = $_REQUEST['admin_pass'];
				if($user == "admin" && $pass == "admin_abc" ){
					$_SESSION["admin"] = $user;
					$html = '
							<div class="container">
								<div class="alert alert-success" role="alert">
								   Login Successful..
								</div>
								<a href="admin.php" class="btn btn-link">Click here to Go</a>
							</div>';
					echo $html;
					header("location:admin.php");
				} else {
					$html = '<div class="alert alert-danger" role="alert">
							   Wrong User Id or Password. Please Try Again..
							</div>
							<a href="index.php" class="btn btn-link">Back</a>
							<br/>
							<div class="container">
								<form method="post" action="#">
									<div class="row form-group">
										<div class="col-sm-2">
											<label for="admin_user">User Id</label>
										</div>
										<div class="col-sm-6">
											<input type="text" name="admin_user" id="admin_user" class="form-control" placeholder="User Id"/>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-sm-2">
											<label for="login_btn">Password</label>
										</div>
										<div class="col-sm-6">
											<input type="password" name="admin_pass" id="login_btn" class="form-control" placeholder="Password"/>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-sm-6 col-sm-offset-2">
											<input type="submit" name="login_btn" id="login_btn" class="btn btn-success" value="Login" />
										</div>
									</div>
								</form>
							</div>';
					
					echo $html;
				}
			}
			else if( isset($_SESSION["admin"]) ){
				$html = '
						<div class="container">
							<div class="alert alert-success" role="alert">
							   Already Logined. Please Click on Admin to go...
							</div>
							<a href="admin.php" class="btn btn-link">Admin</a>
						</div>';
				echo $html;
			}
			else {
				$html = '
						<a href="index.php" class="btn btn-link">Back</a>
						<br/>
						<div class="container">
							<form method="post" action="#">
								<div class="row form-group">
									<div class="col-sm-2">
										<label for="admin_user">User Id</label>
									</div>
									<div class="col-sm-6">
										<input type="text" name="admin_user" id="admin_user" class="form-control" placeholder="User Id"/>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-sm-2">
										<label for="login_btn">Password</label>
									</div>
									<div class="col-sm-6">
										<input type="password" name="admin_pass" id="login_btn" class="form-control" placeholder="Password"/>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-sm-6 col-sm-offset-2">
										<input type="submit" name="login_btn" id="login_btn" class="btn btn-success" value="Login" />
									</div>
								</div>
							</form>
						</div>';
				
				echo $html;
			}
		?>
	</body>
</html>