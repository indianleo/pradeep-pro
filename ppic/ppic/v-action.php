<?php 
 $action=$_REQUEST['str'];
 //var_dump($action);exit;
 session_start();
 switch($action)
 {
	 case 'pic_up' :picup();
	 break;
	 case 'doc_act' :docact();
	 break;
	 case 'edited_pic':edited();
	 break;
	 case 'up_pic' : up();
	 break;
	 case 'document' :doc();
	 break;
	 default :def();
	 break;
 }
 function docact()
 {
	 ?>
	 <div class="in" id="doc_insert">
	 <h2>Document Upload</h2>
	 <form method="post" action="process.php" enctype="multipart/form-data">
	    <input type="hidden" name="action" value="doc_insert">
	     <table>
		     <tr>
			 <th>Title</th><td><input type="text" name="title" placeholder="Title"></td>
			 </tr>
			 <tr>
			 <th>Upload</th><td><input type="file" name="filedoc" onchange="return ajaxFileUpload2(this);"></td>
			 </tr>
			 <tr>
			 <td></td><td><input type="submit" value="submit"></td>
			 </tr>
		 </table>
	 </form>
	 </div>
    <?php
 }	
 function picup()
 {
	 ?>
	 <div class="in" id="picup">
	 <h2>Photo Upload</h2>
	 <form method="post" action="process2.php" enctype="multipart/form-data">
	     <input type="hidden" name="action" value="picup">
	     <table>
		     <tr>
			 <th>Title</th><td><input type="text" name="p_name" placeholder="Title" /></td>
			 </tr>
			 <tr>
			 <th>Upload</th><td><input type="file" name="fileup" onchange="return ajaxFileUpload(this);" /></td>
			 </tr>
			 <tr>
			 <th>Category</th><td><input type="text" name="p_cat" placeholder="Category" /></td>
			 </tr>
			 <tr>
			 <td></td><td><input type="submit" value="submit"></td>
			 </tr>
		 </table>
	 </form>
	 </div>
    <?php
 }	
 function edited()
 {
	  $user=$_SESSION['user'];
	 $con=mysqli_connect("localhost","root","","ppic");
	 $res=mysqli_query($con,"select * from edited where user_name='$user'");
	 ?>
	    <div id="container">
         <?php while($ans=mysqli_fetch_assoc($res))
		  { 
		    ?>
	 <div class="grid">
		<div class="imgholder">
			<img src="<?php echo $ans['path'];?>" />
		</div>
		<strong><?php echo $ans['pic_name'];?></strong>
		<p><form method="post" action="del.php">
			   <input type="hidden" name="id" value="<?php echo $ans['id'];?>" >
			   <input type="hidden" name="table" value="edited" >
			   <input type="submit" value="Delete">
			   </form></p>
		<div class="meta"><?php echo "by ".$ans['user_name'];?></div>
	</div>
     <?php } ?>		
	</div> 
	 <?php
 }		
 function up()
 {
	$user=$_SESSION['user'];
	$con=mysqli_connect("localhost","root","","ppic");
	$res=mysqli_query($con,"select * from pic where user_name='$user'");
	 ?>
	  <div id="container">
         <?php while($ans=mysqli_fetch_assoc($res))
		  { 
		    ?>
	 <div class="grid">
		<div class="imgholder">
			<img src="<?php echo $ans['path'];?>" />
		</div>
		<strong><?php echo $ans['title'];?></strong>
		<p><form method="post" action="del.php">
			   <input type="hidden" name="id" value="<?php echo $ans['id'];?>" >
			   <input type="hidden" name="table" value="pic" >
			   <input type="submit" value="Delete">
			  </form></p>
		<div class="meta"><?php echo "by ".$ans['user_name'];?></div>
	</div>
     <?php } ?>		
	</div> 
		<?php
 }	 
 function doc()
 {
	 $user=$_SESSION['user'];
	 $con=mysqli_connect("localhost","root","","ppic");
	 $res=mysqli_query($con,"select * from doc where user_name='$user'");
	 ?><div id="content">
	   <table border="1">
	   
	    <?php while($ans=mysqli_fetch_assoc($res))
		{?>
	   <tr>
	   <th><?php echo $ans['id'];?></th><th><?php echo $ans['title'];?></th><td><?php echo $ans['path'];?>
	     <span id="del_t">
		      <form method="post" action="del.php">
			   <input type="hidden" name="id" value="<?php echo $ans['id'];?>" >
			   <input type="hidden" name="table" value="doc" >
			   <input type="submit" value="Delete">
			   </form>
			</span> 
	   </td></tr>
		<?php } ?>
		
		</table>
        </div><?php
 }		
     		
function def()
{
 echo "Function is not Working";
} 