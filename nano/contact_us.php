<!doctype html>
<html>
	<head>
		<title>
			Nanosoft Global | About Us
		</title>
		<link rel="icon" type="image/x-icon" href="icon/favicon.ico"/>
		<Script src="js/jquery-2.1.1.js"></Script>
		<script src="js/bootstrap.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" href="css/masterstyle.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<style>
		.panel-title
		{
			font-size: 23px;
			word-break: break-word;
		}
		</style>
	</head>
	<body>
		<div class="header" id="header_box" style="position:relative;padding-bottom:20px;">
			<?php include('menu.html');?>
		</div>
		<div id="map_canvas" class="map_box">

		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 left_border_style">
					<h2 class="h2_style">Nanosoft Global Info Services (P) LTD.</h2>
					<h3 class="h1_style">
						<span><img src="icon/address.png" class="add_icons" alt="address"/></span>
						Allahabad
					</h3>
					<p class="para">* 273 - C/1 Nyay vihar Sulem Sarai,</p>
					<p class="para">Preetam nagar, Allahabad,</p>
					<p class="para">Uttar Pradesh 211001 </p>
					<p class="para">* 35, C.Y. Chintamani Road, George Town,</p>
					<p class="para">Allahabad UP India.- 211001</p>
					<p class="para">Uttar Pradesh 211001</p>
					<p class="para">
						<span><img src="icon/mobile.png" class="contact_icons" alt="mobile"/></span>
						+(91)- 868-776-3759, 945-172-1757, 0532 3248173
					</p>
					<h3 class="h1_style">
						<span><img src="icon/address.png" class="add_icons" alt="address"/></span>
						Delhi
					</h3>
					<p class="para">* C88 Patel Garden Near Dwarka More Metro Station,Dwarka,</p>
					<p class="para">New Delhi, Pincode-110057 </p>
					<p class="para"> 
						<span><img src="icon/mobile.png" class="contact_icons" alt="mobile"/></span>
						+(91)-0532 3248173
					</p>
					<p class="para">
						<span><img src="icon/email.png" class="contact_icons" alt="email"/></span>
						info@nanosoftglobal.com
					</p>
				</div>
				<div class="col-sm-5 col-sm-offset-1 left_border_style">
					<form method="post" action="process.php">
						<div class="row">
							<div class="col-sm-3">
								<label for="guest_name">Name</label>
							</div>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="guest_name" id="guest_name" placeholder="Enter Name" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<label for="guest_mob">Contact</label>
							</div>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="guest_mob" id="guest_mob" placeholder="Contact Number" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<label for="guest_email">Email</label>
							</div>
							<div class="col-sm-9">
								<input type="email" class="form-control" name="guest_email" id="guest_email" placeholder="Enter Email" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<label for="guest_detail">Query</label>
							</div>
							<div class="col-sm-9">
								<textarea class="form-control" name="guest_name4" id="guest_name4" placeholder="Enter Query"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<img src="icon/CaptchaSecurityImages.php?width=100&amp;height=40&amp;characters=5" style="margin-top:5px;">
							</div>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="code" id="code" placeholder="Captcha Code" required/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3 col-sm-offset-3">
								<input type="submit" class="btn btn-info btn-sm" name="submit_btn" id="submit_btn" value="Get Free Quote" style="margin-bottom:20px;"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="container-fluid footer_box" id="footer_box">
			<?php include("footer.html"); ?>
		</div>
		<script>
			function initialize() 
			{
			  var mapProp = {
			    center:new google.maps.LatLng(25.444321,81.782484),
			    zoom:5,
			    mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			  var map=new google.maps.Map(document.getElementById("map_canvas"), mapProp);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		<script src="js/main.js"></script>
	</body>
</html>