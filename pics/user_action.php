<?php 
	$str=$_REQUEST['str'];
	switch($str)
	{
		case 'profile': profile();
		break;
		case 'lib': lib();
		break;
		case 'upload_img': upload_img();
		break;
		case 'upload_docs': upload_docs();
		break;
		default : def();
		break;
	}
	function profile()
	{
		?>
			<div class="row profile_box page_height" id="profile">
				<div class="col in_profile">
					<div class="row">
						<div class="col owener_icon">
							<img src="image/owener.jpg" alt="owener_icon"/>
						</div>
						<div class="col title">
							<div class="row">Anamika Singh</div>
							<div class="row">singh.anamika.19.01@gmail.com</div>
						</div>
					</div>
					<div class="row">
						<div class="col profile_tag">Date Of Birth:</div><div class="col">19/05/1992</div>
					</div>
					<div class="row">
						<div class="col profile_tag">Qualifcation:</div><div class="col">MCA</div>
					</div>
					<div class="row">
						<div class="col profile_tag">Collage:</div><div class="col">SHIATS</div>
					</div>
					<div class="row">
						<div class="col profile_tag">Home Town:</div><div class="col">ALlahabad</div>
					</div>
					<div class="row">
						<div class="col profile_tag">Current Town:</div><div class="col">Banglore</div>
					</div>
				</div>
			</div>
		<?php
	}
	function lib()
	{
		$user=$_SESSION['user'];
		$con=mysqli_connect("mysql.hostinger.in","u728032163_annie","786pradeep","u728032163_pics");
		$res=mysqli_query($con,"select * from pic where user_name='$user'");
		 ?>
		  <div id="container">
			 <?php while($ans=mysqli_fetch_assoc($res))
			  { 
				?>
		 <div class="grid">
			<div class="imgholder">
				<img src="<?php echo $ans['path'];?>" />
			</div>
			<strong><?php echo $ans['title'];?></strong>
			<p><form method="post" action="del.php">
				   <input type="hidden" name="id" value="<?php echo $ans['id'];?>" >
				   <input type="hidden" name="table" value="pic" >
				   <input type="submit" value="Delete">
				  </form></p>
			<div class="meta"><?php echo "by ".$ans['user_name'];?></div>
		</div>
		 <?php } ?>		
		</div> 
			<?php
	}
	function upload_img()
	{
		?>
			<div class="row upload_img_box page_height" id="upload_img">
				<div class="col in_upload_img">
					<div class="back_cover"></div>
					<form method="post" action="process2.php" >
						<input type="hidden" name="user_action" value="upload_img"/>
						<div class="row">
							<div class="col form_tag">
								<label for="title">Title</label>
							</div>
							<div class="col">
								<input type="text" name="title" class="form_space" id="title" placeholder="Image Title"/>
							</div>
						</div>
						<div class="row">
							<div class="col form_tag">
								<label for="cat_text">Category</label>
							</div>
							<div class="col">
								<input type="text" name="cat_text" class="form_space" id="cat_text" placeholder="Category"/>
							</div>
						</div>
						<div class="row">
							<div class="col form_tag">
								<label for="fileup">Upload File</label>
							</div>
							<div class="col">
								<input type="file" name="fileup" class="form_space" id="fileup" placeholder="Upload Image"/>
							</div>
						</div>
						<div class="row">
							<div class="col form_tag">
							</div>
							<div class="col">
								<input type="submit" name="img_ok_btn" class="form_space" id="img_ok_btn" value="Upload Image"/>
							</div>
						</div>
					</form>
				</div>
		    </div>
		<?php
		
	}
	function upload_docs()
	{
		?>
			<div class="row upload_doc_box page_height" id="upload_docs">
				<div class="col in_upload_img">
					<div class="back_cover_upload"></div>
					<form method="post" action="user_process.php">
						<input type="hidden" name="user_action" value="upload_docs"/>
						<div class="row">
							<div class="col form_tag">
								<label for="doc_title">Title</label>
							</div>
							<div class="col">
								<input type="text" name="doc_title" class="form_space" id="doc_title" placeholder="Image Title"/>
							</div>
						</div>
						<div class="row">
							<div class="col form_tag">
								<label for="doc_cat_text">Category</label>
							</div>
							<div class="col">
								<input type="text" name="doc_cat_text" class="form_space" id="doc_cat_text" placeholder="Category"/>
							</div>
						</div>
						<div class="row">
							<div class="col form_tag">
								<label for="doc_file">Upload File</label>
							</div>
							<div class="col">
								<input type="file" name="doc_file" class="form_space" id="doc_file" placeholder="Upload Docs"/>
							</div>
						</div>
						<div class="row">
							<div class="col form_tag">
							</div>
							<div class="col">
								<input type="submit" name="doc_ok_btn" class="form_space" id="doc_ok_btn" value="Upload Docs"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php
	}
	function def()
	{
		echo "<h5 style='font-size:30px;position:absolute;top:33%;left:35%'>function is not working!!!!</h5>";
	}