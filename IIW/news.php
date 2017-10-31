<!doctype html>
<html>
    <head>
        <?php include_once('header.html'); ?>
        <link rel="stylesheet" type="text/css" href="css/news.css" />
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
                        <input type="search" class="form-control login_inputs" name="search_input" id="search_input" aria-describedby="user_id" placeholder="Enter content, Keywords, Tags, Places, Name to Search here." />
                        <span class="input-group-addon login_label" onclick="search_news(this)">Search</span>
                    </div>
                    <br/>
                </div>
            </div>
        </div>

        <div class="news_pane">
            <div class="news_tiles_box container-fluid" id="news_tiles_box">
                <?php
                    $con = mysqli_connect("localhost","root","","iiw");
                    $res = mysqli_query($con,"select * from news");
                    $fetch_data = "";
                    if ( mysqli_num_rows($res) > 0 ) {
                        while($row = mysqli_fetch_assoc($res)) {
                            $fetch_data .= '
                                <div 
                                    class = "news_tiles flex_box" 
                                    style = "background:url('.$row["news_pic"].');"
                                >
                                    <div class="news_tiles_footer">
                                        <div class="tag center">
                                            '. $row["news_type"] .'
                                        </div>
                                        <div class="news_title">
                                            '. $row["news_title"] .'
                                        </div>
                                        <div class="news_read_button">
                                            <button 
                                                onclick = "readNews(this)" 
                                                source = "'. $row["news_source"] .'"
                                                details = "'. $row["news_info"] .'"
                                                date = "'. $row["news_date"] .'"
                                                title = "'. $row["news_title"] .'"
                                                type = "'. $row["news_type"] .'"
                                                place = "'. $row["news_place"] .'"
                                                pic = "'. $row["news_pic"] .'"
                                                class = "news_read"
                                            >
                                                Read More...
                                            </button>
                                        </div>
                                        <div class="timeline">
                                            <span style="color:#3399ff;">
                                                '. $row["news_date"] .'
                                            </span>
                                            <span style="color:#C70039;padding-left:5px; padding-right:5px;">
                                                |
                                            </span>
                                            <span style="color:#a3a375;">
                                                '. $row["upload_by"] .'
                                            </span>
                                        </div>
                                    </div>
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