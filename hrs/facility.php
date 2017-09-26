<!doctype html>
<html>
<head>
<head><title>PRS Life blessing Hospital</title>
<?php session_start(); ?>
<link rel="icon" type="image/x-icon" href="icon/title.png">
<link rel="stylesheet" type="text/css" href="menu.css">

<style>
.fac
{
 position:absolute;
   top:100px;
   padding:4px;
   margin-top:10px;

 }
 .out
 {
    position:absolute;
   top:100px;
   left:500px;
   
   margin-top:10px;
 }
 #f
 {
  
   height:500px;
   width:700px;
   }
   input[type="submit"]
   {
     height:50px;
	 width:200px;
	 }
	 input[type="submit"]:hover
	 {
	 background-color:#00FF99;
	 }
</style>
</head>
<body>
<?php include("menu.php"); ?>

<div class="fac">
<form method="post" action="list.php" onsubmit="view()">
<input type="submit" name="action"  value="Radiology/X-ray facility"><br>
<input type="submit" name="action"  value="Pathology"><br>
<input type="submit" name="action"  value="Top Doctors"><br>
<input type="submit" name="action"  value="OPD(Allopathy & Homeopathy)"><br>
<input type="submit" name="action"  value="ECG Services"><br>
<input type="submit" name="action"  value="Physiotherapy"><br>
<input type="submit" name="action"  value="Dental facility"><br>
<input type="submit" name="action"  value="Ambulance Services"><br>
</form>
</div>

<div class="out" >
<img  class="ff" id="f" src="<?php echo $_SESSION["target"]; ?>" alt="Category not Selected" >
</div>
</body>
</html>
