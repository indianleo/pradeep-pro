<?php 
 session_start();
 $con=mysqli_connect("mysql.hostinger.in","u728032163_annie","786pradeep","u728032163_pics");
 $user=$_SESSION['user'];
  if(!isset($_SESSION['user']))
  {
   header("location:index.php");
   }
   ?>
<!doctype html>
<html>
	<head>
		<title>Pics</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<meta name="description" content="Anamika Singh's Online Photo Album" />
		<link rel="stylesheet" href="css/user.css" type="text/css"/>
		<link rel="icon" type="image/x-icon" href="icons/photo-icon.png">
		<link rel="stylesheet" type="text/css" href="css/preloader.css">
		<link rel="stylesheet" type="text/css" href="css/bloksit.css">
		<script src="js/jquery-2.1.1.js"></script>
		<script type="text/javascript" src="js/blocksit.min.js"></script>
	</head>
	<body>
		<?php include("preloader.php");?>
		<div class="menu_btn" id="menu_btn">
			<img src="image/menu_icon.png" alt="menu_icon.png"/>
		</div>
		<div class="menu_box" id="menu_box">
			<div class="col menu_logo">
			
			</div>
			<div class="col menu_item" id="about_m">
				<a href="#">
					<div class="col menu_icons">
						<img src="icons/about.png" alt="about_icon"/>
					</div>
					<div class="col menu_text">
						Home
					</div>
				</a>
			</div>
			<div class="col menu_item" id="profile_m">
				<a href="profile.php">
					<div class="col menu_icons">
						<img src="icons/profile.png" alt="profile_icon"/>
					</div>
					<div class="col menu_text">
						Profile
					</div>
				</a>
			</div>
			<div class="col menu_item" onclick="page_out('lib')" id="lib_m">
				<a href="#">
					<div class="col menu_icons">
						<img src="icons/lib.png" alt="lib_icon"/>
					</div>
					<div class="col menu_text">
						Library
					</div>
				</a>
			</div>
			<div class="col menu_item" onclick="page_out('upload_img')" id="img_m">
				<a href="#">
					<div class="col menu_icons">
						<img src="icons/up_img.png" alt="up_img_icon"/>
					</div>
					<div class="col menu_text">
						Images
					</div>	
				</a>
			</div>
			<div class="col menu_item" onclick="page_out('upload_docs')" id="doc_m">
				<a href="#">
					<div class="col menu_icons">
						<img src="icons/up_doc.png" alt="up_doc_icon"/>
					</div>
					<div class="col menu_text">
						Docs
					</div>
				</a>
			</div>
			<div class="col menu_item" onclick="page_out('manage')" id="manage_m">
				<a href="#">
					<div class="col menu_icons">
						<img src="icons/setting.png" alt="setting_icon"/>
					</div>
					<div class="col menu_text">
						Manage
					</div>
				</a>
			</div>
			<div class="col menu_item" id="logout_m">
				<a href="logout.php">
					<div class="col menu_icons">
						<img src="icons/off.png" alt="off_icon"/>
					</div>
					<div class="col menu_text">
						Logout
					</div>
				</a>
			</div>
		</div>
		<div class="header">
			<div class="menu_logo logo_spin">
			
			</div>
		</div>
		<div class="row" id="about">
			<div class="col in_about">
				<div class="col user_icon">
					<?php 
						$res=mysqli_query($con,"select * from profile where user_name='$user'");
						$ans=mysqli_fetch_assoc($res); ?>	
					<img src="<?php echo $ans['pro'];?>" alt="Profile Pic" title="Profile Pic"/>
				</div>
				<div class="col user_name">
					Anamika Singh
				</div>
			</div>
		</div>
		<div class="row outbox" id="outbox">
		
		</div>
		<script src="js/user.js"></script>
	</body>
</html>