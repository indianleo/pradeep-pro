<!doctpe html>
<html>
	<head>
		<title>nano_2</title>
		<script src="js/jquery-2.1.1.js"></script>
		<script src="js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
	</head>	
	<body>
		<div class="header" style="position:absolute;">
			<?php include("menu.html");?>
		</div>
		<div class="container-fluid" style="padding:0;">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				<ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
				</ol>

			  <!-- Wrapper for slides -->
			  	<div class="carousel-inner" role="listbox">
				    <div class="item active">
				      <img src="image/slide0.jpg" class="img-responsive" alt="slide1"/>
				      <div class="carousel-caption">
				        <h1>Web Design</h1>
				      </div>
				    </div>
					<div class="item">
						<img src="image/slide1.jpg" class="img-responsive" alt="slider"/>
						<div class="carousel-caption">
							<h1>Web Devlopment</h1>
						</div>							
					</div>
					<div class="item">
						<img src="image/slide2.jpg" class="img-responsive" alt="slider"/>
						<div class="carousel-caption">
							<h1>Web Hosting</h2>
						</div>
					</div>
					<div class="item">
						<img src="image/slide3.jpg" class="img-responsive"/>
						<div class="carousel-caption">
							<h1>Love Hosting</h2>
						</div>
					</div>
			 	</div>
		</div>
		<div class="container" id="services">
			<div class="row">
				<div class="col-sm-12 service_items">
					<div class="service_logo">
						<img src="icon/web_design.png" alt="service_logo" class="img-responsive"/>
					</div>
					<div class="service_content">
						<h1>Web Solutions</h1>
						<p>Nanosoft Global is a growing 
						   Web development company, developing various.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 service_items">
					<div class="service_logo">
						<img src="icon/web_design.png" alt="service_logo" class="img-responsive"/>
					</div>
					<div class="service_content">
						<h1>Web Solutions</h1>
						<p>Nanosoft Global is a growing 
						   Web development company, developing various.</p>
					</div>
				</div>
			</div>
		</div>
	<body>
</html>	