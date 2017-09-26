<!doctype html>
<html>
<head>
<head><title>PRS Life blessing Hospital</title>
<link rel="icon" type="image/x-icon" href="icon/title.png">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="stylesheet" type="text/css" href="appoinment.css">

</head>
<body>
<?php include("menu.php"); ?>
<div class="pf">
 <form method="post" action="process.php">
     <input type="hidden" name="action" value="appoinment">
     <fieldset class="pfield">
	    <legend>Appoinment/Register</legend>
		  <table>
		    <tr>
			<td><lable for="pn"><b>Patient Name</b></lable></td>
			<td><input type="text" required name="pname" id="pn" class="app" placeholder="Name"></td>
			</tr>
			<tr>
			<td><lable for="pfn"><b>Father/Husband Name</b></lable></td>
			<td><input type="text" required name="pfather" id="pfn" class="app"></td>
			</tr>
			<tr>
			<td><lable for="padd"><b>Patient Address</b></lable></td>
			<td><textarea  required name="paddress" id="padd" class="app"></textarea></td>
			</tr>
			<tr>
			<td><lable for="mstatus"><b>Martial Status</b></lable></td>
			<td><select name="pm_st" id="mstatus" class="app">
			   <option value="">Select</option>
			   <option value="Married">Married</option>
			   <option value="Unmarried">Unmarried</option>
			   </select>
			   </td>
			</tr>
			<tr>
			<td><lable for="re"><b>Religion</b></lable></td>
			<td><select name="p_r" id="re" class="app">
			   <option >Select</option>
			   <option value="Hindu">Hindu</option>
			   <option value="Muslim">Muslim</option>
			   <option value="Christian">Christian</option>
			   </select>
			   </td>
			</tr>
			<tr>
			<td><lable for="city"><b>City</b></lable></td>
			<td><select name="pcity" id="city" class="app">
			   <option >Select</option>
			   <option value="Allahabad">Allahabad</option>
			   <option value="Mumbai">Mumbai</option>
			   <option value="Lucknow">Lucknow</option>
			   <option value="Delhi">Delhi</option>
			   <option value="Kolkata">Kolkata</option>
			   <option value="Gujraat">Gujraat</option>
			   </select>
			   </td>
			</tr>
			<tr>
			<td><lable for="mobile"><b>Contact no.</b></lable></td>
			<td><input type="number" required   name="mobile"  id="mobile" class="app"></td>
			</tr>
			<tr>
			<td><lable for="dob_p"><b>Date Of Birth</b></lable></td>
			<td><input type="date" name="dob" id="dob_p" placeholder="yyyy-mm-dd" class="app"></td>
			</tr>
			<tr>
			<td><lable for="sex"><b>Gender</b></lable></td>
			<td><select name="gender" id="sex" class="app">
			    <option></option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select>
			</td>
			</tr>
			<tr>
			<td><lable for="dr"><b>Doctor Name</b></lable></td>
			<td><select required name="dr_name" id="dr" class="app">
			     <option></option>
				 <option value="Ajay Singh">Ajay Singh</option>
				 <option value="Ravi Sen">Ravi Sen</option>
				 <option value="Madhu Rai">Madhu Rai</option>
				 <option value="Shalni Singh">Shalni Singh</option>
				 <option value="Kamal Desai">Kamal Desai</option>
				 <option value="Aman Yadav">Aman Yadav</option>
				 <option value="Rekha Singh">Rekha Singh</option>
				 <option value="Sanjeev Gupta">Sanjeev Gupta</option>
				 <option value="Rahul Sen">Rahul Sen</option>
				 <option value="David Sam">David Sam</option>
				 <option value="Lucy Clain">Lucy Clain</option>
				 <option value="Maria Dee">Maria Dee</option>
				 <option value="Jyoti Tripathi">Jyoti Tripathi</option>
				 <option value="Rajeev Shukla">Rajeev Shukla</option>
				 </select>
			</td>
			</tr>
			<tr>
			<td><lable for="date"><b>Date Of Appointment</b></lable></td>
			<td><input type="date" id="apdate" class="app" name="apdate" placeholder="yyyy-mm-dd"></td>
			</tr>
			</table>
			<br><input type="submit" value="Get Appoinment">
			<input type="reset" value="Clear">
         </fieldset>
       </form>
     </div>
</body>
</html>
