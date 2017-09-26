<!doctype html>
<html>
	<head>
		<title>Pics</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<meta name="description" content="Anamika Singh's Online Photo Album" />
		<meta name="keywords" content="3d page, photo, css transform, web development, web design, library, album" />
		<meta name="author" content="Anamika Singh" />
		<link rel="icon" type="image/x-icon" href="icon/photo-icon.png">
		<link rel="stylesheet" href="css/index.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="css/bloksit.css">
		<script src="js/jquery-2.1.1.js"></script>
		<script type="text/javascript" src="js/blocksit.min.js"></script>
	</head>
	<body>
		<?php session_start();
			$con=mysqli_connect("mysql.hostinger.in","u728032163_annie","786pradeep","u728032163_pics");
		?>
		<div class="menu_btn" id="menu_btn">
			<img src="image/menu_icon.png" alt="menu_icon.png"/>
		</div>
		<div class="menu_box" id="menu_box">
			<div class="col menu_logo">
				
			</div>
			<div class="col menu_item" id="home_m">
				<a href="#home">
					<div class="col menu_icons">
						<img src="icons/home.png" alt="home_icon"/>
					</div>
					<div class="col menu_text">
						Home
					</div>
				</a>
			</div>
			<div class="col menu_item" id="exp_m">
				<a href="#explore">
					<div class="col menu_icons">
						<img src="icons/exp.png" alt="explore_icon"/>
					</div>
					<div class="col menu_text">
						Explore
					</div>
				</a>
			</div>
			<div class="col menu_item" id="login_m">
				<a href="#login">
					<div class="col menu_icons">
						<img src="icons/login.png" alt="login_icon"/>
					</div>
					<div class="col menu_text">
						Login
					</div>
				</a>
			</div>
			<div class="col menu_item" id="reg_m">
				<a href="#reg">
					<div class="col menu_icons">
						<img src="icons/reg.png" alt="reg_icon"/>
					</div>
					<div class="col menu_text">
						Join
					</div>
				</a>
			</div>
			<div class="col menu_item" id="about_m">
				<a href="#about">
					<div class="col menu_icons">
						<img src="icons/about.png" alt="about_icon"/>
					</div>
					<div class="col menu_text">
						About
					</div>
				</a>
			</div>
		</div>
		<div class="back_cover page_height" id="home">
			<div class="cover">
			</div>
			<div class="header">
				<div class="menu_logo logo_spin">
				
				</div>
			</div>
			<div class="top_demo">
				<div class="row welcome_text demo_top_space">
					~~~Welcome in Pics~~~
				</div>
				<div class="row demo_msg demo_top_space">
					This is the place where you can explore amazing stuff and Show your imagination and Creativity
					on finger.
				</div>
				<div class="row">
					<div class="col exp_demo_btn_box demo_top_space">
						<a href="#explore">
							<button type="button" id="exp_demo_btn" class="exp_demo_btn">Explore</button>
						</a>
					</div>
					<div class="col join_demo_btn_box demo_top_space">
						<a href="#reg">
							<button type="button" id="join_demo_btn" class="join_demo_btn">Join Us</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="explore_box page_height" id="explore">
			<div class="row search_box">
				<form method="post" action="user_action.php">
					<input type="hidden" name="find" value="explore"/>
					<div class="col">
						<input type="search" name="search_bar" id="search_bar" placeholder="Enter text to Search"/>
					</div>
					<div class="col">
						<button type="button" name="search_btn" class="search_btn" id="search_btn">Search</button>
					</div>
				</form>
			</div>
			<div class="row show_box">
				<div id="container">
				  <?php $res=mysqli_query($con,"select * from pic limit 20"); ?>
					 <?php while($ans=mysqli_fetch_assoc($res))
					  { 
						?>
					 <div class="grid">
						<div class="imgholder">
							<img src="<?php echo $ans['path'];?>" />
						</div>
						<strong><?php echo $ans['title'];?></strong>
						<p>Gusest View</p>
						<div class="meta"><?php echo "by ".$ans['user_name'];?></div>
					</div>
				 <?php } ?>		
				</div> 
			</div>
		</div>
		<div class="login_box row page_height" id="login">
			<div class="in_login">
				<h1>Login</h1>
				<form method="post" action="process.php">
					<input type="hidden" name="action" value="login"/> 
					<div class="row form_row">
						<div class="col login_tag">
							<label for="login_name">User Name<label>
						</div>
						<div class="col">
							<input type="text" name="login_name" id="login_name" placeholder="Enter User Id" required/>
						</div>
					</div>
					<div class="row form_row">
						<div class="col login_tag">
							<label for="login_pass">Password<label>
						</div>
						<div class="col">
							<input type="password" name="login_pass" id="login_pass" placeholder="Enter Password" required/>
						</div>
					</div>
					<div class="row form_row">
						<div class="col login_tag h">
						.
						</div>
						<div class="col">
							<input type="submit" name="login_btn" id="login_btn" value="Login"/>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="reg_box row page_height" id="reg">
			<div class="in_reg">
				<h1>Registration</h1>
				<form method="post" action="process.php">
					<input type="hidden" name="action" value="reg">
					<div class="row form_row">
						<div class="col reg_tag">
							<label for="reg_name">Name<label>
						</div>
						<div class="col">
							<input type="text" name="reg_name" id="reg_name" placeholder="Enter Name" required/>
						</div>
					</div>
					<div class="row form_row">
						<div class="col reg_tag">
							<label for="user_name">User Name<label>
						</div>
						<div class="col">
							<input type="text" name="user_name" id="user_name" placeholder="Enter User Name" required/>
						</div>
					</div>
					<div class="row form_row">
						<div class="col reg_tag">
							<label for="user_pass">Password<label>
						</div>
						<div class="col">
							<input type="password" name="user_pass" id="user_pass" placeholder="Enter Password" required/>
						</div>
					</div>
					<div class="row form_row">
						<div class="col reg_tag">
							<label for="user_job">Occupation<label>
						</div>
						<div class="col">
							<input type="text" name="user_job" id="user_job" placeholder="Enter Occupation" required/>
						</div>
					</div>
					<div class="row form_row">
						<div class="col reg_tag">
							<label for="user_email">Email<label>
						</div>
						<div class="col">
							<input type="email" name="user_email" id="user_email" placeholder="Enter Email" required/>
						</div>
					</div>
					<div class="row form_row">
						<div class="col reg_tag">
							<label for="contact">Contact<label>
						</div>
						<div class="col">
							<input type="number" name="user_contact" id="user_contact" placeholder="Enter Contact" required/>
						</div>
					</div>
					<div class="row form_row">
						<div class="col reg_tag">
							<label>Gender<label>
						</div>
						<div class="col">
							<label for="male_radio">
								<input type="radio" name="gender" id="male_radio" value="male"/>
								Male
							</label>
						</div>
						<div class="col">
							<label for="female_radio">
								<input type="radio" name="gender" id="female_radio" value="female"/>
								Female
							</label>
						</div>
					</div>
					<div class="row form_row">
						<div class="col reg_tag">
							.
						</div>
						<div class="col">
							<input type="submit" name="reg_submit_btn" id="reg_submit_btn" value="Submit"/>
						</div>
						<div class="col">
							<input type="reset" name="reg_clear_btn" id="reg_clear_btn" value="Clear"/>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="about_box page_height" id="about">
			<div class="in_about row">
				<div class="col about_text">
					"You will be happy with our photo sharing application. Our Web application provides photo sharing and publishing hub. User can upload unlimited photos here. It has some other features like document management and photo editor is just a start of platform for photos and user’s easiness. We promise that in future it will be much attractive and more reliable."
				</div>
				<div class="col about_owner">
					<div class="about_img">
						<img src="image/owener.jpg" alt="me.jpg"/>
					</div>
					<div class="about_me">
						<h4>Anamika Singh</h4>
						<p>singh.anamika.19.01@gmail.com</p>
					</div>
				</div>
			</div>
			<div class="footer row">
				<div class="col copyright">
					This Website is devloped by Anamika Singh &copy; SHIATS PHOTOGRAPHY CLUB 2016
				</div>
				<div class="col social_link">
					<div class="col">
						<img src="image/twitter.png" class="s_btn" alt="twitter"/>
					</div>
					<div class="col">
						<img src="image/facebook.png" class="s_btn" alt="facebook"/>
					</div>
					<div class="col">
						<img src="image/linkedin.png" class="s_btn" alt="linkedin"/>
					</div>
					<div class="col">
						<img src="image/pin.png" class="s_btn" alt="linkedin"/>
					</div>
					<div class="col">
						<img src="image/flicker.png" class="s_btn" alt="linkedin"/>
					</div>
				</div>
			</div>
		</div>
		
		<script src="js/main.js"></script>
	</body>
</html>