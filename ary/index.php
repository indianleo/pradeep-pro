<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
      <link rel="stylesheet" href="main.css" type="text/css"/>
      <script src="main.js"></script>
      <link rel="stylesheet" href="main.css" type="text/css"/>
  </head>
  <body>
      <div class="back_cover container-fluid"></div>
      <!-- menu code here -->
      <div id="header container-fluid" class="header">
          <?php include('menu.html'); ?>
      </div>

      <!-- image slider code here -->
      <div class="image_slider">
        <div id="carousel_box" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel_box1" data-slide-to="0" class="active"></li>
              <li data-target="#carousel_box2" data-slide-to="1"></li>
              <li data-target="#carousel_box4" data-slide-to="3"></li>
              <li data-target="#carousel_box5" data-slide-to="4"></li>
              <li data-target="#carousel_box6" data-slide-to="5"></li>
              <li data-target="#carousel_box7" data-slide-to="6"></li>
              <li data-target="#carousel_box6" data-slide-to="7"></li>
              <li data-target="#carousel_box7" data-slide-to="8"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active" id="carousel_box1">
                <img src="image/img1.jpg" alt="image 1">
              </div>
              <div class="item" id="carousel_box3">
                <img src="image/img3.jpg" alt="Image 3">
              </div>
              <div class="item" id="carousel_box4">
                <img src="image/img4.jpg" alt="Image 4">
              </div>
              <div class="item" id="carousel_box5">
                <img src="image/img5.jpg" alt="Image 5">
              </div>
              <div class="item" id="carousel_box6">
                <img src="image/img6.jpg" alt="Image 6">
              </div>
              <div class="item" id="carousel_box7">
                <img src="image/img7.jpg" alt="Image 7">
              </div>
              <div class="item" id="carousel_box8">
                <img src="image/img8.jpg" alt="Image 8">
              </div>
              <div class="item" id="carousel_box9">
                <img src="image/img9.jpg" alt="Image 9">
              </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel_box" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel_box" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
      </div>

      <!-- middle content code here -->
      <div class="center_item container-fluid">
          <div class="back"></div>
          <div class="center_content container" id="item1">
              <div class="row">
                  <div class="col-sm-12">
                      <div style="width:60%;margin:100px auto">
                          <h1 class="center_title">
                               Welcome to <span style="color:#4EC2E6;">ARY Infra Realcon</span> Pvt. Ltd.
                          </h1>
                          <h3 class="center_label">We Build your Home.</h3>
                          <p class="center_text">
                              ARY Infra Realcon Pvt. Ltd. is the, most innovative, creative and forward-thinking 
                              real estate company in Allahabad and Lucknow. 
                              Our business philosophy is a commitment to extraordinary service, 
                              honesty and clear communication.
                          </p>
                          <div class="center_btn">
                              Read More
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="center_item container-fluid">
          <div class="back"></div>
          <div class="center_content container" id="item1">
              <div class="row">
                  <div class="col-sm-12">
                      <h1 class="center_title">
                          Our Current <span style="color:#4EC2E6;">Projects</span>
                      </h1>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-3">
                      <div class="service_items">
                          <div class="services_box" style="background-image:url('image/project1.jpg');">
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="service_items">
                          <div class="services_box"  style="background-image:url('image/project2.jpg');">
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="service_items">
                          <div class="services_box"  style="background-image:url('image/project3.jpg');">
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="service_items">
                          <div class="services_box"  style="background-image:url('image/project4.jpg');">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="center_item container-fluid">
          <div class="back"></div>
          <div class="center_content container" id="item1">
              <div class="row">
                  <div class="col-sm-12">
                      <h1 class="center_title">
                          Our <span style="color:#4EC2E6;">Services</span>
                      </h1>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-3">
                      <div class="service_items">
                          <div class="services_box" style="background-image:url('image/services1.jpg');">
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="service_items">
                          <div class="services_box"  style="background-image:url('image/services2.jpg');">
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="service_items">
                          <div class="services_box"  style="background-image:url('image/services3.jpg');">
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="service_items">
                          <div class="services_box"  style="background-image:url('image/services4.jpg');">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- footer code here -->
      <div class="footer" id="footer">
          <?php include('footer.html'); ?>
      </div>
  </body>
</html>
