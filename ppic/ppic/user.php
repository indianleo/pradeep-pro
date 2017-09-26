<?php 
 session_start();
 $con=mysqli_connect("localhost","root","","ppic");
 $user=$_SESSION['user'];
  if(!isset($_SESSION['user']))
  {
   header("location:index.php");
   }
   ?>
<!doctype html>
<html lang="en">
<head>
<title>Online Photo Album</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="im/photo-icon.png">
<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="user.js"></script>
<script type="text/javascript" src="js/blocksit.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/preloader.css">
<link rel="stylesheet" type="text/css" href="user.css">
<link rel="stylesheet" type="text/css" href="menu.css">
  <link rel="stylesheet" type="text/css" href="css/bloksit.css">
</head>
<body>
 <?php include("preloader.php");?>
 <div id="menu">
 <?php include('menu-u.php');?>
 </div>
 <div id="body_cover">
 </div>
 <div class="box">
    <?php 
	      $res=mysqli_query($con,"select * from profile where user_name='$user'");
		  $ans=mysqli_fetch_assoc($res); ?>	
    <div id="info">
	<span class="inf" id="pro_pic">
     <img src="<?php echo $ans['pro'];?>" alt="Profile Pic" title="Profile Pic"/>
	 </span>
	 <span class="inf" id="pro_name"><?php echo $user;?></span>
    </div>
 </div>
 <div class="box">
   <div id="create-a">
     <div id="act-m">
	  <div>
	   <div class="a-m"  id="pic_inact" onclick="viewbox2('pic_up')">
	    <h2>Photo</h2>
	   </div>
       <div class="a-m" id="doc_actin" onclick="viewbox2('doc_act')" >
        <h2>Document</h2>
       </div>
	  </div> 
     </div>	
	 <div id="view-c">
	 
	 </div>
	 <div id="pre">
	 <iframe name="upload_iframe" id="upload_iframe" ></iframe>
	 <span class="pre_p" id="picture_error"></span>
     <div class="pre_p" id="picture_preview"></div>
	 </div>
   </div>	 
 </div>
 
 <div class="box">
    <div id="edit-s">
	 <div id="new_file">
     <h2><b><u>PHP PICTURE PROCESSOR</u></h2>
	     <form action="picproc.php" method="post" enctype="multipart/form-data">
             <table id="file-t">		 
		     <tr>
			 <th>NAME</th><td><input type="text" placeholder="Image" name="f_name"></td>
			 </tr>
             <tr> 			 
		     <th>UPLOAD</th><td><input type="file" name="pic_u" size="1"></td>
			 </tr>
			 <tr>
			 <th> ACTION</th><td><select name='a'>
                                    <option value=0>No Action</option>
									<option value=1>Sharpen</option>
									<option value=2>Blur</option>
									<option value=3>Brighten</option>
									<option value=4>Darken</option>
									<option value=5>More Contrast</option>
									<option value=6>Less Contrast</option>
									<option value=7>Greyscale</option>
									<option value=8>Invert</option>
									<option value=9>Reder</option>
									<option value=10>Greener</option>
									<option value=11>Bluer</option>
									<option value=12>Edge Detect</option>
									<option value=13>Emboss</option>
									<option value=14>Sketchify</option>
								  </select></td>
			 </tr>	
			 <tr>
			  <th rowspan="1">RESIZE</th>
			  <td>W <input type='text' name='w' size='1'> H <input type='text' name='h' size='1'></td>
			  </tr>
			 <tr>
		     <td></td><td><input type="submit" value="Process"></td>
			 </tr>
			 </table>
		 </form>
	 </div>
   </div>
 </div>
 <div class="box">
  <div id="view-s">
    <div id="view-m">
	  <div>
	   <div class="v-m" onclick="viewbox('edited_pic')">
	    <h2>Edited</h2>
	   </div>
	   <div class="v-m" onclick="viewbox('up_pic')" >
	    <h2>Uploaded</h2>
	   </div>
       <div class="v-m" onclick="viewbox('document')" >
        <h2>Document</h2>
       </div>
	  </div> 
	</div>
	  <div id="view_up">
	   <h1>View User's file</h1>
	  </div>
   </div>
 </div>
	 
 
 </body>
 </html>

