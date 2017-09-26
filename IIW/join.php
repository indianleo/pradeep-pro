<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <style>
             body{
                background:url('image/back3.jpg');
            }
            .join_container{
                width:100%;
                background:url('image/people.jpg');
                background-size:100% 100%;
            }
            lable{
                color:#15181B;
                font-size:18px;
            }
            #join_btn:hover{
                background:#B30233 !important;
            }
        </style>
    </head>
    <body>
        <div class="menu_holder index_top">
            <?php include_once('menu.html'); ?>
        </div>
        <div class="join_container">
            <div style="height:100px;"></div>
            <div class="reg_form container box_bottom">
                <div>
                    <h3 style="text-align:center;color:#B30233;">Registraion</h3>
                    <hr style="border-color:#A1A070;"/>
                    <br/>
                </div>
                <div class="form">
                    <form action="process.php" name="reg_form" method="post">
                        <input type="hidden" name="action" value="join" />

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <lable for="user_name">Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Name"/>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <lable for="user_email">Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter Email"/>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <lable for="user_pass">Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" name="user_pass" id="user_pass" class="form-control" placeholder="Enter Password"/>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <lable for="user_mobile">Mobile No.</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="user_mobile" id="user_mobile" class="form-control" placeholder="Enter Mobile No."/>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <lable for="user_adhaar">Adhaar No.</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" name="user_adhaar" id="user_adhaar" class="form-control" placeholder="Enter Adhaar No."/>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                
                            </div>
                            <div class="col-sm-9">
                                <input type="submit" name="join_btn" id="join_btn" class="btn_style text_white" style="border:1px solid transparent;background:#900C3E;" value="Join"/>
                            </div>
                        </div>


                    </form>
                    <br/>
                </div>
            </div>
        </div>
        

        <div>
            <?php include_once('footer.html'); ?>
        </div>
        <script>
            var height = screen.height;
            $(".join_container").height(height-130);
        </script>
    </body>
</html>