<?php
    $data = $_REQUEST['data'];
    $con = mysqli_connect("localhost","root","","iiw");
    $res = mysqli_query($con,"select * from records where name like '%$data%' or about like '%$data%' or source like '%$data%' or connection like '%$data%' or contact like '%$data%' or city like '%$data%'");
    $html = "";
    if( $res ){
        
        while ($ans = mysqli_fetch_assoc($res) ) { 
            $html .= '
                <div class="filter_data box_gray">
                    <div class="row">
                        <div class="col-sm-3" style="padding-left:0;">
                            <div class="record_img_holder">
                                <img src="'.$ans["image"].'" alt="'.$ans["image"].'" class="img-responsive" />
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="record_data_box">
                                <div class="record_title">
                                    <h3>'.$ans["name"].'</h3>
                                </div>
                                <div class="record_about">
                                    '.$ans["about"].'
                                </div>
                                <div class="record_city v_padding_sm">
                                    '.$ans["city"].'
                                </div>
                                <div class="record_rate">
                                    <span class="btn btn-success" record_id="'.$ans["id"].'" type="right" onclick="setRating(this)">
                                        <span class="fa fa-thumbs-up"></span>
                                        <span>'.$ans["right"].'</span>
                                    </span>
                                    <span class="btn btn-danger" record_id="'.$ans["id"].'" type="wrong" onclick="setRating(this)">
                                        <span class="fa fa-thumbs-down"></span>
                                        <span>'.$ans["wrong"].'<span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        } 

        echo $html;
    } else {
        echo "<h1>Image Not Found</h1>";
    }
?>