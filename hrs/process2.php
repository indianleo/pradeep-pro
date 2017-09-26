<?php
session_start();
  $pac=$_POST["pp"];
  switch($pac)
  {
   case 'Patient Records' : pr();
   break;
   case 'Get Record' :pr2();
   break;
   case 'Generate Bill' : bill();
   break;
   case 'Get Bill' : gb();
   break;
   case 'Pay Bill' : db();
   break;
   case 'Log Out' : lout();
   break;
   default :def();
   break;
  }

 function pr()
 {
   header("location:prask.php");
  }
   function pr2()
 {
  $_SESSION["pid"]=$_POST["pid"];
   header("location:precord.php");
  }
 function bill()
 {
   header("location:pbill.php");
 }
 function gb()
 {
   $_SESSION["pid"]=$_POST["pid"];
   $type=$_POST["cat"];
   $du=$_POST["duration"];
   $_SESSION["amount"]=$du*$type;
    header("location:bill.php");
 }
 function db()
 {
  header("location:billdisp.php");
  }
 function lout()
 {
   header("location:logout.php");
 }
 function def()
 {
   echo "Function not Worked";
 }
?> 