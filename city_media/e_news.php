<!doctype html>
<html>
	<head>
	    <?php include_once('header.html'); ?>
	    <link rel="stylesheet" href="news.css" type="text/css"/>
	</head>
	<body class="bg_back">
		<div style="position: fixed;z-index: 999999;">
			<?php include_once('menu.html'); ?>
		</div>
		<div style="height:90px;">
		</div>
		<div class="bg_back" style="padding-top:10px;padding-bottom: 20px;position: fixed;top:70px;z-index: 99999;width: 100%;">
			<div class="row">
					<div class="col-sm-6">
						<div class="local_menu_box">
							<div class="col-sm-2 news_menu btn btn-info" onclick="loadNews('sports')">
								Sports
							</div>
							<div class="col-sm-2 news_menu btn btn-info" onclick="loadNews('politics')">
							   	Poitics
							</div>
							<div class="col-sm-2 news_menu btn btn-info" onclick="loadNews('crime')">
							   	Crime
							</div>
							<div class="col-sm-2 news_menu btn btn-info" onclick="loadNews('business')">
							   	Business
							</div>
							<div class="col-sm-2 news_menu btn btn-info" onclick="loadNews('accidents')">
							   	Entertainments
							</div>
							<div class="col-sm-2 news_menu btn btn-info" onclick="loadNews('videos')">
							   Education
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-3">
								<select class="form-control" onchange="check_city(this)" id="city_list">
									<option value="none">Select City</option>
									<option value="Allahabad">Allahabad</option>
									<option value="Lucknow">Lucknow</option>
									<option value="Delhi">Delhi</option>
								</select>
							</div>
							<div class="col-sm-9">
								<div class="input-group">
								    <input type="search" class="form-control" id="search_news" aria-describedby="search_news" placeholder="Search News" />
								    <span class="input-group-addon btn btn-danger" onclick="search_news('search_news')">Search</span>
								 </div>
							</div>
						</div>
					</div>
			</div>
				
		</div>

		<!-- container for news responce -->
		<div class="container" id="main">

			<div class="row">
				<div class="col-sm-12 board bg_white box_bottom top_radius" style="border-top:2px solid red;">
					<br/>
					<div class="margin-vertical news_heading">
							<h3>News Heading</h3>
					</div>
					<div class="news_cover">
					    <img src="image/news.jpg" class="img-responsive box_bottom" alt="lifestyle"/>
					</div>
					<div class="margin-vertical">
						<span class="news_content">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</span>
					</div>
					<br/>
				</div>
			</div>

			<br/>

			<div class="row">
				<div class="col-sm-12 board bg_white box_bottom top_radius" style="border-top:2px solid purple;">
					<br/>
					<div class="margin-vertical news_heading">
							<h3>News Heading</h3>
					</div>
					<div class="news_cover">
					    <img src="image/news2.jpg" class="img-responsive box_bottom" alt="lifestyle"/>
					</div>
					<div class="margin-vertical">
						<span class="news_content">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</span>
					</div>
					<br/>
					<h3 class="related_title">Related Gallary:</h3>
					<div class="margin-vertical news_footer_box">
						<div class="row">
							<div class="col-sm-4">
								<img src="image/lifestyle1.jpg" class="img-responsive" alt="news footer image"/>
							</div>
							<div class="col-sm-4">
								<img src="image/lifestyle1.jpg" class="img-responsive" alt="news footer image"/>
							</div>
							<div class="col-sm-4">
								<img src="image/lifestyle1.jpg" class="img-responsive" alt="news footer image"/>
							</div>
						</div>
					</div>
					<br/>
				</div>
			</div>

		</div>
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~ end container ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

		<!------------------------------------End-------------------------------------------->
		<br/>
		<div class="footer">
		       <?php include_once('footer.html'); ?>
		</div>
		<script>
			var city = "";
			function loadNews( keyword ) {
				alert(keyword);
			}
			function search_news(id) {
				alert(document.getElementById(id).value);
			}
			function check_city(ref) {
				city = document.getElementById(ref.id).value;
				alert(city);	
			}
			function news_synch(){

			}
		</script>
	</body>
</html>