<?php 
          $con2=mysqli_connect("localhost","root","","ppic");
          $cat=$_REQUEST['str']; 
	      $res2=mysqli_query($con2,"select * from pic where cat like '%$cat%' or title like '%$cat%' ");
		  $check=mysqli_fetch_assoc($res2);
		  if($check)
		  {
		  ?><div id="container">
         <?php while($ans=mysqli_fetch_assoc($res2))
		  { 
		    ?>
	        <div class="grid">
		     <div class="imgholder">
			     <img src="<?php echo $ans['path'];?>" />
		     </div>
		     <strong><?php echo $ans['title'];?></strong>
		     <p>Gusest View</p>
		     <div class="meta"><?php echo "by ".$ans['user_name'];?></div>
	      </div>
     <?php } 
		  }
		  else
		  {
			  echo "<h1>Image Not Found</h1>";
		  }
		  ?>		
	</div> 
	