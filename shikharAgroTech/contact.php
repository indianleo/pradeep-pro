<!DOCTYPE HTML>
<html>
	<head>
		<?php include_once('html/header.html'); ?>
		<style>
			.title{
				border-left:2px solid #E25050;
				padding:5px 5px 5px 8px;
				border-radius:2px;
				box-shadow:4px 4px 8px 1px #ccc;
			}
		</style>
	</head>
	<body>
		<div class="header">
			<?php include_once('html/menu.html'); ?>
		</div>
	    <div class="main">
      		<div class="shop_top">
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-sm-7">
				  			<div class="map">
								<img src="images/other/KEY PLAN (2).jpg" class="img-responsive" style="width:678px; height:445px;">
				  			</div>
						</div>
						<div class="col-md-5 col-sm-5">
							<h2 class="m_8 title">CORPORATE OFFICE</h2>
							<div class="address">
				                <p>Shikhar Agrotech Pvt. Ltd.,</p>
						   		<p>Near Sungam Palace,</p>
						   		<p>ALLAHABAD</p>
				   				<p>Phone:+91-9455484472</p>
				   		
				 	 			<p>Email: <span>support@shikharagrotech.com</span></p>
				   				<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   			</div>
							   <br/>
						</div>
						<div class="col-md-5 col-sm-5">
							<h2 class="m_8 title">ACTUAL SIDE LOCATION </h2>
							<div class="address">
				                <p>Shikhar Agrotech Pvt. Ltd.,</p>
						   		<p>Pipal gaon Near Khal Gaon ublic School</p>
						   		<p>ALLAHABAD</p>
								<p>Phone:+91-9455484472</p>
								
								<p>Email: <span>support@shikharagrotech.com</span></p>
								<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 contact">
				   			<form enctype="multipart/form-data" method="post" action="mail.php" id="contactform">
								<h3>Sales Enquery...! </h3>
								<div class="to">
									<input type="text" class="text" value="Name" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Name';}">
									<input type="text" class="text" value="Email" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Email';}">
									<input type="text" class="text" value="Subject" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Subject';}">
								</div>
								<div class="text">
									<textarea value="Message:" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Message';}">Message:</textarea>
									<div class="form-submit">
										<input name="submit" type="submit" id="submit" value="Submit"><br>
									</div>
								</div>
								<div class="clear"></div>
							</form>
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