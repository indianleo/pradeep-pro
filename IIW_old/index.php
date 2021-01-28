<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
    </head>
    <body>
        <div class="menu_holder index_top">
            <?php include_once('menu.html'); ?>
        </div>
        <div class="top_section" style="z-index:-1;">
        </div>

        <div id="login_box" class="hide">
            <div class = "login_badge center">
                <img src="icon/title.png" class="img-responsive v_padding_md" />
            </div>
            <div class="login_container" style="width:70%; margin:auto">
                <form action="action.php" method="post">
                    <input type="hidden" name="action" value="login" />
                    <div class="row">
                        <div class="col-sm-12 form-group">
                                <input 
                                    type = "text" 
                                    name = "user_id" 
                                    id = "user_id" 
                                    placeholder = "User Name" 
                                    class = "form-control"
                                />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                                <input 
                                    type = "password" 
                                    name = "user_pass" 
                                    id = "user_pass" 
                                    placeholder = "Password" 
                                    class = "form-control"
                                />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                                <input 
                                    type = "submit" 
                                    name = "login_btn" 
                                    id = "login_btn" 
                                    value = "Login"
                                    class = "btn btn-success"
                                />
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="top_container full_width" id="top_container">
            <div style="height:25%;"></div>
            <div class="top_title">
                <h1 class="text-center">
                    Welcome in Indian Information World
                </h1>
            </div>
            <div class="top_title2 text-center">
                <span>A plateform for everthing.</span>
            </div>
            <div class="member_box center">
                <div class="member_btn row_style center effect">
                    <span>
                        <a href="#" source="login_box" onclick="modalLocal(this)">
                            Login
                        </a>
                    </span>
                </div>
                <div class="member_btn row_style center effect" style="width:170px;">
                    <span>
                        <a href="upload.php" >
                            Upload Information
                        </a>
                    </span>
                </div>
                <div class="member_btn row_style center effect">
                    <span>
                        <a href="join.php" >
                            Join
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <div class="container" id="tiles_holder">
            <div class="tiles_box">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="tiles_item center vFlex bg_black">
                            <div class="tiles_image row">
                                <img 
                                    src = "image/back4.jpg" 
                                    class = "img-responsive" 
                                    alt = "tiles images" 
                                />
                            </div>
                            <div class="tiles_icon v_padding text_white" style="padding-top:40px;">
                                <i class="fa fa-street-view fa-4x"></i>
                            </div>
                            <div 
                                class = "tiles_content text-center h_padding text_white" 
                                style = "padding-top:15px;padding-bottom:50px;"
                            >
                                <span>
                                    InfoApp is a plateform where you can explore information about things. 
                                    Things which are arround you and your belongings. Here you can find 
                                    user's' openion about any place and products. You cam also find people
                                    by name or mobile numbers and can see history of that person and you can 
                                    judg and rate that information.
                                </span> 
                            </div>
                            <div class="tiles_title text-center text_white" style="font-size:28px;">
                                <span>
                                    Information
                                </span>
                            </div>
                            <div class="tiles_tag text-center" style="height:30px;color:#00cc99;">
                                <span>
                                    A plateform to know anything
                                </span>
                            </div>
                            <div class="tiles_btn btn_style text_white" style="border:1px solid #e6e6e6;">
                                <span>
                                    <a href="search.php" class="text_white">
                                        Explore
                                    </a>
                                </span>
                            </div>
                            <div style="height:50px;"></div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="tiles_item center vFlex bg_black">
                            <div class="tiles_image row">
                                <img src="image/back4.jpg" class="img-responsive" alt="tiles images" />
                            </div>
                            <div class="tiles_icon v_padding text_white" style="padding-top:40px;">
                                <i class="fa fa-yelp fa-4x"></i>
                            </div>
                            <div 
                                class = "tiles_content text-center h_padding text_white" 
                                style = "padding-top:15px;padding-bottom:50px;"
                            >
                                <span>
                                    InfoApp provide facilty to upload crime updates or any history 
                                    or review of any person, products, oraganization and place. Here you can upload you faviouret 
                                    place,product and ideas. You can rate that prodcuts which was uploaded by this other 
                                    people will know which procuct, place or organization is good or bad. 
                                </span> 
                            </div>
                            <div class="tiles_title text-center text_white" style="font-size:28px;">
                                <span>
                                    Your Openions
                                </span>
                            </div>
                            <div class="tiles_tag text-center" style="height:30px;color:#00cc99;">
                                <span>
                                    A place to update stuff
                                </span>
                            </div>
                            <div class="tiles_btn btn_style text_white" style="border:1px solid #e6e6e6;">
                                <span>
                                    <a href="user_view.php" class="text_white">
                                        Explore
                                    </a>
                                </span>
                            </div>
                            <div style="height:50px;"></div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="tiles_item center vFlex bg_black">
                            <div class="tiles_image">
                                <img src="image/back4.jpg" class="img-responsive" alt="tiles images" />
                            </div>
                            <div class="tiles_icon v_padding text_white" style="padding-top:40px;">
                                <i class="fa fa-xing fa-4x"></i>
                            </div>
                            <div 
                                class = "tiles_content text-center h_padding text_white" 
                                style = "padding-top:15px;padding-bottom:50px;"
                            >
                                <span>
                                    InfoApp provides an interface to communicate other peoples. 
                                    If you want to share your openions then type here and just post. 
                                    If you want to show anything intresting like your inventions, 
                                    your products, your skills then you can share here and it will infront of all.
                                    If you want share any news then you can share here and it share like news.
                                </span> 
                            </div>
                            <div class="tiles_title text-center text_white" style="font-size:28px;">
                                <span>
                                    Communication
                                </span>
                            </div>
                            <div class="tiles_tag text-center" style="height:30px;color:#00cc99;">
                                <span>
                                    An interface to share
                                </span>
                            </div>
                            <div class="tiles_btn btn_style text_white" style="border:1px solid #e6e6e6;">
                                <span>
                                    <a href="share.php" class="text_white">
                                        Explore
                                    </a>
                                </span>
                            </div>
                            <div style="height:50px;"></div>
                        </div>
                    </div>

                </div>
                <br/>
            </div>
        </div>
        
        <div>
            <?php include_once('footer.html'); ?>
        </div>

    </body>
</html>