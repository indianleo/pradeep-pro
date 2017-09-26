<!doctype html>
<html>
<head>
<head><title>PRS Life blessing Hospital</title>
<?php session_start(); ?>
<link rel="icon" type="image/x-icon" href="icon/title.png">
<link rel="stylesheet" type="text/css" href="menu.css">
<style>
.token
{
 height:100px;
 width:500px;
 position:absolute;
   top:100px;
   left:450px;
 }
 .ff,
 {
 height:200px;
 width:400px;
 }
 #tok
 {
 height:150px;
 width:400px;
 }
 #tok td
 {
 background-color:#38A3B5;
 border-radius:5px;
 color:black;
 }
</style>
</head>
<body>
<?php include("menu.php"); ?>
   <div class="token">
     <fieldset class="ff">
	 <legend>Registration Successful</legend>
    <table id="tok" >
	  <tr>
	    <td>Patient name</td><td><?php echo $_SESSION["name"];?></td>
	  </tr>
      <tr>
	    <td>Patient Id</td><td><?php echo $_SESSION["uid"]; ?></td>
	  </tr>
	  <tr>
	    <td>Doctor name</td><td><?php echo $_SESSION["dr"]; ?></td>
	  </tr>
	  </table>
	  </fieldset>
     </div>

</body>
</html>

 