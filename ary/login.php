<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
      <link rel="stylesheet" href="main.css" type="text/css"/>
      <style>
          .top_banner{
            height:200px;
          }
          .login_box{
            display: none;
          }
          .active{
            display: block;
          }
          .login_btn button{
            width:150px;
            margin-bottom:10px;
          }
      </style>
  </head>
  <body>
      <div id="header container-fluid" class="header">
          <?php include('menu.html'); ?>
      </div>
      <div class="container-fluid" style="height:481px;background:url('image/login.jpg');background-size:100% 100%;">
          <div class="row" style="margin-top:15%">
              <div class="col-sm-2 login_btn">
                  <button class="btn btn-info login_type" id="user_login_btn" for="user_login">User Login</button>
                  <button class="btn btn-info login_type" id="emp_login_btn" for="emp_login">Employee Login</button>
                  <button class="btn btn-info login_type" id="admin_login_btn" for="admin_login">Admin Login</button>
              </div>
              <div class="col-sm-4">
                  <!--  User login code here starts -->
                  <div class="login_box active" id="user_login">
                      <form method="post" action="process.php">
                          <input type="hidden" name="action" value="user_login"/>
                          <div class="row form-group">
                              <div class="col-sm-12 input-group">
                                  <span class="input-group-addon" id="user_name_area">User ID</span>
                                  <input type="text" name="user_name" class="form-control" id="user_name" aria-describedby="user_name_area" placeholder="User Name/ID" />
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col-sm-12 input-group">
                                  <span class="input-group-addon" id="user_pass_area">Password</span>
                                  <input type="password" name="user_pass" class="form-control" id="user_pass" aria-describedby="user_pass_area" placeholder="Enter Password" />
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col-sm-12">
                                  <input type="submit" name="user_login_btn" class="btn btn-danger" id="user_login_btn" value="Login" />
                              </div>
                          </div>
                      </form>
                  </div>
                  <!--  Employee login code here starts -->
                  <div class="login_box" id="emp_login">
                      <form method="post" action="process.php">
                          <input type="hidden" name="action" value="emp_login"/>
                          <div class="row form-group">
                              <div class="col-sm-12 input-group">
                                  <span class="input-group-addon" id="emp_name_area">Employee ID</span>
                                  <input type="text" name="emp_name" class="form-control" id="emp_name" aria-describedby="emp_name_area" placeholder="Employee Name/ID" />
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col-sm-12 input-group">
                                  <span class="input-group-addon" id="emp_pass_area">Password</span>
                                  <input type="password" name="emp_pass" class="form-control" id="emp_pass" aria-describedby="emp_pass_area" placeholder="Enter Password" />
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col-sm-12">
                                  <input type="submit" name="emp_login_btn" class="btn btn-danger" id="emp_login_btn" value="Login" />
                              </div>
                          </div>
                      </form>
                  </div>
                  <!--  Admin login code here starts -->
                  <div class="login_box" id="admin_login">
                      <form method="post" action="process.php">
                          <input type="hidden" name="action" value="admin_login"/>
                          <div class="row form-group">
                              <div class="col-sm-12 input-group">
                                  <span class="input-group-addon" id="admin_name_area">Admin ID</span>
                                  <input type="text" name="admin_name" class="form-control" id="admin_name" aria-describedby="admin_name_area" placeholder="Admin Name/ID" />
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col-sm-12 input-group">
                                  <span class="input-group-addon" id="user_pass_area">Password</span>
                                  <input type="password" name="admin_pass" class="form-control" id="admin_pass" aria-describedby="admin_pass_area" placeholder="Enter Password" />
                              </div>
                          </div>
                          <div class="row form-group">
                              <div class="col-sm-12">
                                  <input type="submit" name="admin_login_btn" class="btn btn-danger" id="admin_login_btn" value="Login" />
                              </div>
                          </div>
                      </form>
                  </div>
                  <br/>
              </div>
          </div>
      </div>
      <div class="footer" id="footer">
          <?php include('footer.html'); ?>
      </div>
      <script>
        $(document).ready(function(){
            $(".login_type").click(function(){
              var id="#"+$(this).attr("for");
              $(".login_box").removeClass('active');
              $(id).addClass('active');
            })
        });
      </script>
  </body>
</html>
