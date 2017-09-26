<?php include("admindisp.php"); ?>



<div class="dform" id="dd">
  <form method="post" action="process.php">
     <input type="hidden" name="action" value="empform">
    <fieldset class="field">
	  <legend>Employee Record</legend>
	    <table>
		<tr>
	    <td>Name:</td><td><input type="text" name="ename" placeholder="Name"></td>
		</tr>
		<tr>
	    <td>User Name:</td><td><input type="text" name="euser" placeholder="User Name"></td>
		</tr>
		<tr>
	    <td>Password:</td><td><input type="password" name="epass" placeholder="Password"></td>
		</tr>
		<tr>
		<td></td><td><input type="submit" value="Submit"><input type="reset" value="Clear"></td>
		</table>
       </fieldset>
	 </form>
  </div>	 


