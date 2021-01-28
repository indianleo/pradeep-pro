<?php
  session_start();
  if(!isset($_SESSION['user'])) {
      header("location:index.php#portfolio");
  } else if(empty($_SESSION['orders']) ){
      header("location:products.php#portfolio"); 
  }
  include_once('./app.php');
  $app = new app("Intialize App");
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <?php include_once("header.html"); ?>
    <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
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
                            <a class="nav-link js-scroll-trigger" href="products.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#showcase">Payments</a>
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

  		<header class="masthead text-center text-white d-flex">
	      <div class="container my-auto">
	        <div class="row">
	          <div class="col-lg-10 mx-auto">
	            <h1 class="text-uppercase">
	              <strong>
	                Welcome in Cart
	              </strong>
	            </h1>
	            <hr>
	          </div>
	          <div class="col-lg-8 mx-auto">
	            <p class="text-faded mb-5">
	              Here you can manage your items added into cart and make payment to confirm your order.
	            </p>
	            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#showcase">
                   Proceed & checkout
                </a>
	          </div>
	        </div>
	      </div>
	    </header>

	    <section class="bg-primary" id="showcase">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 item_list">
                        <?php echo $app->getOrderTable($_SESSION['orders']); ?>
                    </div>
                    <div class="col-sm-6 item_amt">
                        <div class="payment_box">
                            <table class="table ">
                              <tr class="bg-info">
                                  <th>Sr. No</th>
                                  <th>Types</th>
                                  <th>Charges</th>
                              </tr>
                              <tr>
                                  <td>1.</td>
                                  <td>Selected Order</td>
                                  <td><?php echo $app->calulateOrder($_SESSION['orders']); ?></td>
                              </tr>
                              <tr>
                                  <td>2.</td>
                                  <td>GST</td>
                                  <td><?php echo $_SESSION['GST']; ?></td>
                              </tr>
                              <tr class="bg-danger" >
                                  <td></td>
                                  <td class="text-white">
                                    Total Amount
                                  </td>
                                  <td id="orderAmt"><?php echo $_SESSION['total']; ?></td>
                              </tr>
                              <caption id="box">
                                  <form action="placeOrder.php" method="post" target="_top">
                                      <input type='hidden' name='business' value='pradeepdv45-facilitator_api1.gmail.com'>
                                      <input type='hidden' name='item_name' value='Camera'>
                                      <input type='hidden' name='item_number' value='CAM#N1'>
                                      <input type='hidden' name='amount' value="<?php echo $_SESSION['total']; ?>">
                                      <input type='hidden' name='no_shipping' value='1'>
                                      <input type='hidden' name='currency_code' value='USD'>
                                      <input type='hidden' name='notify_url' value='http://SITE NAME/payment.php'>
                                      <input type='hidden' name='cancel_return' value='http://SITE NAME/cancel.php'>
                                      <input type='hidden' name='return' value='http://SITE NAME/success.php'>
                                      <!-- COPY and PASTE Your Button Code -->
                                      <input type="hidden" name="cmd" value="_s-xclick">
                                      <input type="hidden" name="hosted_button_id" value="### COPY FROM BUTTON CODE ###">
                                      <input type="image" style="width: 100%;" class="pull-right" src="./image/place_order.jpg" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                   </form>
                              </caption>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
	    </section>
      <script>paypal.Buttons().render('#box');</script>

  	 	<?php include_once("footer.html"); ?>
  </body>

 </html>