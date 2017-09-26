<!doctype html>
<html>
	<head>
		<title>search</title>
		<script src="jquery-2.1.1.js"></script>
		<script src="bootstrap.js"></script>
		<link rel="stylesheet" href="bootstrap.css" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container-fluid">
			<?php include('menu.html');?>
		</div>
	    <div class="container jumbotron">
			<form action="#" method="post">
				<div class="form-group">
					<label for="ser">Search</label>
					<input type="search" name="ser" class="form-control" id="ser" placeholder="enter search"/>
				</div>
				<div class="form-group">
					<input type="submit" name="btn" class="form-control" id="btn"/>
				</div>
			</form>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<span class="bg-info">sunday monday tuesday wednsday thursday friday sutrday</span>
					<i class="fa fa-heart-o fa-5x"></i>
				</div>
				<div class="col-sm-4">
					<span class="bg-danger">jan feb march april may june july august september octuber novmber december </span>
				</div>
				<div class="col-sm-5">
					<span class="btn btn-info"> today</span> 
					<span class="btn btn-danger btn-sm">love u</span>
					<span class="btn btn-success btn-lg">missi munnu</span>
				</div>
			</div>
		</div>	
    </body>
</html>	
					