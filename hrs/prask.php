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
 <form method="post" action="process2.php">
     <fieldset class="askfield">
	 <legend>Enter Patient Id</legend>
	 <table>
	 <tr>
     <td>Patient Id</td><td><input type="number" name="pid"  id="pid"></td>
	 </tr>
	 <tr>
	 <td><input type="submit" name="pp" value="Get Record"></td><td></td>
	 </tr>
	 </table>
	 </fieldset>
	</form>
 </div>	