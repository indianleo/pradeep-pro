
<style>
#view
{
 position:absolute;
   top:100px;
   left:250px;
   }
   .out table th
    {
	 background-color:yellow;
	 color:red;
	 border-radius:8px;
	 }
	 .rec
	 {
	   background-color:#38A3B5;
	   }
</style>
<?php include("record.php");?>
</head>
<body>

<?php


$pid=$_SESSION["pid"];

  $con=mysqli_connect("localhost","root","","hrs");
  $res=mysqli_query($con,"SELECT * FROM `patient` where id='$pid' ");

  ?>
  <div class="out" id="view">
     <table border="2">
	 <tr>
	    <th>Id</th>
		<th>Patient Name</th>
		<th>Father/Husband Name</th>
		<th>Address</th>
		<th>Martial</th>
		<th>Religion</th>
		<th>City</th>
		<th>Contact</th>
		<th>Date Of Birth</th>
		<th>Gender</th>
		<th>Doctor Name</th>
		<th>Register At</th>
	 </tr>
     <?php while($ans=mysqli_fetch_assoc($res))
     {	?> 
	 <tr>
	     <td class="rec"><?php echo $ans["id"]; ?></td>
		 <td class="rec"><?php echo $ans["patient_name"]; ?></td>
		 <td class="rec"><?php echo $ans["father_hus"]; ?></td>
		 <td class="rec"><?php echo $ans["address"]; ?></td>
		 <td class="rec"><?php echo $ans["martial"]; ?></td>
		 <td class="rec"><?php echo $ans["religion"]; ?></td>
		 <td class="rec"><?php echo $ans["city"]; ?></td>
		 <td class="rec"><?php echo $ans["contact"]; ?></td>
		 <td class="rec"><?php echo $ans["dob"]; ?></td>
		 <td class="rec"><?php echo $ans["sex"]; ?></td>
		 <td class="rec"><?php echo $ans["dr_name"]; ?></td>
		 <td class="rec"><?php echo $ans["time"]; ?></td>
	  </tr>
	  <?php
	  } ?>
     </table>	
</div>
</body>
</html>	 