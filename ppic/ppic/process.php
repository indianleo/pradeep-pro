<?php
session_start();
 $action=$_REQUEST['action'];
 switch($action)
 {  
     case 'feed' :feedback();
	 break;
     case 'cover_up' :cover();
	 break;
	 case 'pro_up' :pro();
	 break;
     case 'find' :find();
     break;
     case 'doc_insert' :docin();
	 break;
	 case 'reg':reg();
	 break;
	 case 'login':login();
	 break;
	 default :def();
	 break;
 }
 function feedback()
 {
	  $data=$_POST['feed_msg'];
	  $name=$_POST['name'];
	 $con=mysqli_connect("localhost","root","","ppic");
	 $res=mysqli_query($con,"insert into feed(user_name,data,date) values('$name','$data',now())");
	 $ans=mysqli_fetch_assoc($res);
	 header("location:index.php#about-s"); 
	
 }	 
	 
 function cover()
 {
	 $user=$_SESSION['user'];
	  $cover_f=uniqid().$_FILES['cover_file']['name'];
	  $f_path="profile/$cover_f";
	  $con=mysqli_connect("localhost","root","","ppic");
	  $res=mysqli_query($con,"select * from profile where user_name='$user'");
	  $ans=mysqli_fetch_assoc($res);
	  $c=$ans['cover'];
		 $res2=mysqli_query($con,"update profile set cover='$f_path' where user_name='$user'"); 
	     move_uploaded_file($_FILES['cover_file']['tmp_name'], $f_path);
		 header("location:profile.php");   
 }
 function pro()
 {
	  $user=$_SESSION['user'];
	  $pro_f=uniqid().$_FILES['pro_file']['name'];
	  $f_path="profile/$pro_f";
	  $con=mysqli_connect("localhost","root","","ppic");
	  $res=mysqli_query($con,"select * from profile where user_name='$user'");
	  $ans=mysqli_fetch_assoc($res);
	  $p=$ans['pro'];
	 // var_dump($p);exit;
		$res2=mysqli_query($con,"update profile set pro='$f_path' where user_name='$user'"); 
	     move_uploaded_file($_FILES['pro_file']['tmp_name'], $f_path);
		 header("location:profile.php");
 }	 
 function find()
 {
	 $cat=$_POST['fp'];
	 $con=mysqli_connect("localhost","root","","ppic");
	 $res=mysqli_query($con,"select * from pic where cat=$cat");
	 $_SESSION['find']=$res;
	 header("location:i9ndex.php");
 }
 function docin()
 {
	  $title_doc=$_POST['title'];
	  $user=$_SESSION['user'];
	  $fdoc=uniqid().$_FILES['filedoc']['name'];
	  $f_path="record/$fdoc";
	  $con=mysqli_connect("localhost","root","","ppic");
	  $res=mysqli_query($con,"insert into doc(user_name,path,title) values('$user','$f_path','$title_doc')"); 
	  if($res)
	  {
	    move_uploaded_file($_FILES['filedoc']['tmp_name'], $f_path);
		 header("location:user.php#create-a");
	  }
      else
	  {
		   echo "Data Not Inserted";
	  }	   
 }	  	 
 function reg()
 { 
	 $name=$_POST['reg_name'];
	 $work=$_POST['work'];
	 $user=$_POST['user'];
	 $pass=md5($_POST['pass']);
	 $email=$_POST['email'];
	 $contact=$_POST['contact'];
	 $gender=$_POST['sex'];
	 //var_dump($name);
	 //var_dump($work);
	 //var_dump($pass);
	 //var_dump($email);
	 //var_dump($contact);
	 //var_dump($gender);exit;
	 $con=mysqli_connect("localhost","root","","ppic");
	 $res=mysqli_query($con,"insert into users(name,user,pass,email,contact,gender,work) 
							 values('$name','$user','$pass','$email','$contact','$gender','$work')");
	 $res2=mysqli_query($con,"insert into profile(user_name) values('$user')");
	 header("location:index.php");
 }	 
 function login()
 {
	 $user=$_POST['user'];
	 $pass=md5($_POST['pass']);
	 $con=mysqli_connect("localhost","root","","ppic");
	 $res=mysqli_query($con,"select * from users where user='$user' and pass='$pass'");
	 $ans=mysqli_fetch_assoc($res);
	 if($ans)
	 {
		 header("location:user.php");
		 $_SESSION['user']=$user;
     }
     else
	 {
      header("location:index.php");
     }	  
 }	 
function def()
{
echo "functionn is not working";
}
	