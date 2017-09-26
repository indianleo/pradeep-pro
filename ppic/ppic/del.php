<?php 
session_start();
$id=$_REQUEST['id'];
$table=$_REQUEST['table'];
$user=$_SESSION['user'];
//var_dump($id);var_dump($table);exit;
$con=mysqli_connect("localhost","root","","ppic");
$take=mysqli_query($con,"select * from $table where id='$id' and user_name='$user'");
$ans=mysqli_fetch_assoc($take);
//var_dump($ans);exit;
if($ans)
{
 unlink($ans['path']);
$res=mysqli_query($con,"delete from $table where id='$id' and user_name='$user'");
}
header("location:user.php#view-s");

?>