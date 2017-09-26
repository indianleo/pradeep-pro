<?php 
	session_start();
   $action=$_POST["action"];
   switch($action)
    {
      case 'Radiology/X-ray facility' : r();
      break;
      case 'Pathology' : path();
      break;
      case 'Top Doctors' :dr();
      break;
      case 'OPD(Allopathy & Homeopathy)' : opd();
      break;
      case 'ECG Services' : ecg();
      break;
      case 'Physiotherapy' :phy();
      break;
      case 'Dental facility' :dental();
      break;
      case 'Ambulance Services' :am();
      break;
      default : def();
      break;
   }	  
  
  function r()
  {
    $_SESSION["target"]="im/fac2.jpg";
	header("location:facility.php");
  }	
   function path()
  {
    $_SESSION["target"]="im/path.jpg";
	header("location:facility.php");
  }	
   function dr()
  {
    $_SESSION["target"]="im/dr.jpg";
	header("location:facility.php");
  }	
   function opd()
  {
    $_SESSION["target"]="im/fac1.jpg";
	header("location:facility.php");
  }	
   function ecg()
  {
    $_SESSION["target"]="im/ecg.jpg";
	header("location:facility.php");
  }	
   function phy()
  {
    $_SESSION["target"]="im/pic2.jpeg";
	header("location:facility.php");
  }	
   function dental()
  {
    $_SESSION["target"]="im/dr2.jpg";
	header("location:facility.php");
  }	
   function am()
  {
    $_SESSION["target"]="im/ambu.jpg";
	header("location:facility.php");
  }	
  function def()
  {
    echo"Function not loaded";
}	
   ?>

