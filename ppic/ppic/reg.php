<?php  $name=$_POST['reg_name'];
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
	 //var_dump($gender);
	// var_dump($pass);exit;
	 $con=mysqli_connect("localhost","root","","ppic");
	 $res=mysqli_query($con,"insert into users(name,user,pass,email,contact,gender,work) 
							 values('$name','$user','$pass','$email','$contact','$gender','$work')");
	 $res2=mysqli_query($con,"insert into profile(user_name) values('$user')");
	 header("location:index.php");
	 ?>