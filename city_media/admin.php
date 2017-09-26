<!doctype html>
<html>
	<head>
	    <?php include_once('header.html'); ?>
	    <style>
		    .update_form_box .row{
		    	padding-top: 15px;
		    }
		    .update_form_header{
		    	border-top: 2px solid #009999;
		    }
		    .update_form_header h3{
		    	line-height: 6px;
		    }
	    </style>
	</head>
	<body class="bg_back">
		<div style="position: fixed;z-index: 99999;">
			<?php include_once('menu.html'); ?>
		</div>

		<div class="container-fluid" style="height:100px;">
		</div>
		
		<div class="container text-center">
			<h1>Welcome Admin</h1>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="update_form_box bg_white box_bottom top_radius">
						<div class="update_form_header box_bottom bg_white height50 text-center top_radius">
							<h3>News Update Form</h3>
						</div>
						<br/>
						<form method="post" action="upload.php" enctype="data/x-part">
							<div class="row">
								<div class="col-sm-2">
									<label for="update_date">Date</label>
								</div>
								<div class="col-sm-9">
									<input type="date" name="update_date" id="update_date" class="update_input form-control" placeholder="Select Date" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label for="update_city">City</label>
								</div>
								<div class="col-sm-9">
									<select name="update_city" id="update_city" class="update_input form-control" >
										<option value="none">Select City</option>
										<option value="Allahabad">Allahabad</option>
										<option value="Lucknow">Lucknow</option>
										<option value="Delhi">Delhi</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label for="update_cover"></label>
								</div>
								<div class="col-sm-9">
									<input type="file" name="update_cover" id="update_cover" class="update_input form-control" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label for="update_heading">Heading</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="update_heading" id="update_heading" class="update_input form-control" placeholder="Enter Heading" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label for="update_content">Content</label>
								</div>
								<div class="col-sm-9">
									<textarea name="update_content" id="update_content" class="update_input form-control" placeholder="News Content" ></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label for="update_files1">Image/Video 1</label>
								</div>
								<div class="col-sm-9">
									<input type="file" name="update_files1" id="update_files1" class="update_input form-control" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label for="update_file2s">Image/Video 2</label>
								</div>
								<div class="col-sm-9">
									<input type="file" name="update_files2" id="update_files2" class="update_input form-control" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label for="update_files3">Image/Video 3</label>
								</div>
								<div class="col-sm-9">
									<input type="file" name="update_files3" id="update_files3" class="update_input form-control" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
								</div>
								<div class="col-sm-9">
									<input type="submit" id="update_submit" class="btn btn-success" />
									<input type="reset" id="update_reset" class="btn btn-danger" />
								</div>
							</div>
						</form>
						<br/>
					</div>
				</div>
			</div>
		</div>

		<!------------------------------------End-------------------------------------------->
		<br/>
		<div class="footer">
		       <?php include_once('footer.html'); ?>
		</div>
	</body>
</html>