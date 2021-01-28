<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php include_once("header.html"); ?>

  </head>

  <body id="page-top">

  		  <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Order At Your Fingertip</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="products.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="cart.php">Carts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#orders">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

  		 <header class="masthead text-center text-white d-flex">
	      <div class="container my-auto">
	        <div class="row">
	          <div class="col-lg-10 mx-auto">
	            <h1 class="text-uppercase">
	              <strong>
                  Welcome at Canteen
	              </strong>
	            </h1>
	            <hr>
	          </div>
	          <div class="col-lg-8 mx-auto">
	            <p class="text-faded mb-5">
	               
	            </p>
	            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#showcase">Explore Products</a>
	          </div>
	        </div>
	      </div>
	    </header>
			
		<section class="bg-info" id="orders">
	      <div class="container">
	        <h3>Here Orders will show....</h3>
	      </div>
	    </section>

  	 	<?php include_once("footer.html"); ?>
  </body>

 </html>