<!DOCTYPE HTML>
<html>
<head>
	<?php include_once('html/header.html'); ?>
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
    <!-- light-box -->
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
   <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

		});
	</script>
</head>
<body>
	<div class="header">
		<?php include_once('html/menu.html'); ?>
	</div>

    <div class="main">
      	<div class="shop_top">
			<div class="container">

				<div class="row ex_box">
					<div class="col-sm-6">
						<div style="text-align:center;width:300px;height:100px;box-shadow:0 0 10px 2px #ccc;">
							<h4 style="border-radius:2px 2px 0 0;background:#ccc;height:40px;box-shadow:0 0 1px 2px #ccc;">
								<span style="line-height:35px;color:#990000;"> Plot Rate </span>
							</h4>
							<span> 2222 sq/ft</span>
						</div>
					</div>
					<div class="col-sm-4">
						<h3 class="m_2">ADA APPROVED</h3>
						<div class="img_section magnifier2">
							<a class="fancybox" href="images/30X60 WITH SERVANT ROOM/site plan.jpg" data-fancybox-group="gallery" title="Site-plan">
								<img src="images/30X60 WITH SERVANT ROOM/site plan.jpg" class="img-responsive" alt="">
								<span> </span>
								<div class="img_section_txt">
									Site-plan
								</div>
							</a>
						</div>
					</div>
				</div>		
				<!--
				<div class="row">
					<h4 class="m_11">Related Products </h4>
					<div class="col-md-4 product1">
						<img src="images/30X60 WITH SERVANT ROOM/01 (12).jpg" class="img-responsive" alt=""/> 
						<div class="shop_desc"><a href="single.html">
							</a><h3><a href="single.html"></a><a href="GROUP HOSHING.php">Group Houshing</a></h3>
							<p>Available in 3BHK, 2BHK, 1BHK </p>
							<span class="actual">Coming soon</span><br>
							<ul class="buttons">
								<li class="shop_btn"><a href="GROUP HOSHING.php">Read More</a></li>
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
					<div class="col-md-4 product1">
						<img src="images/30X60 WITH SERVANT ROOM/full.jpg" style="height: 237px;width: 360px;" class="img-responsive" alt=""/> 
						<div class="shop_desc"><a href="single.html">
							</a><h3><a href="single.html"></a><a href="LUXURY VIILA.php">Luxury Viila</a></h3>
							<p>High class luxury villas </p>
							<span class="actual">1.15Lakh</span> and
							<span class="actual">1.10Lakh</span><br>
							<ul class="buttons">
								<li class="shop_btn"><a href="LUXURY VIILA.php">Read More</a></li>
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<img src="images/22x45 row/01 (15).jpg" class="img-responsive" alt=""/> 
						<div class="shop_desc"><a href="single.html">
							</a><h3><a href="single.html"></a><a href="ROW HOUSHING.php">Row Houshing</a></h3>
							<p>Your Home in Row Houshing </p>
							<span class="actual">450000 Lakh</span><br>
							<ul class="buttons">
								<li class="shop_btn"><a href="ROW HOUSHING.php">Read More</a></li>
								<div class="clear"> </div>
							</ul>
						</div>
					</div>
				</div>
				-->
				
				<div class="row">
					<div class="col-sm-12">
						<div style="box-shadow:0 0 10px 2px #ccc; padding-bottom:30px;margin-top:30px;">
							<h3 style="border-radius:2px 2px 0 0;background:#ccc;height:50px;box-shadow:0 0 1px 2px #ccc;">
								<span style="padding-left:20px;line-height:50px;color:#990000;">
									Project Specification 
								</span>
							</h3>
							<ul style="padding-left:50px;">
								<li>
									<span>
										Well ADA approved project with bank finance facilities.
									</span>
								</li>
								<li>
									<span>
										Main road 40 fit with domar road.
									</span>
								</li>
								<li>
									<span>
										Internal road 30 fit.
									</span>
								</li>
								<li>
									<span>
										Developed parks and playgrounds.
									</span>
								</li>
								<li>
									<span>
										Overhead electric supply.
									</span>
								</li>
								<li>
									<span>
										Water disposel networks.
									</span>
								</li>
								<li>
									<span>
										Smart drainage system.
									</span>
								</li>
								<li>
									<span>
										Gated colony well proof security facilities.
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>

	     	</div>
		</div>
	</div>

	<div class="footer">
		<?php include_once('html/footer.html'); ?>
	</div>
</body>	
</html>