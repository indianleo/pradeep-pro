<?php 
	$con = mysqli_connect("localhost","abcnewse_db","786Anamika","abcnewse_db");
	
	// testing purpose only
	//$con = mysqli_connect("localhost","root","","shikhar");
	foreach ($_REQUEST as $key => $value) {
	  $data[$key] = $value;
	}
	switch($data['action']){
		case 'bid_items' : bid_image_upload($con,$data);
		break;
		case 'delete_bidItem' : bid_delete($con,$data);
		break;
		case 'edit_bidItem' : edit_bidItem($con,$data);
		break;
		case 'delete_news' : delete_news($con,$data);
		break;
		case 'edit_news' : edit_news($con,$data);
		break;
		case 'add_bids' : add_bids($con,$data);
		break;
		case 'set_active' : set_active($con,$data);
		break;
		case 'set_block' : set_block($con,$data);
		break;
		case 'update_news_mobileByWeb' : update_news_mobileByWeb($con,$data);
		break;
		default : echo "Action is not defined !!!";
		break;
	}
	
	function set_block($con,$data){
		$res = mysqli_query($con,"update users set `state` = 'Blocked' where `id` ='$data[id]' ");
		if($res){
			header("location:admin.php");
		}
		else {
			echo "Set Block updation failed !!!";
		}
	}
	
	function set_active($con,$data){
		$res = mysqli_query($con,"update users set `state` = 'Active' where `id` ='$data[id]' ");
		if($res){
			header("location:admin.php");
		}
		else {
			echo "Set Active updation failed !!!";
		}
	}
	
	function edit_news($con,$data){
		if ( strlen($_FILES['new_news_pic']['name']) > 4 ) {
			if( file_exists($filename) ){
				$filename = $data['current_pic'];
				unlink($filename);
			}
			$image_name = uniqid().$_FILES['new_news_pic']['name'];
			$f_path="native_image/$image_name";
			
			$res = mysqli_query($con,"update 
										app_news 
									  set 
										`news_title` = '$data[news_title]',
										`news_info` = '$data[news_info]',
										`news_pic` = '$f_path',
										`news_by` = '$data[news_by]',
										`news_place` = '$data[news_place]',
										`cat` = '$data[news_cat]'
									  where
										`id` ='$data[id]' 
									"
							);
							
			if($res){
				move_uploaded_file($_FILES['new_news_pic']['tmp_name'], $f_path);
				header("location:admin.php");
			}
			else{
				 echo "Bid Edit Updatation or  Image Upload failed  !!!";
			}
		} 
		else {
			$res = mysqli_query($con,"update app_news set 
															`news_title` = '$data[news_title]',
															`news_info` = '$data[news_info]',
															`news_by` = '$data[news_by]',
															`news_place` = '$data[news_place]',
															`cat` = '$data[news_cat]'
														where `id` ='$data[id]' "
								);
			if($res){
				header("location:admin.php");
			}
			else {
				echo "Bid Edit Updatation failed !!!";
			}
		}
	}
	
	function edit_bidItem($con,$data){
		if ( strlen($_FILES['item_pic']['name']) > 4 ) {
			if( file_exists($filename) ){
				$filename = $data['current_pic'];
				unlink($filename);
			}
			$image_name = uniqid().$_FILES['item_pic']['name'];
			$f_path="bid_image/$image_name";
			
			$res = mysqli_query($con,"update 
										bid_items 
									  set 
										`proxy` = '$data[proxy]',
										`item_name` = '$data[item_name]',
										`item_pic` = '$f_path',
										`item_info` = '$data[item_info]',
										`bid_state` = '$data[bid_state]'
									  where
										`id` ='$data[id]' 
									"
							);
							
			if($res){
				move_uploaded_file($_FILES['item_pic']['tmp_name'], $f_path);
				header("location:admin.php");
			}
			else{
				 echo "Bid Edit Updatation or  Image Upload failed  !!!";
			}
		} 
		else {
			$res = mysqli_query($con,"update bid_items set 
															`proxy` = '$data[proxy]',
															`item_name` = '$data[item_name]',
															`item_info` = '$data[item_info]',
															`bid_state` = '$data[bid_state]'
														where `id` ='$data[id]' "
								);
			if($res){
				header("location:admin.php");
			}
			else {
				echo "Bid Edit Updatation failed !!!";
			}
		}
		
		
	}
	
	function add_bids($con,$data){
		$res = mysqli_query($con,"update users set `bids` = '$data[bid_no]' where `email` ='$data[user_email]' ");
		if($res){
			header("location:admin.php");
		}
		else {
			echo "Bid updation failed !!!";
		}
	}
	
	function bid_delete($con,$data){
		$filename = $data['pic'];
		if (file_exists($filename)) {
			unlink($filename);
			$res = mysqli_query($con,"delete from bid_items where `id` = '$data[id]'");
			header("location:admin.php");
		} else {
			echo 'Could not delete '.$filename.', file does not exist';
		}
	}
	
	function delete_news($con,$data){
		$filename = $data['news_pic'];
		if (file_exists($filename)) {
			unlink($filename);
			$res = mysqli_query($con,"delete from app_news where `id` = '$data[id]'");
			header("location:admin.php");
		} else {
			$res = mysqli_query($con,"delete from app_news where `id` = '$data[id]'");
			if(!$res){
				echo 'Could not delete '.$filename.', file does not exist or Data incorrect';
			}
		}
	}
	
	function update_news_mobileByWeb($con,$data){
		$image_name = uniqid().$_FILES['news_pic']['name'];
		$f_path="native_image/$image_name";
		$date = date("d-m-Y");
		$res = mysqli_query($con,"insert 
										into 
									app_news(
										`news_title`,
										`news_info`,
										`news_pic`,
										`news_by`,
										`news_date`,
										`news_place`,
										`cat`
									) 
									values(
										'$data[news_title]',
										'$data[news_info]',
										'$f_path',
										'Admin',
										'$date',
										'$data[news_place]',
										'$data[news_cat]'
									)"
							);

		if($res){
			move_uploaded_file($_FILES['news_pic']['tmp_name'], $f_path);
			header("location:admin.php");
		} else {
			echo "Error in News Update !!!";
		}
	}
	
	function bid_image_upload($con,$data){
		$image_name = uniqid().$_FILES['item_pic']['name'];
		$f_path="bid_image/$image_name";
		//$res2=mysqli_query($con,"update profile set cover='$f_path' where user_name='$user'"); 
		
		$res = mysqli_query($con,"
									insert 
										into 
									bid_items(
										`item_name`,
										`item_pic`,
										`item_info`,
										`bid_state`
									) 
									values(
										'$data[item_name]',
										'$f_path',
										'$data[item_info]',
										'$data[bid_state]'
									)
								"
							);
		if($res){
			move_uploaded_file($_FILES['item_pic']['tmp_name'], $f_path);
			header("location:admin.php");
		}
		else{
			 echo "Upload Failed !!!";
		}
	}
?>