<!doctype html>
<html>
	<head>
	    <?php include_once('header.html'); ?>
	    <link rel="stylesheet" href="login.css" type="text/css"/>
	</head>
	<body>
		<div style="position: fixed;z-index: 99999;">
			<?php include_once('menu.html'); ?>
		</div>

		<div class="container-fluid" style="height:100px;">
		</div>

		<div class="container-fluid">
			<div class="login_type_box">
				<div class="row">
					<div class="col-sm-1">
						<h4 class="btn btn-info" id="user_login_btn" >User Login</h4>
					</div>
					<div class="col-sm-1">
						<h4 class="btn btn-danger" id="admin_login_btn">Admin Login</h4>
					</div>
				</div>
			</div>
		</div>
		<br/>

		<div class="container-fluid user_login_holder" id="user_login_holder">
			<div class="login_box box_gray">
				<form name="login_form" method="post" action="process.php">
					<input type="hidden" name="action" value="user_login"/>
					<br/>
					<div class="row">
						<div class="col-sm-6">
							<div class="input-group">
								<span class="input-group-addon login_label">User ID</span>
							    <input type="text" class="form-control login_inputs" id="user_id" aria-describedby="user_id" placeholder="Enter User ID" />
							 </div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-6">
							<div class="input-group">
								<span class="input-group-addon login_label">Password</span>
							    <input type="password" class="form-control login_inputs" id="user_pass" aria-describedby="user_pass" placeholder="Enter Password" />
							 </div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-6">
							<input type="submit" name="login_btn" class="btn btn-danger" id="login_btn" value="Login">
						</div>
					</div>
					<br/>
				</form>
			</div>
		</div>

		<div class="container-fluid  admin_login_holder" id="admin_login_holder">
			<div class="login_box box_gray">
				<form name="login_form" method="post" action="process.php">
					<input type="hidden" name="action" value="admin_login"/>
					<br/>
					<div class="row">
						<div class="col-sm-6">
							<div class="input-group">
								<span class="input-group-addon login_label">Admin ID</span>
							    <input type="text" class="form-control login_inputs" id="user_id" aria-describedby="user_id" placeholder="Enter User ID" />
							 </div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-6">
							<div class="input-group">
								<span class="input-group-addon login_label">Password</span>
							    <input type="password" class="form-control login_inputs" id="user_pass" aria-describedby="user_pass" placeholder="Enter Password" />
							 </div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-6">
							<input type="submit" name="login_btn" class="btn btn-danger" id="login_btn" value="Login">
						</div>
					</div>
					<br/>
				</form>
			</div>
		</div>
		<div id="screen_set">
		</div>
		<!------------------------------------End-------------------------------------------->
		<br/>
		<div class="footer">
		       <?php include_once('footer.html'); ?>
		</div>

		<script>
			var height = screen.height;
			$("#screen_set").css({'height':height/2});
			$("#user_login_btn").click(function(){
				$('#admin_login_holder').hide('slow');
				$('#user_login_holder').show('slow');
			});
			$("#admin_login_btn").click(function(){
				$('#admin_login_holder').show('slow');
				$('#user_login_holder').hide('slow');
			});
			
		</script>
	</body>
</html>