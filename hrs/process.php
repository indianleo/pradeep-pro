<?php
      session_start();
     $action=$_POST["action"];
	 switch($action)
	  {
	      case 'login' : signin();
	      break;
		  case 'admin' :ad();
		  break;
	      case 'appoinment' : form();
	      break;
		  case 'empform' : emp();
		  case 'feed' :fe();
		  break;
	      default : def();
	      break;
	  }
	  function signin()
	  {
	     $user=$_POST["user"];
		 $pass=md5($_POST["pass"]);
		 $con=mysqli_connect("localhost","root","","hrs");
	 
		 $res=mysqli_query($con,"select * from emp where user='$user' and pass='$pass'");
		 $row=mysqli_num_rows($res);
		 if($row)
		 {
		    $_SESSION["login"]=true;
			$_SESSION["user"]=$user;
			header("location:record.php");
	     }
         else
           {
              header("location:mainhrs.php");
           }
      }	
      function ad()
      {
         $user2=$_POST["user2"];
		 $pass2=$_POST["pass2"];
		 $con=mysqli_connect("localhost","root","","hrs"); 
		 $res=mysqli_query($con,"select * from admin where user='$user2' and pass='$pass2'");
		 $row=mysqli_num_rows($res);
		 if($row)
		 {
		    $_SESSION["login"]=true;
			$_SESSION["admin"]=$user2;
			header("location:admindisp.php");
	     }
         else
           {
              header("location:ladmin.php");
           }
      }	 
	  function form()
	  {
         $con=mysqli_connect("localhost","root","","hrs");
	     $pname=$_POST["pname"];
	     $pfather=$_POST["pfather"];
	     $paddress=$_POST["paddress"];
	     $pm_st=$_POST["pm_st"];
	     $p_r=$_POST["p_r"];
	     $pcity=$_POST["pcity"];
	     $contact=$_POST["mobile"];
	     $dob=$_POST["dob"];
	     $sex=$_POST["gender"];
	     $dr_name=$_POST["dr_name"];
	  
	  $res=mysqli_query($con,"insert into patient(patient_name,father_hus,address,martial,religion,city,contact,dob,sex,dr_name,time) values('$pname','$pfather','$paddress','$pm_st','$p_r','$pcity','$contact','$dob','$sex','$dr_name',now())");
	   $res2=mysqli_query($con,"select * from patient where patient_name='$pname'");
	   $ans=mysqli_fetch_assoc($res2);  
    	$_SESSION["uid"]=$ans["id"];
		$_SESSION["name"]=$pname;
		$_SESSION["dr"]=$dr_name;
		 header("location:token.php");
	  }
	  function emp()
	  {
	     $ename=$_POST["ename"];
		 $euser=$_POST["euser"];
		 $epass=md5($_POST["epass"]);
		 $con=mysqli_connect("localhost","root","","hrs");
		 $res=mysqli_query($con,"insert into emp(name,user,pass) values('$ename','$euser','$epass')");
		 header("location:admindisp.php");
		}
	 function fe()
      {
         $tname=$_POST["tname"];
		 $tarea=$_POST["tarea"];
		 $con=mysqli_connect("localhost","root","","hrs");
		 $res=mysqli_query($con,"insert into feed(title,content,time) values('$tname','$tarea',now())");
		 header("location:help.php");
      }	   
      function def()
       {
         echo "Function is not Working";
        }		 
	  ?>