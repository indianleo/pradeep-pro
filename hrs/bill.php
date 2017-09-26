<head>
<style>
.askbill
{
height:100px;
width:300px;
position:absolute;
 top:100px;
 left:500px;
}
.askbill td
{
  background-color:#38A3B5;
  
  }
  .askfield
  {
   padding:20px;
   
   }
</style>
<?php include("record.php");?>
</head>
<body>
<?php
   $pid=$_SESSION["pid"];
   $am=$_SESSION["amount"];

  $con=mysqli_connect("localhost","root","","hrs");
  $res=mysqli_query($con,"SELECT * FROM `patient` where id='$pid' ");
  $ans=mysqli_fetch_assoc($res);
 
  ?>

 
<div class="askbill" id="askdiv">
 <form method="post" action="process2.php">
     <fieldset class="askfield">
	 <legend>Bill</legend>
	 <table border="1">
	 <tr>
     <td>Patient Id</td><td><?php echo $ans['id']; ?></td>
	 </tr>
	 <tr>
	 <td>Patient Name</td><td><?php echo $ans["patient_name"]; ?></td>
	 </tr>
	 <tr>
	 <td>Father/Husband Name</td><td><?php echo $ans["father_hus"]; ?></td>
	 </tr>
	 <tr>
	 <td>Doctor Name</td><td><?php echo $ans["dr_name"]; ?></td>
	 </tr>
	 <tr>
	 <td>Amount</td><td><?php echo $am; ?></td>
	 </tr>
	 </table>
	 <input type="submit" name="pp" value="Pay Bill"> 
	 </fieldset>
	</form>
 </div>	