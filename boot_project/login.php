<!doctype html>
<html>
	<head>
		<title>Login Page</title>
		<script src="jquery-2.1.1.js"></script>
		<script src="bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap.css"/>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6" id="loing_box">
					<form method="post" action="#">
						<div class="row">
							<div class="form-group">
								<label for="user_name">User Name</label>
							</div>
							<div class="form-group">
								<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Id"/>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label for="user_pass">Password</label>
							</div>
							<div class="form-group">
								<input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="Enter Password"/>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<input type="submit" name="ok_btn" id="ok_btn" class="btn btn-info" value="Login"/>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-6" id="output">
					<?php
						@$user = $_POST['user_name'];
						if($user)
						{
							$pass = $_POST['user_pass'];
							$connection = mysqli_connect("localhost","root","","annie");
							$res = mysqli_query($con,"select * from user_record where user='$user' and pass='$pass'");
							$ans=mysqli_fetch_assoc($res);
							 if($ans)
							 {
								 $_SESSION['user']=$user;
								 echo "<div class='jumbotron'>Welcome ".$_SESSION['user']."</div>";
							 }
							 else
							 {
								echo "<div class='btn btn-danger btn-lg'>!!!!!!!  Access Denied  !!!!!!!</div>";
							 }
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>