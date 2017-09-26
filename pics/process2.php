<?php
session_start();
				$title_pic=$_REQUEST['title'];
	         $user=$_SESSION['user'];
	         $cat_pic=$_REQUEST['cat_text'];
			 //var_dump($title_pic);
			 //var_dump($user);
			 //var_dump($cat_pic);exit;

$con=mysqli_connect("mysql.hostinger.in","u728032163_annie","786pradeep","u728032163_pics");
$upload_dir = 'album/'; // Directory for file storing
$filename= '';
$filename = uniqid().$_FILES['fileup']['name'];
$path="album/$filename";
$res=mysqli_query($con,"insert into pic(path,title,user_name,cat) values('$path','$title_pic','$user','$cat_pic')"); 
move_uploaded_file($_FILES['fileup']['tmp_name'], $path);
header("location:user.php");
exit(); // do not go futher
?>