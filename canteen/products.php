<?php
		session_start();
		if(!isset($_SESSION['user']))
    {
			header("location:index.php#login");
    }
		include_once('./app.php');
		$app = new app("Intialize App");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once("header.html"); ?>
		<link href="css/products.css" rel="stylesheet">
		<style>
			.no_box{
				border-radius:2px;
				padding:10px 20px;
				position:fixed;
				top:40%;
				right:10px;
				background:#ccc;
				color:#17a2b8;
			}
		</style>
  </head>

  <body id="page-top">

  		 <!-- Navigation -->
			 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">ORDER AT YOUR FINGERTIP</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="cart.php">My Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#showcase">Food Items</a>
												</li>
												<li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a>
												</li>
												<li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
												</li>
												<li class="nav-item">
													<a href="profile.php">
                            <img src="./image/user.png" title="<?php echo $_SESSION['user']['name']; ?>" class="user nav-link js-scroll-trigger" href="User" />
													</a>
												</li>
                    </ul>
                </div>
            </div>
        </nav>

  		
	    <section class="bg-info" id="showcase">
	      <div class="container">
	        <?php echo $app->getMenuItem(); ?>
	      </div>
			</section>

			<div class="no_box">
	      <span id="orderNo"></span>
	    </div>


  	 	<?php include_once("footer.html"); ?>
			 <script>
						function takeOrder(id){
								var show=new XMLHttpRequest();
								show.onreadystatechange=function()
								{
									if(show.readyState==4 && show.status==200)
									{
											var out=document.querySelector("#orderNo");
											out.innerHTML=show.responseText.split(',').length + " Item added into Cart<br><a href='cart.php'>Go to Cart</a>";	
									}
								}
								show.open("GET","action.php?action=takeOrder&orderId="+id,true);
								show.send();  
						}

			 </script>
  </body>

 </html>