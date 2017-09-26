<!doctype html>
<html>
<head>
<head><title>PRS Life blessing Hospital</title>
<link rel="icon" type="image/x-icon" href="icon/title.png">
<link rel="stylesheet" type="text/css" href="menu.css">
<style>
.lside
{
 position:absolute;
   top:100px;
 }
 input[type="submit"]:hover
 {
 background-color:#00FF99;
 }
 .sub
 {
 height:50px;
 width:200px;
 }
</style>
<?php include("auth.php"); ?>
</head>
<body>
<?php include("menu.php"); ?>
<div class="lside" id="lmenu">
<form method="post" action="process2.php">
<input type="submit" name="pp" class="sub" value="Patient Records"><br>
<input type="submit" name="pp" class="sub" value="Generate Bill"><br>
<input type="submit" name="pp" class="sub" value="Log Out"><br>
</div>

</body>
</html>
