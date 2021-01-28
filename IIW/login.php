<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <style>
            .register {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="main-header" id="main-header">
            <?php include_once('menu.html'); ?>
        </div>
        <br/>
        <div class="formContainer" id="login">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h3 class="barHeading">Login</h3>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-offset-0 col-sm-6 col-xs-offset-1 col-xs-10">
                        <div class="contact-form">
                            <form role="form" action="action.php" method="post">
                                <input type="hidden" name="action" value="login" />
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" id="user_name" placeholder="User Name">
                                </div>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="pass" id="user_pass" placeholder="Password">
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="contact-button" value="Login" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-1 col-xs-10">
                    <div class="address">
                        <h4 onclick="register()">Register</h4>
                        <p>Click on register If you are new here.</p>
                        <a href="#">Forgot Password</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="formContainer register" id="register">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <div class="text-center">
                        <h3 class="barHeading">Register</h3>
                    </div>
                    </div>
                    <div class="col-md-7 col-sm-offset-0 col-sm-6 col-xs-offset-1 col-xs-10">
                        <div class="contact-form">
                            <form role="form" action="action.php" method="post">
                                <input type="hidden" name="action" value="join" />
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
                                </div>
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="contact-button" value="Join" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-5 col-xs-offset-1 col-xs-10">
                        <div class="address">
                            <img src="" alt="demo"/>
                            <p>Enter your details to access all feature of information world.<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('footer.html'); ?>
        <script>
            function register() {
                document.querySelector("#login").style.display="none";
                document.querySelector("#register").style.display="block"
            }
        </script>
    </body>
</html>