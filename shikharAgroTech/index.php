<!DOCTYPE HTML>
<html>
	<head>
		<?php include_once('html/header.html') ?>
        <!--<script src="js/jquery.easydropdown.js"></script>-->
        <!--start slider -->
        <link rel="stylesheet" href="css/fwslider.css" media="all">
        <script src="js/fwslider.js"></script>
        <!--end slider -->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".dropdown img.flag").addClass("flagvisibility");

                $(".dropdown dt a").click(function() {
                    $(".dropdown dd ul").toggle();
                });
                            
                $(".dropdown dd ul li a").click(function() {
                    var text = $(this).html();
                    $(".dropdown dt a span").html(text);
                    $(".dropdown dd ul").hide();
                    $("#result").html("Selected value is: " + getSelectedValue("sample"));
                });
                            
                function getSelectedValue(id) {
                    return $("#" + id).find("dt a span.value").html();
                }

                $(document).bind('click', function(e) {
                    var $clicked = $(e.target);
                    if (! $clicked.parents().hasClass("dropdown"))
                        $(".dropdown dd ul").hide();
                });


                $("#flagSwitcher").click(function() {
                    $(".dropdown img.flag").toggleClass("flagvisibility");
                });
            });
        </script>
	</head>
	<body>

		<div class="header">
			<?php include_once('html/menu.html') ?>
		</div>

		<div class="banner">
			<!-- start slider -->
			<div id="fwslider">
				<div class="slider_container">
					<div class="slide"> 
						<!-- Slide image -->
						<img src="images/slider1.jpg" class="img-responsive" alt=""/>
						<!-- /Slide image -->
						<!-- Texts container -->
						<div class="slide_content">
							<div class="slide_content_wrap">
								<!-- Text title -->
								<h3 class="title">Turning Dreams into Reality.</h3>
								<!-- /Text title -->
								<div class="button"><a href="#">See Details</a></div>
							</div>
						</div>
						<!-- /Texts container -->
					</div>
					<!-- /Duplicate to create more slides -->
					<div class="slide">
						<img src="images/slider2.jpg" class="img-responsive" alt=""/>
						<div class="slide_content">
							<div class="slide_content_wrap">
								<h1 class="title">Dare to Dream will to Sustain Power to Deliver.</h1>
								<div class="button"><a href="#">See Details</a></div>
							</div>
						</div>
					</div>
					<div class="slide">
						<img src="images/slider3.jpg" class="img-responsive" alt=""/>
						<div class="slide_content">
							<div class="slide_content_wrap">
								<h1 class="title">Footprints across 27cittes in 8state.</h1>
								<div class="button"><a href="#">See Details</a></div>
							</div>
						</div>
					</div>
					<div class="slide">
						<img src="images/slider4.jpg" class="img-responsive" alt=""/>
						<div class="slide_content">
							<div class="slide_content_wrap">
								<h1 class="title">Delivered over 95.2 mn sq.ft.</h1>
								<div class="button"><a href="#">See Details</a></div>
							</div>
						</div>
					</div>
					<div class="slide">
						<img src="images/slider5.jpg" class="img-responsive" alt=""/>
							<div class="slide_content">
								<div class="slide_content_wrap">
									<h1 class="title">Transforming small cites with big ideas.</h1>
									<div class="button"><a href="#">See Details</a></div>
								</div>
							</div>
					</div>
					<!--/slide -->
				</div>
				<div class="timers"></div>
				<div class="slidePrev"><span></span></div>
				<div class="slideNext"><span></span></div>
			</div>
			<!--/slider -->
		</div>

		<div class="content-bottom">
			<div class="container">
				<div class="row content_bottom-text">
				<div class="col-md-7">
					<h3>Delivered over 95.20 mn. sq.</h3>
				</div>
				</div>
			</div>
		</div>
		<!--
		<div class="features">
			<div class="container">
				<h3 class="m_3">PROJECTS</h3>
				
				<div class="row">
					
					<div class="col-md-3 top_box">
						<div class="view view-ninth"><a href="#">
						<img src="images/30X60 WITH SERVANT ROOM/Full2.jpg" class="img-responsive" alt=""/>
						<div class="mask mask-1"> </div>
						<div class="mask mask-2"> </div>
						<div class="content">
							<h2>LUXURY VIILA</h2>
							<p>Only 8km From Railway Juction.</p>
						</div>
						</a> </div>
					<h4 class="m_4"><a href="LUXURY VIILA.php">LUXURY VIILA</a></h4>
					</div>
					<div class="col-md-3 top_box">
						<div class="view view-ninth"><a href="#">
						<img src="images/30X60 WITH SERVANT ROOM/01 (12).jpg" class="img-responsive" alt=""/>
						<div class="mask mask-1"> </div>
						<div class="mask mask-2"> </div>
						<div class="content">
							<h2>GROUP HOUSHING</h2>
							<p>Only 8km From Railway Juction.</p>
						</div>
						</a> </div>
					<h4 class="m_4"><a href="GROUP HOSHING.html">GROUP HOUSHING</a></h4>
					</div>
					<div class="col-md-3 top_box1">
						<div class="view view-ninth"><a href="#">
						<img src="images/pic4.jpg" class="img-responsive" alt=""/>
						<div class="mask mask-1"> </div>
						<div class="mask mask-2"> </div>
						<div class="content">
							<h2>AFFORDABLE PLOTS</h2>
							<p>Only 8km From Railway Juction.</p>
						</div>
						</a> </div>
					<h4 class="m_4"><a href="PLOTS.html">AFFORTABLE PLOTS</a></h4>
					</div>
					<div class="col-md-3 top_box">
						<div class="view view-ninth"><a href="#">
						<img src="images/22x45 row/01 (15).jpg" class="img-responsive" alt=""/>
						<div class="mask mask-1"> </div>
						<div class="mask mask-2"> </div>
						<div class="content">
							<h2>ROW HOUSHING</h2>
							<p>Only 8km From Railway Juction.</p>
						</div>
						</a> </div>
					<h4 class="m_4"><a href="ROW HOUSHING.php">ROW HOUSHING</a></h4>
					</div>
				</div>
			</div>
		</div>
			-->
		<div class="footer">
			<?php include_once('html/footer.html'); ?>
		</div>
	</body>	
</html>