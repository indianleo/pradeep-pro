<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <link rel="stylesheet" type="text/css" href="css/job.css" />
    </head>
    <body>
        <div class="menu_holder index_top">
            <?php include_once('menu.html'); ?>
        </div>
        <div style="height:50px;"></div>

        <div class="search_pane">
            <div class="row">
                <div class="col-sm-12">
                    <br />
                    <div class="input-group search_bar">
                        <input type="search" class="form-control login_inputs" name="search_input" id="search_input" aria-describedby="user_id" placeholder="Enter Work Area, Skills, City or Company Name to Search here." />
                        <span class="input-group-addon login_label" onclick="search_news(this)">Search</span>
                    </div>
                    <br/>
                </div>
            </div>
        </div>

        <div class="job_pane">
            <div class="job_tiles_box container-fluid" id="job_tiles_box">
                <?php
                    $con = mysqli_connect("localhost","root","","iiw");
                    $res = mysqli_query($con,"select * from jobs");
                    $fetch_data = "";
                    if ( mysqli_num_rows($res) > 0 ) {
                        while($row = mysqli_fetch_assoc($res)) {
                            $fetch_data .= '
                                <div class="tiles_item center vFlex bg_black">
                                    <div class="tiles_image">
                                        <img 
                                            src = "image/back4.jpg" 
                                            class = "img-responsive" 
                                            alt = "tiles images" 
                                        />
                                    </div>
                                    <div 
                                        class = "tiles_content text-center h_padding text_white" 
                                        style = "padding-top:15px;padding-bottom:50px;"
                                    >
                                        <span>
                                            '.$row["job_info"].'
                                        </span> 
                                    </div>
                                    <div class="tiles_title text-center text_white" style="font-size:28px;">
                                        <span>
                                            '.$row["job_title"].'
                                        </span>
                                    </div>
                                    <div class="tiles_tag text-center" style="height:30px;color:#00cc99;">
                                        <span>
                                            '.$row["job_post"].'
                                        </span>
                                    </div>
                                    <div class="tiles_btn btn_style text_white" style="border:1px solid #e6e6e6;">
                                        <span>
                                            <a href="share.php" class="text_white">
                                                Apply
                                            </a>
                                        </span>
                                    </div>
                                    <div style="height:50px;"></div>
                                </div>
                            ';
                        }
                    } else {
                        
                    }

                    echo $fetch_data;
                ?>
                

            </div>
        </div>

        <div>
            <?php include_once('footer.html'); ?>
        </div>
    </body>
</html>