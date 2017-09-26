<!doctype html>
<html>
	<head>
	    <?php include_once('header.html'); ?>
	    <link rel="stylesheet" href="home.css" type="text/css"/>
	</head>
	<body class="bg_back">
		<div style="position: fixed;z-index: 99999;">
			<?php include_once('menu.html'); ?>
		</div>
		<div style="height: 100px;"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="free_add_form_box box_gray top_radius bg_white" style="padding-top: 20px;border-top:2px solid purple;">
						<form action="process.php" method="post">
							<input type="hidden" name="action" value="free_add" />
							<div class="row">
								<div class="col-sm-3 form-group">
									<label for="name">Name</label>
								</div>
								<div class="col-sm-8 form-group">
									<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required />
								</div>
							</div>	
							<div class="row">
								<div class="col-sm-3 form-group">
									<label for="post">Designation</label>
								</div>
								<div class="col-sm-8 form-group">
									<input type="text" name="post" id="post" class="form-control" placeholder="Enter Designation" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label for="adress">Address</label>
								</div>
								<div class="col-sm-8 form-group">
									<textarea name="adress" id="adress" class="form-control" placeholder="Enter Address" required></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label for="email">Email</label>
								</div>
								<div class="col-sm-8 form-group">
									<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required/>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label for="mobile">Mobile</label>
								</div>
								<div class="col-sm-8 form-group">
									<input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile No." required />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
									<label for="need">Requirement</label>
								</div>
								<div class="col-sm-8 form-group">
									<input type="text" name="need" id="need" class="form-control" placeholder="Enter Requirement." />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 form-group">
								</div>
								<div class="col-sm-8 form-group">
									<div class="col-sm-6">
										<input type="submit" name="submit_btn" id="submit_btn" class="form-control btn btn-success" value="Submit" />
									</div>
									<div class="col-sm-6">
										<input type="reset" name="clear_btn" id="clear_btn" class="form-control btn btn-danger" value="Clear" />
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-6">
						<div class="contact_box">
							<h3>Office</h3>
							<p>
								60p/44 Nawab Yusuf  Road,
							</p>
							<p>
							 	Civil Line, 
							</p>
							<p>
							 	Allahabad 211001
							</p>
							<p>
								<b>Mobile No. :</b> 9307150666
							</p>
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