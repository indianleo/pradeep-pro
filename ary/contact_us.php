<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
      <link rel="stylesheet" href="main.css" type="text/css"/>
      <style>
        .top_banner{
          background: url('image/contact_us.jpg');
          background-size: 100% 100%;
          height:200px;
        }
      </style>
  </head>
  <body>
      <div id="header container-fluid" class="header">
          <?php include('menu.html'); ?>
      </div>
      <div class="top_banner container-fluid">
      </div>
      <br/>
      <div class="container">
          <div class="row">
              <div class="col-sm-4">
                  <h4 class="h_style">Head Office</h4>
                  <h5>ARY Infra Realcon PVT. LTD.</h5>
                  <p>
                    Milan Plaza, Civil Lines,
                    Allahabad - 211001
                  </p>
                  <p><b>Contact No.</b></p>
                  <p>+91 7523888800</p>
                  <p><b>Email Address</b></p>
                  <a href="#" style="color:#157284;">info@ary.in</a>
              </div>
          </div>
          <br/>
          <div class="row">
              <div class="row">
                  <div class="col-sm-12">
                      <h3 class="h_style">Contact Us</h3>
                  </div>
              </div>
              <form method="post" action="process.php">
                <input type="hidden" name="action" value="feedback"/>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <input type="text" name="user_name" class='form-control' id="user_name" placeholder="Your Name"/>
                    </div>
                    <div class="col-sm-4 form-group">
                        <input type="text" name="country" class='form-control' id="country" placeholder="Country"/>
                    </div>
                    <div class="col-sm-4 form-group">
                        <input type="text" name="state" class='form-control' id="state" placeholder="State"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12">
                        <textarea name="address" id="address" class='form-control' placeholder="Address"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <input type="text" name="city" class='form-control' id="city" placeholder="City"/>
                    </div>
                    <div class="col-sm-4 form-group">
                        <input type="number" name="mobile" class='form-control' id="mobile" placeholder="Mobile No."/>
                    </div>
                    <div class="col-sm-4 form-group">
                        <input type="email" name="user_email" class='form-control' id="user_email" placeholder="Email"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12">
                        <textarea name="feedback" class='form-control' id="feedback" placeholder="Feedback"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <input type="submit" name="submit_btn" class="btn btn-info" id="submit_btn" value="Submit"/>
                    </div>
                </div>
              </form>
          </div>
      </div>
      <div class="footer" id="footer">
          <?php include('footer.html'); ?>
      </div>
  </body>
</html>
