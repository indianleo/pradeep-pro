<head>
<?php include("admindisp.php"); ?>
<style>
.viewf
{
 position:absolute;
  top:180px;
   left:500px;
}
.viewf td
{
background-color:#38A3B5;
color:#FFCCFF;
}
</style>
</head>
<body>
 <div class="viewf">
    <?php 
$con=mysqli_connect("localhost","root","","hrs");
$res=mysqli_query($con,"select * from feed ");
?>
<table border="2">
<tr>
<th>ID</th><th>Title</th><th>Content</th><th>Time</th>
</tr>
<?php while($ans=mysqli_Fetch_assoc($res))


{
echo"<tr><td>".$ans["id"]."</td><td>".$ans["title"]."</td><td>".$ans["content"]."</td><td>".$ans["time"]."</td></tr>";
}
 ?>
</table>
</div>