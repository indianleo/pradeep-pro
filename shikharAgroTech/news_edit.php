<!doctype html>
<html>
	<head>
		<title> News Edit | ABC NEWS EXPRESS </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	</head>
	<body>
		<?php
			//$con = mysqli_connect("localhost","abcnewse_db","786Anamika","abcnewse_db");
	
			// testing purpose only
			$con = mysqli_connect("localhost","root","","shikhar");
			foreach ($_REQUEST as $key => $value) {
			  $data[$key] = $value;
			}
		?>
		<div class="container">
			<div class="alert alert-info text-center">
				<h4>Edit News</h4>
			</div>
		</div>
		<div class="container">
			<form method="post" action="app_action.php" enctype="multipart/form-data" >
				<input type="hidden" name="action" value="edit_news"/>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="bid_id">Id</label>
					</div>
					<div class="col-sm-6">
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
						<input type="text" name="bid_id" id="bid_id" class="form-control" placeholder="Bid Id" value="<?php echo $data['id']; ?>" disabled/>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="news_title">News Title</label>
					</div>
					<div class="col-sm-6">
						<input type="text" name="news_title" id="news_title" class="form-control" placeholder="News Title" value="<?php echo $data['news_title'] ?>" />
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="new_news_pic">News Image</label>
					</div>
					<div class="col-sm-2">
						<input type="hidden" name="current_pic" id="current_pic" value="<?php echo $data['current_pic'] ?>"/>
						<img src="<?php echo $data['news_pic']; ?>" alt="News Picture" class="img-responsive" />
					</div>
					<div class="col-sm-6">
						<input type="file" name="new_news_pic" id="new_news_pic" placeholder="News Image" />
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="news_info">News Info</label>
					</div>
					<div class="col-sm-6">
						<textarea name="news_info" id="news_info" class="form-control" placeholder="News Info"> <?php echo $data['news_info'] ?></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="news_by">Upload By</label>
					</div>
					<div class="col-sm-6">
						<input type="text" name="news_by" id="news_by" class="form-control" placeholder="Upload By" value="<?php echo $data['news_by'] ?>" />				
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="news_place">News Source</label>
					</div>
					<div class="col-sm-6">
						<input type="text" name="news_place" id="news_place" class="form-control" placeholder="News Source" value="<?php echo $data['news_place'] ?>" />				
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="news_cat">News Category</label>
					</div>
					<div class="col-sm-2">
						Current Category : <?php echo  $data['news_cat']; ?>
					</div>
					<div class="col-sm-4">
						<select name="news_cat" id="news_cat" class="form-control">
							<option value="<?php echo $data['news_cat']; ?>">Select Category</option>
							<option value="latest">Latest</option>
							<option value="state">State</option>
							<option value="sports">Sports</option>
							<option value="marketing">Bssiness</option>
							<option value="national">National</option>
							<option value="international">International</option>
							<option value="education">Education</option>
							<option value="entertainment">Entertainment</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="news_date">News Date</label>
					</div>
					<div class="col-sm-6">
						<input type="date" name="news_date" id="news_date" class="form-control" placeholder="News Date" value="<?php echo $data['news_date'] ?>" />				
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-6 col-sm-offset-2">
						<input type="submit" name="submit_btn" id="submit_btn" class="btn btn-warning" value="Update" />
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
		