<!doctype html>
<html>
<head>
<head><title>PRS Life blessing Hospital</title>
<link rel="icon" type="image/x-icon" href="icon/title.png">
<link rel="stylesheet" type="text/css" href="menu.css">
<style>
.login
{
  height:200px;
  width:300px;
  position:absolute;
    top:100px;
	left:400px;
  }
</style>
</head>
<body>
<?php include("menu.php"); ?>

<div class="login" id="ll">
  <form method="post" action="process.php">
		            <input type="hidden" name="action" value="admin">
	    <fieldset class="field">
		             <legend>Log In</legend>
					 <table>
					 <tr>
		             <td>User Name:</td><td><input type="text" name="user2" placeholder="User name"></td>
					 </tr><tr>
                     <td>Password:</td><td><input type="password" name="pass2" placeholder="Password"></td>
					 </tr><tr><tr></tr>
                     <td></td><td><input type="submit" value="Login">
                     <input type="reset" value="Clear"></td>
                     
					 </table>
					 <a href="forgot.php">Forgot Password</a>
       </fieldset>
    </form>
</div>	




</body>
</html>
