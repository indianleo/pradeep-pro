<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
      <link rel="stylesheet" href="main.css" type="text/css"/>
      <style>
        .img_box{
          padding: 10px;
        }
        .img_box img{
          box-shadow: 0 0 10px 2px #000;
        }
      </style>
  </head>
  <body>
      <div id="header container-fluid" class="header">
          <?php include('menu.html'); ?>
      </div>
      <div class="gallary_box container">
          <div class="row">
              <div class="col-sm-4 img_box">
                  <img src="image/gal1.jpg" class="img-responsive" alt="gallary Image1"/>
              </div>
              <div class="col-sm-4 img_box">
                  <img src="image/gal2.jpg" class="img-responsive" alt="gallary Image1"/>
              </div>
              <div class="col-sm-4 img_box">
                  <img src="image/gal3.jpg" class="img-responsive" alt="gallary Image3"/>
              </div>
              <div class="col-sm-4 img_box">
                  <img src="image/gal4.jpg" class="img-responsive" alt="gallary Image4"/>
              </div>
              <div class="col-sm-4 img_box">
                  <img src="image/gal5.jpg" class="img-responsive" alt="gallary Image5"/>
              </div>
              <div class="col-sm-4 img_box">
                  <img src="image/gal6.jpg" class="img-responsive" alt="gallary Image6"/>
              </div>
          </div>
      </div>
      <div class="footer" id="footer">
          <?php include('footer.html'); ?>
      </div>
  </body>
</html>
