<head>
<?php include("record.php"); ?>
<style>
.ask
{
height:100px;
width:300px;
position:absolute;
 top:100px;
 left:500px;
}

</style>
</head>
<body>
<div class="ask" id="askdiv">
 <form method="post" action="bill.php">
     <fieldset class="askfield">
	 <legend>Enter Patient Details</legend>
	 <table>
	 <tr>
     <td>Patient Id</td><td><input type="number" name="pid"  id="pid"></td>
	 </tr>
	 <tr>
	 <td>Patient Category</td><td><select class="pward" name="cat">
	                                  <option >Select</option>
		                              <option value="1000">General</option>
		                              <option value="3000">V.I.P</option>
		                              <option value="4000">ICU</option>
		                              <option value="500">Pathology</option>
		                              <option value="400">X-Ray</option>
		                              <option value="1000">CT-Scan</option>
		                              <option value="500">Dental</option>
		                              <option value="300">OPD</option>
		                              <option value="500">Physiotherapy</option>
		                            </select>
	                         </td>
	 </tr>
	 <tr>
	 <td>Duration</td><td><input type="number" name="duration" id="pdu"></td>
	 </tr>
	 <tr>
	 <td><input type="submit" name="pp" value="Get Bill"></td><td><input type="reset" value="Clear"></td>
	 </tr>
	 </table>
	 </fieldset>
	</form>
 </div>	