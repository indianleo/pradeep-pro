<!doctype html>
<html>
	<head>
		<title>Bootstrap Assignment1</title>
		<script src="jquery-2.1.1.js"></script>
		<script src="bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<style>
			.back_fixed
			{
				background-image:url('image/stones.jpg') !important;
				background-attachment:fixed !important;
				color:#fff !important;
				height:421px !important;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid navbar navbar-default">
			<div class="container">
				<div class="row">
					<br/>
					<div class="col-sm-7 text-muted">
						<i class="fa fa-mobile fa-2x"></i>
						<span>Call us at 1- 888 - 999</span>
						<i class="fa fa-envelope fa-2x"></i>
						<span>E-mail: info@example.com</span>
					</div>
					<div class="col-sm-5">
						<ul class="list-inline pull-right">
							<li><a href="#" class="text-muted"><i class="fa fa-dribbble fa-lg"></i></a></li>
							<li><a href="#" class="text-muted"><i class="fa fa-pinterest-p fa-lg"></i></a></li>
							<li><a href="#" class="text-muted"><i class="fa fa-google-plus fa-lg"></i></a></li>
							<li><a href="#" class="text-muted"><i class="fa fa-twitter fa-lg"></i></a></li>
							<li><a href="#" class="text-muted"><i class="fa fa-facebook fa-lg"></i></a></li>
							<li class="text-muted"><i class="fa fa-search"></i></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<nav class="navbar navbar-default">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collpased" data-toggle="collapse" data-target="#menu_body"
									aria-expanded="false">
								<span class="sr-only">Navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="#" class="navbar-brand"><img src="image/main_logo.png"/></a>
						</div>
						<div class="collapse navbar-collapse pull-right" id="menu_body">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" aria-haspopup="true" data-toggle="dropdown" role="button" aria-expanded="false">
										<strong>HOME</strong>
										<p>Examples</p>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">Home Version 1</a></li>
										<li><a href="#">Home Version 2</a></li>
										<li><a href="#">Home Version 3</a></li>
										<li><a href="#">Home Version 4</a></li>
										<li><a href="#">Home Version 5</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<strong>PAGES</strong>
										<p>Layouts</p>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">About</a></li>
										<li><a href="#">Services</a></li>
										<li><a href="#">Our Team</a></li>
										<li><a href="#">Sidebar Navigation</a></li>
										<li><a href="#">FAQ</a></li>
										<li><a href="#">COntact us</a></li>
										<li><a href="#">Sign up</a></li>
										<li><a href="#">Sign in</a></li>
										<li><a href="#">404</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" data-toggle="dropdown" role="button" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">
										<strong>BLOG</strong>
										<p>The News</p>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">Blog</a></li>
										<li><a href="#">Blog Masonry</a></li>
										<li><a href="#">Blog Single</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<strong>PORTFOLIO</strong>
										<p>Our Work</p>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">2 Column</a></li>
										<li><a href="#">3 Column</a></li>
										<li><a href="#">4 Column</a></li>
										<li><a href="#">Single</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<strong>SHORTCODES</strong>
										<p>Elements</p>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">Accordions & Toggles</a></li>
										<li><a href="#">Columns</a></li>
										<li><a href="#">Elements</a></li>
										<li><a href="#">Full Block Contents</a></li>
										<li><a href="#">Icon Boxes</a></li>
										<li><a href="#">Icons</a></li>
										<li><a href="#">Pricing Tables</a></li>
										<li><a href="#">Tabs</a></li>
										<li><a href="#">Testimonials</a></li>
										<li><a href="#">Typography</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="carousel slide" id="slider" data-ride="carousel">
					<ol class="carousel-indicators">
						<li class="active" data-target="#slider" data-slide-to="0"></li>
						<li data-target="#slider" data-slide-to="0"></li>
						<li data-target="#slider" data-slide-to="1"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active" style="background:url('image/bg1.jpg') top left;height:500px;">
							<div class="row">
								<div class="col-sm-6">
									<img src="image/iphone.png" alt="iphone.png"/>
								</div>
								<div class="col-sm-6">
									<img src="image/mobile.png" class="pull-right"alt="mobile.png"/>
								</div>
							</div>
							<div class="carousel-caption">
								<h1>Responsive Design</h1>
								<p>
									Lorem ipsum dolor sit amet, usu ut purto elitr, idque feugait mentitum eu sit. 
									Cu minim congue mentitum pro, an mea dicam timeam iracundia, vix magna honestatis id.
									Meis elaboraret nam an, te vel dicat euripidis. Pri an zril possit aperiri, putant 
									lucilius pro ut.
								</p>
								<button type="button" class="btn btn-info">More Info</button>
							</div>
						</div>
						<div class="item" style="background:url('image/bg2.jpg') top left;height:500px;">
							<img src="image/imac.png" alt="imac.png" class="pull-right"/>
							<div class="carousel-caption">
								<h1>Very Flexible</h1>
								<p>
									Lorem ipsum dolor sit amet, usu ut purto elitr, idque feugait mentitum eu sit. 
									Cu minim congue mentitum pro, an mea dicam timeam iracundia, vix magna honestatis id.
									Meis elaboraret nam an, te vel dicat euripidis. Pri an zril possit aperiri, putant 
									lucilius pro ut.
								</p>
								<button type="button" class="btn btn-info">More Info</button>
							</div>
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row navbar navbar-default">
				<div class="col-sm-3 text-center">
					<div>
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-tasks fa-stack-1x fa-inverse"></i>
						</span>
					</div>
					<span class="lead">Fully Costomizable</span>
				</div>
				<div class="col-sm-3 text-center">
					<div>
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-video-camera fa-stack-1x fa-inverse"></i>
						</span>
					</div>
					<span class="lead">Fully Costomizable</span>
				</div>
				<div class="col-sm-3 text-center">
					<div>
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-desktop fa-stack-1x fa-inverse"></i>
						</span>
					</div>
					<span class="lead">Fully Costomizable</span>
				</div>
				<div class="col-sm-3 text-center">
					<div>
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-archive fa-stack-1x fa-inverse"></i>
						</span>
					</div>
					<span class="lead">Fully Costomizable</span>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<img src="icon/work.png" class="img-responsive center-block" alt="work.png"/>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<img src="image/portfolio1.jpg" alt="portfolio1.jpg"/>
					</div>
					<div class="col-sm-3">
						<img src="image/portfolio2.jpg" alt="portfolio2.jpg"/>
					</div>
					<div class="col-sm-3">
						<img src="image/portfolio3.jpg" alt="portfolio3.jpg"/>
					</div>
					<div class="col-sm-3">
						<img src="image/portfolio4.jpg" alt="portfolio4.jpg"/>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-sm-3">
						<img src="image/portfolio5.jpg" alt="portfolio5.jpg"/>
					</div>
					<div class="col-sm-3">
						<img src="image/portfolio6.jpg" alt="portfolio6.jpg"/>
					</div>
					<div class="col-sm-3">
						<img src="image/portfolio7.jpg" alt="portfolio7.jpg"/>
					</div>
					<div class="col-sm-3">
						<img src="image/portfolio8.jpg" alt="portfolio8.jpg"/>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid back_fixed">
			<div class="row well well-sm">
				<div class="col-sm-4 col-sm-offset-4">
					<ul class="nav nav-tabs" role="tablist">
						<li class="active" role="presetation">
							<a href="#news" aria-controls="news" role="tab" data-toggle="tab">
							Our News
							</a>
						</li>
						<li role="presentation">
							<a href="#clients" aria-controls="clients" data-toggle="tab" role="tab">
								Clients
							</a>
						</li>
						<li role="presentation">
							<a href="#newsletter" aria-controls="newsletter" role="tab" data-toggle="tab">
								Newsletters
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" role="tabpanel" id="news">
					<div class="contanier">
						<br/><br/>
						<div class="row">
							<div class="col-sm-3">
								<img src="image/blog1.jpg"  class="img-responsive" alt="blog1.jpg"/>
								<div class="row">
									<div class="col-sm-10">
										<h5>VIX SUMO FERRI AN</h5>
										<p>
											Donec pede justo, fringilla vel, aliquet nec, vulputate eget, 
											arcu. In enim justo, rhoncus ut, imperdiet a [...]
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-8">
												<i class=" fa fa-calendar"></i>
												<span> July 10, 2013 | </span>
												<i class="fa fa-envelope-o"></i>
												<span> 4</span>
											</div>
											<div class="col-sm-3">
												<i class="fa fa-heart-o"></i>
												<i class="fa fa-facebook"></i>
											</div>
										</div>
									</div>	
								</div>
							</div>
							<div class="col-sm-3">
								<img src="image/blog2.jpg" alt="blog2.jpg"/>
								<div class="row">
									<div class="col-sm-10"
										<h5>DONEC VITAE SAPIEN</h5>
										<p>
											Donec pede justo, fringilla vel, aliquet nec, vulputate eget, 
											arcu. In enim justo, rhoncus ut, imperdiet a [...]
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-8">
												<i class=" fa fa-calendar"></i>
												<span> July 10, 2013 | </span>
												<i class="fa fa-envelope-o"></i>
												<span> 4</span>
											</div>
											<div class="col-sm-3">
												<i class="fa fa-heart-o"></i>
												<i class="fa fa-facebook"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<img src="image/blog3.jpg" alt="blog3.jpg"/>
								<div class="row">
									<div class="col-sm-10">
										<h5>AENEAN TELLUS METUS</h5>
										<p>
											Donec pede justo, fringilla vel, aliquet nec, vulputate eget, 
											arcu. In enim justo, rhoncus ut, imperdiet a [...]
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-8">
												<i class=" fa fa-calendar"></i>
												<span> July 10, 2013 | </span>
												<i class="fa fa-envelope-o"></i>
												<span> 4</span>
											</div>
											<div class="col-sm-3">
												<i class="fa fa-heart-o"></i>
												<i class="fa fa-facebook"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<img src="image/blog4.jpg" alt="blog4.jpg"/>
								<div class="row">
									<div class="col-sm-10">
										<h5>AENEAN TELLUS METUS</h5>
										<p>
											Donec pede justo, fringilla vel, aliquet nec, vulputate eget, 
											arcu. In enim justo, rhoncus ut, imperdiet a [...]
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-8">
												<i class=" fa fa-calendar"></i>
												<span> July 10, 2013 | </span>
												<i class="fa fa-envelope-o"></i>
												<span> 4</span>
											</div>
											<div class="col-sm-3">
												<i class="fa fa-heart-o"></i>
												<i class="fa fa-facebook"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane text-center" role="tabpanel" id="clients">
					<br/><br/>
					<h3>Our Clients</h3>
					<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet</p>
					<ul class="list-inline">
						<li><img src="image/white_logo1.png" alt="white_logo1.png"/></li>
						<li><img src="image/white_logo2.png" alt="white_logo2.png"/></li>
						<li><img src="image/white_logo3.png" alt="white_logo3.png"/></li>
						<li><img src="image/white_logo4.png" alt="white_logo4.png"/></li>
						<li><img src="image/white_logo5.png" alt="white_logo5.png"/></li>
					</ul>
				</div>
				<div class="tab-pane" role="presenter" id="newsletter">
					<br/><br/><br/>
					<div class="row">
						<div class="col-sm-5 col-sm-offset-4 text-center">
							<h3>Subscribe To Our NewsLetter</h3>
							<form>
								<div class="input-group">
									<input type="email" class="form-control" placeholder="Email.."/>
									<span class="input-group-btn">
										<button type="button" class="btn btn-default">
											<i class="fa fa-send"></i>
										</button>
									</span>
								</div>
							</form>
						</div>	
					</div>
					<div class="row">
						<br/>
						<div class="col-sm-5 col-sm-offset-4 text-center">
							<a href="#" class="text-danger">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
								</span>
							</a>
							<a href="#" class="text-danger">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
							</a>
							<a href="#" class="text-danger">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-skype fa-stack-1x fa-inverse"></i>
								</span>
							</a>
							<a href="#" class="text-danger">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-flickr fa-stack-1x fa-inverse"></i>
								</span>
							</a>
							<a href="#" class="text-danger">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 text-center">
					<img src="icon/closer_look.png" class="img-responsive center-block alt="closer_look.png"/>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1 text-center">
					<span class="lead">
						Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
						totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta 
						sunt explicabo.
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<img src="image/responsive-mockup2.png" class="img-responsive center-block" alt="responsive-mockup2.png"/>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<img src="icon/offer.png" class="img-responsive center-block" alt="offer.png"/>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 text-right">
						<div class="row">
							<div  class="col-sm-10">
								<h6><strong>RESPONSIVE DESIGN</strong></h6>
								<span>
									Cras sem erat, aliquet in egestas cursus, ullamcorper vitae ligula. Nunc commodo lacinia eros ac condimentum
								</span>
							</div>	
							<div class="col-sm-2">
								<h5>
									<img src="icon/responsive.png" alt="responsive.png"/>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-2">
								<h5>
									<img src="icon/retina.png" alt="retina.png"/>
								</h5>
							</div>
							<div class="col-sm-10">
								<h6><strong>RETINA READY</strong></h6>
								<span>
									Cras sem erat, aliquet in egestas cursus, ullamcorper vitae ligula. Nunc commodo lacinia eros ac condimentum
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 text-right">
						<div class="row">
							<div  class="col-sm-10">
								<h6><strong>VERY FLEXIBLE</strong></h6>
								<span>
									Cras sem erat, aliquet in egestas cursus, ullamcorper vitae ligula. Nunc commodo lacinia eros ac condimentum
								</span>
							</div>	
							<div class="col-sm-2">
								<h5>
									<img src="icon/flexible.png" alt="flexible.png"/>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-2">
								<h5>
									<img src="icon/multi.png" alt="multi.png"/>
								</h5>
							</div>
							<div class="col-sm-10">
								<h6><strong>MULTI PURPOSE</strong></h6>
								<span>
									Cras sem erat, aliquet in egestas cursus, ullamcorper vitae ligula. Nunc commodo lacinia eros ac condimentum
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 text-right">
						<div class="row">
							<div  class="col-sm-10">
								<h6><strong>UNLIMITED SKINS</strong></h6>
								<span>
									Cras sem erat, aliquet in egestas cursus, ullamcorper vitae ligula. Nunc commodo lacinia eros ac condimentum
								</span>
							</div>	
							<div class="col-sm-2">
								<h5>
									<img src="icon/skins.png" alt="skins.png"/>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-2">
								<h5>
									<img src="icon/animation.png" alt="animation.png"/>
								</h5>
							</div>
							<div class="col-sm-10">
								<h6><strong>ANIMATION READY</strong></h6>
								<span>
									Cras sem erat, aliquet in egestas cursus, ullamcorper vitae ligula. Nunc commodo lacinia eros ac condimentum
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 text-right">
						<div class="row">
							<div  class="col-sm-10">
								<h6><strong>WELL DOCUMENTED</strong></h6>
								<span>
									Cras sem erat, aliquet in egestas cursus, ullamcorper vitae ligula. Nunc commodo lacinia eros ac condimentum
								</span>
							</div>	
							<div class="col-sm-2">
								<h5>
									<img src="icon/document.png" alt="document.png"/>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-2">
								<h5>
									<img src="icon/tech.png" alt="tech.png"/>
								</h5>
							</div>
							<div class="col-sm-10">
								<h6><strong>LATEST TECHNOLOGY</strong></h6>
								<span>
									Cras sem erat, aliquet in egestas cursus, ullamcorper vitae ligula. Nunc commodo lacinia eros ac condimentum
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<img src="icon/full_testimonial.png" class="img-responsive center-block" alt="full_testimonial.png"/>
			</div>
		</div>
		<div class="container-fluid bg-warning">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<h5>
							<img src="image/main_logo.png" alt="main_logo.png"/>
						</h5>
						<span>
							Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
						</span>
						<span>
							Lorem ipsum dolor sit amet nec, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
						</span>
					</div>
					<div class="col-sm-3">
						<div class="row">
							<div class="col-sm-12">
								<h6><strong>RECENT TWEETS</strong></h6>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-1">
								<i class="fa fa-twitter fa-lg"></i>
							</div>
							<div class="col-sm-10">
								Grab a copy of the popular Boomerang theme for $10 until its next release!
							</div>
						</div>
						<div class="row">
							<div class="col-sm-11 col-sm-offset-1">
								<h6>2 days ago</h6>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-1">
								<i class="fa fa-twitter fa-lg"></i>
							</div>
							<div class="col-sm-10">
								Newest Blog Awesome post: Stacking Text and Icons 
								<a href="#">Check it</a>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-11 col-sm-offset-1">
								<h6>4 days ago</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<h6><strong>LINKS</strong></h6>
						<ul class="list-group">
							<li>
								<a href="#">Lorem Ipsum</a>
								<hr/>
							</li>
							<li>
								<a href="#">Dolor Sit Amet</a>
								<hr/>
							</li>
							<li>
								<a href="#">Nullam dignissim</a>
								<hr/>
							</li>
							<li>
								<a href="#">Lorem Ipsum</a>
								<hr/>
							</li>
							<li>
								<a href="#">Lorem Ipsum</a>
								<hr/>
							</li>
							<li>
								<a href="#">Dolor Sit Amet</a>
								<hr/>
							</li>
							<li>
								<a href="#">Dolor Sit Amet</a>
								<hr/>
							</li>
						</ul>
					</div>
					<div class="col-sm-3">
						<div class="row">
							<div class="col-sm-12">
								<h6><strong>PHOTOSTREAM</strong></h6>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<img src="image/b1.jpg" alt="b1.jpg"/>
							</div>
							<div class="col-sm-4">
								<img src="image/b2.jpg" alt="b2.jpg"/>
							</div>
							<div class="col-sm-4">
								<img src="image/b3.jpg" alt="b3.jpg"/>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-sm-4">
								<img src="image/b4.jpg" alt="b4.jpg"/>
							</div>
							<div class="col-sm-4">
								<img src="image/b5.jpg" alt="b5.jpg"/>
							</div>
							<div class="col-sm-4">
								<img src="image/b6.jpg" alt="b6.jpg"/>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-sm-4">
								<img src="image/b7.jpg" alt="b7.jpg"/>
							</div>
							<div class="col-sm-4">
								<img src="image/b8.jpg" alt="b8.jpg"/>
							</div>
							<div class="col-sm-4">
								<img src="image/b9.jpg" alt="b9.jpg"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row text-center bg-primary">
				<h6>&copy; 2013 Kanzi Theme | Theme Developed By ActiveAxon</h6>
			</div>
		</div>
	</body>
</html>