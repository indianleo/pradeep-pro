<?php
    session_start();
    //$con = mysqli_connect("localhost","abcnewse_db","786Anamika","abcnewse_db");
	
	// testing purpose only
    $con = mysqli_connect("localhost","root","","iiw");

	foreach ($_REQUEST as $key => $value) {
	  $data[$key] = $value;
    }
    switch( $data['action'] ){
        case "news_upload" : upload_news($con,$data);
        break;
        case "records_upload" : upload_record($con,$data);
        break;
        case "join" : registeraton($con,$data);
        break;        
        case "login" : login($con,$data);
        break;
        default : echo "Action -> ". $data['action'] ." <- not found !!!";
        break;
    }

    function login($con,$data) {
        $res = mysqli_query($con,"select * from users where `email` = '$data[user_id]' and `pass` = '$data[user_pass]' ");
        if ( $res ) {
            $ans = mysqli_fetch_assoc($res);
            $_SESSION['user'] = $ans;
            header("location:users.php");
        } else {
            header("location:index.php");
        }
    }

    function registeraton($con,$data) {
        $res = mysqli_query($con,"insert 
                                    into 
                                users(
                                    `name`,
                                    `email`,
                                    `pass`,
                                    `adhaar`,
                                    `contact`,
                                    `city`
                                ) 
                                values(
                                    '$data[user_name]',
                                    '$data[user_email]',
                                    '$data[user_pass]',
                                    '$data[user_adhaar]',
                                    '$data[user_mobile]',
                                    '$data[user_city]'
                                )"
                            );
        if ( $res ) {
            header("location:index.php");
        } else {
            echo "Registration Failed. Please Try Again !!!";
        }
    }

    function upload_record($con,$data){
        $html = '
            <div class="records_upload">
                <br/>
                <form method="post" action="web_action.php" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="save_upload_records" />
                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="record_name">Name</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="record_name" id="record_name" class="form-control" placeholder="Name" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="record_pic">Image</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="file" name="record_pic" id="record_pic" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="record_info">About</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea name="record_info" id="record_info" class="form-control" placeholder="About Person/Place/Things etc"></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="record_place">Place</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="record_place" id="record_place" class="form-control" placeholder="Place" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="record_source">Source</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="record_source" id="record_source" class="form-control" placeholder="Source of Record" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="connection">Connections</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="connection" id="connection" class="form-control" placeholder="Connections" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="upload_by">Upload By</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="upload_by" id="upload_by" class="form-control" placeholder="Upload By" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="contact">Contact</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name="news_submit" id="news_submit" class="btn btn-success" value="Upload" />
                        </div>
                    </div>
                </form>
            </div>
        ';
        echo $html;
    }

    function upload_news($con,$data) {
        $html = '
            <div class="news_upload">
                <br/>
                <form method="post" action="web_action.php" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="save_upload_news" />
                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="news_title">News Title</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="news_title" id="news_title" class="form-control" placeholder="News Title" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="news_type">News Type</label>
                        </div>
                        <div class="col-sm-6">
                            <select name="news_type" id="news_type" class="form-control">
                                <option value="other">Select</option>
                                <option value="latest">Latest</option>
                                <option value="bussiness">Bussiness</option>
                                <option value="national">National</option>
                                <option value="international">International</option>
                                <option value="education">Educational</option>
                                <option value="entertainments">Entertainments</option>
                                <option value="sports">Sports</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="news_pic">News Image</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="file" name="news_pic" id="news_pic" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="news_info">News Details</label>
                        </div>
                        <div class="col-sm-6">
                            <textarea name="news_info" id="news_info" class="form-control" placeholder="News Details"></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="news_place">News Place</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="news_place" id="news_place" class="form-control" placeholder="News Place" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="isUri">Use News Url</label>
                        </div>
                        <div class="col-sm-1">
                            <input type="checkbox" name="isUri" id="isUri" class=""/>
                        </div>
                        <div class="col-sm-5">
                            <input type="text" name="news_source" id="news_source" class="form-control" placeholder="News Source" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="news_date">News Date</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="date" name="news_date" id="news_date" class="form-control" placeholder="News Date" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                            <label for="upload_by">Upload By</label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="upload_by" id="upload_by" class="form-control" placeholder="Upload By" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-sm-offset-2">
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name="news_submit" id="news_submit" class="btn btn-success" value="Upload" />
                        </div>
                    </div>
                </form>
            </div>
        ';
        echo $html;
    }

?>