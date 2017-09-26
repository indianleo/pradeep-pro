<!doctype html>
<html>
<head>
<head><title>PRS Life blessing Hospital</title>
<link rel="icon" type="image/x-icon" href="icon/title.png">
<link rel="stylesheet" type="text/css" href="menu.css">
<?php include("auth2.php"); ?>

<style>
.dform
{
 height:200px;
 width:300px;
 position:absolute;
 top:150px;
 left:700px;
 }
 #ah
 {
   text-align:center;
   }
.lside
{
 position:absolute;
   top:150px;
   left:10px;
 }
 .lside ul
 {
 list-style-type:none;
 }
 .lside ul li
 {
  background-color:yellow;
  border-radius:5px;
  padding:5px;
  margin-top:5px;
  }
  .lside ul li a
   {
   padding:10px;
   color:red;
   }
</style>
</head>
<body>
<?php include("menu.php"); ?>
<h1 id="ah">Welcome Administrator</h1>

<div class="lside" id="lmenu">
  <ul>
  <li><a href="admin.php">Manage Employee</a></li>
  <li><a href="precord.php">Patient Records</a></li> 
  <li><a href="viewfeed.php">View Feedback</a></li>
  <li><a href="logout.php">Log Out</a></li>
  </ul>
 </div> 
 </body>
</html>


