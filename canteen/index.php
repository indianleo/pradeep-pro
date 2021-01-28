<?php session_start(); ?>
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
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="products.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
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
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">We've got what you need!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">
              We provide a fast and reliable services with qualtyful food and deserts.
              Here We noticed your intrest and provide according that with affordable price.

            </p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">
              Get Started
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">At Your Service</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Most Delcious</h3>
              <p class="text-muted mb-0">Our Items are updated according to new trendz.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Miscleanous</h3>
              <p class="text-muted mb-0">We provide food according your intrest.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Quality Products</h3>
              <p class="text-muted mb-0">We provide a qualityful products which are very reliable and comfortable.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Comfortable</h3>
              <p class="text-muted mb-0">You can find a best service at your finger.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Breakfast
                  </div>
                  <div class="project-name">
                    Sweet and Tasty
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Non-vegeterian 
                  </div>
                  <div class="project-name">
                    Healthy and Fresh Combinations
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Fries
                  </div>
                  <div class="project-name">
                    A qualityfull and spicy
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Meal
                  </div>
                  <div class="project-name">
                    Fresh main course food.
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Bevearge
                  </div>
                  <div class="project-name">
                    Cofee and cold drinks.
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    South Indian
                  </div>
                  <div class="project-name">
                    South Indian dishes.
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Explore Items in Canteen</h2>
        <a class="btn btn-light btn-xl sr-button" href="products.php">
          Explore
        </a>
      </div>
    </section>

    <section class="bg-primary text-white" id="login">
      <div class="container text-center">
        <div class="login_switch v_padding_md">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary active">
              <input type="radio" name="options" onchange="onSwitch(this,'login_form')" id="option1" autocomplete="off" checked> Login
            </label>
            <label class="btn btn-secondary">
              <input type="radio" name="options" onchange="onSwitch(this,'reg_form')" id="option2" autocomplete="off"> Register
            </label>
          </div>
        </div>
        <!-- Login form -->
        <?php 
          if(isset($_SESSION['login']) && $_SESSION['login'] == 'failed'){
            echo '<span class="label label-info">Login failed. PleaseCheck User Name/Password.</span>';
          }
        ?>
        <form action="action.php" method="post" id="login_form">
          <input type="hidden" name="action" value="login" />
          <div class="form-group row">
            <label for="user_email_login" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="user_email" id="user_email_login" placeholder="email@example.com" required />
            </div>
          </div>
          <div class="form-group row">
            <label for="login_pass" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="user_pass" id="login_pass" placeholder="Password" required />
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="submit" class="btn btn-sm" id="submit" value="Login" />
              <Button type="button" class="btn btn-sm" id="forgot">
                <a href="forgot.php">
                  Forgot Password
                </a>
              </button>
            </div>
          </div>
        </form>

        <!-- Register form  -->
        <form action="action.php" class="hide" method="post" id="reg_form">
          <input type="hidden" name="action" value="reg" />
          <div class="form-group row">
            <label for="user_name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" required/>
            </div>
          </div>

          <div class="form-group row">
            <label for="user_mobile" class="col-sm-2 col-form-label">Number</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="user_mobile" name="user_mobile" placeholder="Contact No." />
            </div>
          </div>

          <div class="form-group row">
            <label for="user_email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="user_email" id="user_email" placeholder="email@example.com" required/>
            </div>
          </div>

          <div class="form-group row">
            <label for="user_address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="address" id="user_address" placeholder="Enter Address" required ></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="user_pass" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password" required/>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="submit" class="btn btn-sm" id="submit_reg" value="Submit" />
              <input type="reset" class="btn btn-sm" id="clear_reg" value="Clear" />
            </div>
          </div>
        </form>
      </div>
    </section>
    <script>
      
      function onSwitch(ref,type){
        document.querySelector('#login_form').style.display = type == "login_form"? 'block': "none";
        document.querySelector('#reg_form').style.display = type == "reg_form"? 'block' : "none";
      }

    </script>

    <?php include_once("footer.html"); ?>

  </body>

</html>
