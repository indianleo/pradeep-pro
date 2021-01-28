<?php
    session_start();
    //$con = mysqli_connect("localhost","abcnewse_db","786Anamika","abcnewse_db");
	
	// testing purpose only
    $con = mysqli_connect("localhost","root","","iiw");

	foreach ($_REQUEST as $key => $value) {
	  $data[$key] = $value;
    }
    switch($data['action']){
        case "update_post" : update_post($con,$data);
        break;
        case "update_post_reviews" : update_post_reviews($con,$data);
        break;
        case 'get_post' : get_post($con,$data);
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
        $res = mysqli_query($con,"select * from user where `email` = '$data[email]' and `pass` = '$data[pass]' ");
        if ( $res ) {
            $ans = mysqli_fetch_assoc($res);
            $_SESSION['user'] = $ans;
            header("location:blogs.php");
        } else {
            header("location:index.php?error=login Failer");
        }
    }

    function registeraton($con, $data) {
        $res = mysqli_query($con, "insert 
                                    into 
                                user(
                                    `name`,
                                    `email`,
                                    `pass`,
                                    `dob`,
                                    `mobile`
                                )
                                values(
                                    '$data[name]',
                                    '$data[email]',
                                    '$data[pass]',
                                    '$data[dob]',
                                    '$data[mobile]'
                                )"
                            );
        if ( $res ) {
            header("location:index.php");
        } else {
            echo "Registration Failed. Please Try Again !!!";
        }
    }

    function upload_reply($con,$data){
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

    function update_post($con, $data) {
        $post_status = "pending";
        //$update_date = 
        $post_image_path = "post/".uniqid().$_FILES['post_image']['name'];
        $res = mysqli_query($con, "insert 
                                        into 
                                    post (
                                        `user_email`,
                                        `date`,
                                        `post_title`,
                                        `post_image`,
                                        `post_content`,
                                        `post_status`,
                                        `post_type`
                                    )
                                    values(
                                        '$data[user_email]',
                                        NOW(),
                                        '$data[post_title]',
                                        '$post_image_path',
                                        '$data[post_content]',
                                        '$post_status',
                                        '$data[post_type]'
                                    )"
                                );
        if ( $res ) {
            move_uploaded_file($_FILES['post_image']['tmp_name'], $post_image_path);
            header("location:blogs.php");
        } else {
            var_dump($res);
            echo "Update Failed. Please Try Again !!!";
        }
    }

    function update_post_reviews($con, $data) {
        $review_status = "pending";
        $res = mysqli_query($con, "insert 
                                        into 
                                    reviews (
                                        `post_id`,
                                        `user_email`,
                                        `user_website`,
                                        `user_name`,
                                        `user_review`,
                                        `status`,
                                        `date`
                                    )
                                    values(
                                        '$data[post_id]',
                                        '$data[user_email]',
                                        '$data[user_website]',
                                        '$data[user_name]',
                                        '$data[user_review]',
                                        '$review_status',
                                        NOW()
                                    )"
                                );
        if ( $res ) {
            header("location:blogs.php");
        } else {
            var_dump($res);
            echo "Update Failed. Please Try Again !!!";
        }
    }

    function get_post($con, $data) {
        $user_email = $_SESSION['user']['email'];
        if ($data['id']) {
            $res = mysqli_query($con, "select * from post where id='$data[id]' ");
        } else {
            $res = mysqli_query($con, "select * from post where user_email='$user_email' and post_type='$data[post_type]' ");
        }
       // $ans = mysqli_fetch_assoc($res);
        $ans = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($ans) {
           // var_dump(json_encode($ans));
           echo json_encode($ans);
        } else {
            echo "Error in loading...";
        }

        return $html;
    }

    function get_post_reviews($con, $data) {
        $res = mysqli_query($con, "select * from reviews where post_id='$data[post_id]'");
        $ans = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($ans) {
            echo json_encode($ans);
        } else {
            echo "Error in loading...";
        }

        return $html;
    }
?>