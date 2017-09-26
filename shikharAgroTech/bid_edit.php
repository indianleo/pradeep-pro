<!doctype html>
<html>
	<head>
		<title> Bid Edit | ABC NEWS EXPRESS </title>
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
				<h4>Edit Module</h4>
			</div>
		</div>
		<div class="container">
			<form method="post" action="app_action.php" enctype="multipart/form-data" >
				<input type="hidden" name="action" value="edit_bidItem"/>
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
						<label for="proxy">Proxy</label>
					</div>
					<div class="col-sm-2">
						Current Proxy : <?php echo  $data['proxy']; ?>
					</div>
					<div class="col-sm-4">
						<select name="proxy" id="proxy" class="form-control">
							<option value="<?php echo $data['proxy']; ?>">Select Proxy</option>
							<option value="On">On</option>
							<option value="Off">Off</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="item_name">Item Name</label>
					</div>
					<div class="col-sm-6">
						<input type="text" name="item_name" id="item_name" class="form-control" placeholder="Item Name" value="<?php echo $data['item_name'] ?>"/>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="item_pic">Item Image</label>
					</div>
					<div class="col-sm-2">
						<input type="hidden" name="current_pic" id="current_pic" value="<?php echo $data['item_pic'] ?>"/>
						<img src="<?php echo $data['item_pic']; ?>" alt="Item Picture" class="img-responsive" />
					</div>
					<div class="col-sm-6">
						<input type="file" name="item_pic" id="item_pic" placeholder="Item Image" />
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="item_info">Item Info</label>
					</div>
					<div class="col-sm-6">
						<textarea name="item_info" id="item_info" class="form-control" placeholder="Item Info"> <?php echo $data['item_info'] ?></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label for="bid_state">Bid State</label>
					</div>
					<div class="col-sm-2">
						Current State : <?php echo  $data['bid_state']; ?>
					</div>
					<div class="col-sm-4">
						<select name="bid_state" id="bid_state" class="form-control">
							<option value="<?php echo $data['bid_state']; ?>">Select State</option>
							<option value="Live">Live</option>
							<option value="Upcoming">Upcoming</option>
						</select>
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
		