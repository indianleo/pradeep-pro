<?php 
 session_start();
  $con=mysqli_connect("mysql.hostinger.in","u728032163_annie","786pradeep","u728032163_pics");
  $user=$_SESSION['user'];
  $res_profile=mysqli_query($con,"select * from profile where user_name='$user'");
  if(!isset($_SESSION['user']))
  {
   header("location:index.php");
   }
   ?>
<!doctype html>
<html lang="en">
<head>
<title>Pics</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">  
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="js/profile.js"></script>
<link rel="icon" type="image/x-icon" href="icons/photo-icon.png">
<link rel="stylesheet" type="text/css" href="css/preloader.css">
<link rel="stylesheet" type="text/css" href="css/profile.css">
   
</head>
<body>
<?php include("preloader.php");?>
<div id="body_cover">
 
 </div>
<div id="back" style="position:absolute;
					  top:15px;
					  left:10px;
					  text-align:center;
					  border-radius:5px;
					  font-family: 'tron';
					  box-shadow:2px 2px 3px black;
					  height:30px;
					  width:80px;
					  z-index:2">
 <a href="user.php">Back</a>
</div> 
<?php 
         
	      
		  $ans=mysqli_fetch_assoc($res_profile); ?>
			 <div id="first_pic" class="b">
                 <div id="cover">
                      <img src="<?php echo $ans['cover']; ?>" alt="Cover" Title="Cover"/>
                 </div>
                 <div id="pro_pic" class="b">
                      <img src="<?php echo $ans['pro']; ?>" alt="Profile Pic" title="Profile Pic"/>
			     </div>	
				 <div id="pro_name" style="font-family: 'tron';
										   position:absolute;
								    	   top:380px;
										   left:410px;
										   border-radius:5px;">
				   <h1><?php echo $user;?></h1>
				 </div>  
             </div>
			 <button type="button" id="change_cover" style="font-family: 'tron';
																	 position:absolute;
																	 top:350px;
																	 right:2px;
																	 border-radius:5px;">Change Cover</button>
             <button  type="button" id="change_pro" style="font-family: 'tron';
																	border-radius:5px;
																	position:absolute;
																	 top:550px;
																	 left:100px;">Change Profile Pic</button>	
 <div id="back_cover">

 </div> 
			 <div id="cover_btn" class="pic_insert">
			   <button type="button" class="close">Close</button>
			   <form method="post" action="process.php" enctype="multipart/form-data">
			    <input type="hidden" name="action" value="cover_up">
				<table>
				<tr>
				<th>cover</th><td><input type="file" name="cover_file"></td>
				<tr>
				<td><input type="submit" value="Upload"></td>
				</tr>
				</table>
				</form>
			</div>
           <div id="pro_btn" class="pic_insert">
		       <button type="button" class="close">Close</button>
			   <form method="post" action="process.php" enctype="multipart/form-data">
			    <input type="hidden" name="action" value="pro_up">
				<table>
				<tr>
				<th>cover</th><td><input type="file" name="pro_file"></td>
				<tr>
				<td><input type="submit" value="Upload"></td>
				</tr>
				</table>
				</form>
			</div>		
 <div id="detail">
   <?php $res2=mysqli_query($con,"select * from users where user='$user'");
       $ans2=mysqli_fetch_assoc($res2);
	   ?>
	   <table>
	   <tr>
	   <th>Name</th><td><?php echo " ".$ans2['name'];?></td>
	   </tr>
	   <tr>
	   <th>User</th><td><?php echo " ".$ans2['user'];?></td>
	   </tr>
	   <tr>
	   <th>Email</th><td><?php echo " ".$ans2['email'];?></td>
	   </tr>
	   <tr>
	   <th>Contact</th><td><?php echo " ".$ans2['contact'];?></td>
	   </tr>
	   <tr>
	   <th>Gender</th><td><?php echo " ".$ans2['gender'];?></td>
	   </tr>
	   <tr>
	   <th>Work</th><td><?php echo " ".$ans2['work'];?></td>
	   </tr>
	   </table>
	</div>   
 


</body>
</html>			 
		 
