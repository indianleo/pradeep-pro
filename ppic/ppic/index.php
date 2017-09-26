<!doctype html>
<html lang="en">
	<head>
		<title>Online Photo Album</title>
		<?php session_start();
		$con=mysqli_connect("localhost","root","","ppic");?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">  
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
		<script type="text/javascript" src="index.js"></script>
		<script type="text/javascript" src="js/blocksit.min.js"></script>
		<link rel="icon" type="image/x-icon" href="im/photo-icon.png">
		<link rel="stylesheet" type="text/css" href="css/preloader.css">
		<link rel="stylesheet" type="text/css" href="index.css">
		<link rel="stylesheet" type="text/css" href="menu.css">
		<link rel="stylesheet" type="text/css" href="css/bloksit.css">
	</head>
	<body>
		<?php include("preloader.php");?>
		<div id="menu" class="blur">
		<?php include("menu.php"); ?>
</div>
<div id="body_cover">
 
 </div>
<div class="blur" id="info">
  <div id="s-in">
     <h1 style="text-align:center;">Introduction</h1>
     <h3>Online Photo Album is a palteform for sharing your awesome pics and You can save here.
	     The new Online Photo Album App makes it easy to access, organize and share your photos from anywhere - 
		 now available to enjoy on Web.</h3>
	 <div style=" height:30px;width:100px;
	              box-shadow:3px 3px 4px black;
	              border-radius:5px;
				  text-align:center;"><a href="#regi"><h3 style="padding:3px;">Join</h3></a></div>
   </div>	  
</div> 
	
<div class="blur">
     <div id="exp">
	  <div id="find">
	     <input type="search" name="fp" id="ff" placeholder="Name Or Cateogry">
		 <input type="button"  onclick="find()" value="Search">
	 </div>
	 <div id="f_result">
	   
	 </div>
	 <div id="container">
	  <?php $res=mysqli_query($con,"select * from pic limit 20"); ?>
		
         <?php while($ans=mysqli_fetch_assoc($res))
		  { 
		    ?>
	 <div class="grid">
		<div class="imgholder">
			<img src="<?php echo $ans['path'];?>" />
		</div>
		<strong><?php echo $ans['title'];?></strong>
		<p>Gusest View</p>
		<div class="meta"><?php echo "by ".$ans['user_name'];?></div>
	</div>
     <?php } ?>		
	</div> 
  </div>
 </div> 
  
<div class="blur" id="log">
  <div id="login-s">
     <h1>Login</h1>
	 <div>
	  <form action="process.php" method="post">
	  <input type="hidden" name="action" value="login"> 
	    <table>
		 <tr>
		  <th><h3>User</h3></th><td><input type="text" name="user" placeholder="enter username"></td>
		 </tr>
         <tr>
          <th><h3>Password</h3></th><td><input type="password" name="pass"></td>
		  </tr>
		  <tr>
		  <td></td><td><input type="submit" value="Login"></td>
		  </tr>
        </table>
       </form>
     </div>	   
   </div>	 
  </div>   
  
 <div class="blur" id="regi">
     <div id="reg-s">
     <h1>Registration</h1>
	 <div>
	   <form method="post" action="reg.php">
	   <input type="hidden" name="action" value="reg">
	     <table id="reg-f">
		   <tr>
		   <th><h3>Name</h3></th><td><input type="text" name="reg_name" placeholder="Enter name" required></td>
		   </tr>
		   <tr>
		   <th><h3>User Name</h3></th><td><input type="text" name="user" placeholder="User Name" required></td>
		   </tr>
		   <tr>
		   <th><h3>Password</h3></th><td><input type="password" name="pass" placeholder="Enter Pass" required></td>
		   </tr>
		   <tr>
		   <th><h3>Occupation</h3></th><td><input type="text" name="work" placeholder="work"required></td>
		   </tr>
		   <tr>
		   <th><h3>Email</h3></th><td><input type="email" name="email" placeholder="Email" required></td>
		   </tr>
		   <tr>
		   <th><h3>Contact</h3></th><td><input type="number" name="contact" required></td>
		   </tr>
		   <tr>
		   <th><h3>Gender</h3></th><td><input type="radio" name="sex" value="male">Male<input type="radio" name="sex" value="female">Female</td>
		   </tr>
		   <tr>
		   <td></td><td><input type="submit" value="Submit"><input type="reset" value="Clear"></td>
		   </tr>
		  </table>
        </div>		
     </div>	 
   </div>
<div class="blur" id="about-s">
   <div class="about-child"> 
      <table style="width:400px;">
	  <tr>
	   <td style="text-align:center"><h1>Online Photo Album</h1></td><td><img src="im/photo-icon.png" alt="icon" style="height:60px;width:70px;"></td>
	   </tr>
	    <caption>Online Photo Album is Devloped By Anamkia Singh in 2015</caption>
	   </table>
	   <div id="extra">
	   <div class="e-btn">
	     <a href="#log"><h3>Sign in</h3></a>
		</div>
		<div class="e-btn" style="margin-left:50px;">
		  <a href="#regi"><h3>Join</h3></a>
	     </div>
	   </div>  
	   <div id="social">
	     <div id="f-btn" class="s-btn">
         <h3>Feedback</h3>
		 </div>
	     <div id="l-btn" class="s-btn">
         <h3>Admin</h3>
	     </div> 
	     <div class="s-btn" id="face">
		   <a href="#"><h3>Facebook</h3></a>
		 </div>
		 <div class="s-btn" id="go">
		   <a href="#"><h3>Google+</h3></a>
		 </div>
		 <div class="s-btn" id="tweet">
		   <a href="#"><h3>tweeter</h3></a>
		 </div>
	 </div> 
	</div>
	 <div id="feed-box">
		 <div id="feed-close" style="position:relative;
								  top:35px;
								  left:92%;
								  height:20px;
								  width:50px;
								  box-shadow:2px 2px 3px black;
								  border-radius:10px;
								  cursor:pointer;">
		    <h5 style="text-align:center;
					   margin-top:5px;">Close</h5>
		  </div>	
	         <form action="process.php" method="post">
	          <input type="hidden" name="action" value="feed"> 
	          <table>
		          <tr>
				  <th><h3>Name</h3></th><td><input type="text" name="name" placeholder="Name"></td>
				   </tr>
				   <tr>
				  <th><h3>Feedback</h3></th><td><textarea name="feed_msg" placeholder="Feedback"></textarea></td>
				  <td></td><td><input type="submit" value="Submit"></td>
				  </tr>
			  </table>
            </form>
         </div>	  
	    
</div>		  
</body>
</html>
