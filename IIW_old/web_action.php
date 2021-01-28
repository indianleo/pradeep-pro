<?php
    //$con = mysqli_connect("localhost","iiw","786pradeep","iiw");
	
	// testing purpose only
    $con = mysqli_connect("localhost","root","","iiw");

	foreach ($_REQUEST as $key => $value) {
	  $data[$key] = $value;
    }

    switch( $data['action'] ){
        case "save_upload_news" : save_upload_news($con,$data);
        break;
        case "save_upload_records" : save_upload_records($con,$data);
        break;
        case "setRating" : set_Rating($con,$data);
        break;
        default : echo "Action -> ". $data['action'] ." <- not found !!!";
        break;
    }

    function set_Rating($con,$data) {
        $pre = mysqli_query($con,"select * from records where `id` = '$data[id]' ");
        $pre_ans = mysqli_fetch_assoc($pre);
        if( $data['type'] == "right" ) {
            $r_rate = $pre_ans['right'] + 1;
            $res = mysqli_query($con,"update records set `right` = '$r_rate' where `id` = '$data[id]' ");
            if($res){
                echo "Set Right Successfull";
            } else {
                echo "Set Right Failed";
            }
        } else {
            $w_rate = $pre_ans['wrong'] + 1;
            $res = mysqli_query($con,"update records set `wrong` = '$w_rate' where `id` = '$data[id]' ");
            if($res){
                echo "Set Wrong Succesfull";
            } else {
                echo "Set Wrong Failed";
            }
            
        }
        
    }

    function save_upload_records($con,$data){
        $image_name = uniqid().$_FILES['record_pic']['name'];
        $f_path="record_image/$image_name";
        $res = mysqli_query($con,"
                                    insert 
                                        into 
                                    records(
                                        `name`,
                                        `image`,
                                        `about`,
                                        `source`,
                                        `connection`,
                                        `upload_by`,
                                        `contact`,
                                        `city`
                                    ) 
                                    values(
                                        '$data[record_name]',
                                        '$f_path',
                                        '$data[record_info]',
                                        '$data[record_source]',
                                        '$data[connection]',
                                        '$data[upload_by]',
                                        '$data[contact]',
                                        '$data[record_place]'
                                        
                                    )
                                "
                            );

        if($res){
			move_uploaded_file($_FILES['record_pic']['tmp_name'], $f_path);
			header("location:upload.php");
		}
		else{
			 echo "Upload Failed !!!";
		}
    }

    function save_upload_news($con,$data){
        $image_name = uniqid().$_FILES['news_pic']['name'];
        $f_path="news_image/$image_name";
        $isUri = $data['isUri'] ? 1 : 0;
        $news_img = strlen($_FILES['news_pic']['name']) > 0 ? $f_path :'image/news_default.jpg';
        $res = mysqli_query($con,"
                                    insert 
                                        into 
                                    news(
                                        `news_title`,
                                        `news_pic`,
                                        `news_info`,
                                        `news_source`,
                                        `news_type`,
                                        `upload_by`,
                                        `news_place`,
                                        `isUri`,
                                        `news_date`
                                    ) 
                                    values(
                                        '$data[news_title]',
                                        '$news_img',
                                        '$data[news_info]',
                                        '$data[news_source]',
                                        '$data[news_type]',
                                        '$data[upload_by]',
                                        '$data[news_place]',
                                        '$isUri',
                                        '$data[news_date]'
                                    )
                                "
                            );

        if($res){
			move_uploaded_file($_FILES['news_pic']['tmp_name'], $f_path);
			header("location:upload.php");
		}
		else{
			 echo "Upload Failed !!!";
		}
    }

?>