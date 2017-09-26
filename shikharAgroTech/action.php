<?php
	if($_SERVER['HTTP_HOST']=="localhost"){
		$host="localhost";
		$user="abcnewse_db";
		$pass="786Anamika";
		$dbas="abcnewse_db";
	} 
	else {
		$host="localhost";
		$user="786Anamika";
		$pass="hkmQ*65C4KZD";
		$db="abcnewse_db";
	}
	$data = $_REQUEST['data'];
	$temp = json_decode($data);
	$con = mysqli_connect("localhost","abcnewse_db","786Anamika","abcnewse_db");
	
	// testing purpose only
	//$con = mysqli_connect("localhost","root","","shikhar");
	
	switch($temp->action){
		case "login" : login($con,$temp);
		break;
		case "join" : join_users($con,$temp);
		break;
		case 'bid_req_user' : bid_req_user($con,$temp);
		break;
		case "view_users" :  view_users($con,$temp);
		break;
		case "view_mobile_users" :  view_mobile_users($con,$temp);
		break;
		case 'view_mobile_user_records' : view_mobile_user_records($con,$temp);
		break;
		case 'view_mobile_bidItems' : view_mobile_bidItems($con,$temp);
		break;
		case "set_mobile_user_state" : set_mobile_user_state($con,$temp);
		break;
		case "view_mobile_bidsItems" :  view_mobile_bidsItems($con,$temp);
		break;
		case "bid_item_mobile_update" : bid_item_mobile_update($con,$temp);
		break;
		case 'bid_mobile_delete' : bid_mobile_delete($con,$data);
		break;
		case 'bidItem_mobile_edit' : bidItem_mobile_edit($con,$data);
		break;
		case "bid_coin_mobile_update" : bid_coin_mobile_update($con,$temp);
		break;
		case "view_mobile_upcomingBids" : view_mobile_upcomingBids($con,$temp);
		break;
		case "view_mobile_liveBids" : view_mobile_liveBids($con,$temp);
		break;
		case "add_bid" :  add_bid($con,$temp);
		break;
		case "update_bid" : update_bid($con,$temp);
		break;
		case "update_news" : update_news($con,$temp);
		break;
		case "update_news_mobileByWeb" : update_news_mobileByWeb($con,$temp);
		break;
		case "edit_news_mobileByWeb" : edit_news_mobileByWeb($con, $temp);
		break;
		case "load_news" :  load_news($con,$temp);
		break;
		case "update_mobile_news" : update_mobile_news($con,$temp);
		break;
		case 'manage_bids' : manage_bids($con,$temp);
		break;
		case 'live_bids' : live_bids($con,$temp);
		break;
		case 'upcoming_bids' : upcoming_bids($con,$temp);
		break;
		case "feedback" : feedback($con,$temp);
		break;
		case "feedback_update" : feedback_update($con,$temp);
		break;
		default : echo "Action not Defined in Stack";
		break;
	}
	
	function login($con,$temp){
		$res = mysqli_query($con,"select * from users where `email` = '$temp->email' and `pass` = '$temp->pass' " );
		if( mysqli_num_rows($res) > 0 ){
			$row = mysqli_fetch_assoc($res);
			echo $row['name'];
		}
		else{
			echo "false";
		}
	}
	
	function bid_req_user($con,$temp){
		$res = mysqli_query($con,"update users set `bid_req` = '$temp->bid_coins' where `email` = '$temp->email' ");
		if($res){
			echo "Bid Request Submitted Succesfull !!!";
		}
		else {
			echo "Bid Request Submition failed !!!";
		}
	}
	
	function feedback($con,$temp){
		$res = mysqli_query($con,"select * from feedback");
		$fetch_data = "";
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				$fetch_data .='<tr>
								  <td>'.$row["id"].'</td>
								  <td>'.$row["user_name"].'</td>
								  <td>'.$row["user_email"].'</td>
								  <td>'.$row["user_contact"].'</td>
								  <td>'.$row["user_feedback"].'</td>
							  </tr>';

			}
		}
		$html = '<div class="row">
					<div class="col-sm-12">
					  <table class="table table-bordered table-hover">
						<tr class="danger">
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Feddback</th>
						</tr>'
						.$fetch_data.
						'</table>
					 </div>
				  </div>';
		  echo $html;
	}
	
	function manage_bids($con,$temp){
		$res = mysqli_query($con,"select * from bid_items");
		$fetch_data = "";
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				$delete_row = '
					<form method="post" action="app_action.php" name="del_form">
						<input type="hidden" name="action" value="delete_bidItem"/>
						<input type="hidden" name="id" value="'.$row["id"].'" />
						<input type="hidden" name="item_pic" value="'.$row["item_pic"].'" />
						<input type="submit" name="del_btn" value="Delete" class="btn btn-danger btn-sm" />
					</form>
					<form method="post" action="bid_edit.php" name="edit_form">
						<input type="hidden" name="action" value="edit_bidItem"/>
						<input type="hidden" name="id" value="'.$row["id"].'" />
						<input type="hidden" name="item_pic" value="'.$row["item_pic"].'" />
						<input type="hidden" name="item_name" value="'.$row["item_name"].'" />
						<input type="hidden" name="item_info" value="'.$row["item_info"].'" />
						<input type="hidden" name="bid_state" value="'.$row["bid_state"].'" />
						<input type="hidden" name="proxy" value="'.$row["proxy"].'" />
						<input type="submit" name="edit_btn" value="Edit" style="width:58px; margin-top:5px;" class="btn btn-warning btn-sm" />
					</form>
				';
				$fetch_data .='<tr>
								  <td>'.$delete_row.'</td>
								  <td>'.$row["proxy"].'</td>
								  <td>'.$row["id"].'</td>
								  <td>'.$row["item_name"].'</td>
								  <td><img src="'.$row["item_pic"].'" alt="'.$row["item_pic"].'" style="height:100px;width:200px;"/></td>
								  <td style="width:300px;">'.$row["item_info"].'</td>
								  <td>'.$row["item_biders"].'</td>
								  <td>'.$row["bid_max"].'</td>
								  <td>'.$row["bid_min"].'</td>
								  <td>'.$row["total_bid"].'</td>
								  <td>'.$row["total_bid_amt"].'</td>
								  <td>'.$row["bid_winner"].'</td>
								  <td>'.$row["bid_state"].'</td>
								  <td>'.$row["bid_date"].'</td>
							  </tr>';

			}
		}
		$html = '<div class="row">
					<div class="col-sm-12">
					  <table class="table table-bordered table-hover">
						<tr class="danger">
							<th>Delete Item</th>
							<th>Proxy</th>
							<th>ID</th>
							<th>Item Name</th>
							<th>Item Image</th>
							<th>Item Info</th>
							<th>Live Biders</th>
							<th>Bid Max</th>
							<th>Bid Min</th>
							<th>Total Bid</th>
							<th>Total Amt.</th>
							<th>Winner</th>
							<th>Bid State</th>
							<th>Bid Date</th>
						</tr>'
						.$fetch_data.
						'</table>
					 </div>
				  </div>';
		  echo $html;
	}
	
	function upcoming_bids($con,$temp){
		$res = mysqli_query($con,"select * from bid_items where `bid_state` = 'upcoming' ");
		$fetch_data = "";
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				$delete_row = '
					<form method="post" action="app_action.php">
						<input type="hidden" name="action" value="delete_bidItem"/>
						<input type="hidden" name="id" value="'.$row["id"].'" />
						<input type="hidden" name="pic" value="'.$row["item_pic"].'" />
						<input type="submit" name="del_btn" value="Delete" class="btn btn-danger" />
					</form>
				';
				$fetch_data .='<tr>
								  <td>'.$delete_row.'</td>
								  <td>'.$row["id"].'</td>
								  <td>'.$row["item_name"].'</td>
								  <td><img src="'.$row["item_pic"].'" alt="'.$row["item_pic"].'" style="height:100px;width:200px;"/></td>
								  <td style="width:300px;">'.$row["item_info"].'</td>
							  </tr>';

			}
		}
		$html = '<div class="row">
					<div class="col-sm-12">
					  <table class="table table-bordered table-hover">
						<tr class="danger">
							<th>Delete Item</th>
							<th>ID</th>
							<th>Item Name</th>
							<th>Item Image</th>
							<th>Item Info</th>
						</tr>'
						.$fetch_data.
						'</table>
					 </div>
				  </div>';
		  echo $html;
	}
	
	function live_bids($con,$temp){
		$res = mysqli_query($con,"select * from bid_items where `bid_state` = 'live' ");
		$fetch_data = "";
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				$delete_row = '
					<form method="post" action="app_action.php">
						<input type="hidden" name="action" value="delete_bidItem"/>
						<input type="hidden" name="id" value="'.$row["id"].'" />
						<input type="hidden" name="pic" value="'.$row["item_pic"].'" />
						<input type="submit" name="del_btn" value="Delete" class="btn btn-danger" />
					</form>
				';
				$fetch_data .='<tr>
								  <td>'.$delete_row.'</td>
								  <td>'.$row["id"].'</td>
								  <td>'.$row["item_name"].'</td>
								  <td><img src="'.$row["item_pic"].'" alt="'.$row["item_pic"].'" style="height:100px;width:200px;"/></td>
								  <td style="width:300px;">'.$row["item_info"].'</td>
								  <td>'.$row["item_biders"].'</td>
								  <td>'.$row["bid_max"].'</td>
								  <td>'.$row["bid_min"].'</td>
								  <td>'.$row["total_bid"].'</td>
								  <td>'.$row["total_bid_amt"].'</td>
								  <td>'.$row["bid_winner"].'</td>
								  <td>'.$row["bid_date"].'</td>
							  </tr>';

			}
		}
		$html = '<div class="row">
					<div class="col-sm-12">
					  <table class="table table-bordered table-hover">
						<tr class="danger">
							<th>Delete Item</th>
							<th>ID</th>
							<th>Item Name</th>
							<th>Item Image</th>
							<th>Item Info</th>
							<th>Live Biders</th>
							<th>Bid Max</th>
							<th>Bid Min</th>
							<th>Total Bid</th>
							<th>Total Amt.</th>
							<th>Winner</th>
							<th>Bid Date</th>
						</tr>'
						.$fetch_data.
						'</table>
					 </div>
				  </div>';
		  echo $html;
	}
	function update_news($con,$temp){
		header("location:manager/home.php");
	}
	
	function edit_news_mobileByWeb($con, $temp){
		$res = mysqli_query($con,"select * from app_news");
		$fetch_data = "";
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				$pic = $row["news_pic"] == "" ? "native_image/latest_news.jpg" : $row["news_pic"];
				$news_state = '
					<form method="post" action="app_action.php" name="delete_mobile_news">
						<input type="hidden" name="action" value="delete_news"/>
						<input type="hidden" name="id" value="'.$row["id"].'" />
						<input type="hidden" name="news_pic" value="'.$row["news_pic"].'" />
						<input type="submit" name="del_btn" value="Delete" class="btn btn-danger btn-sm" />
					</form>
					<form method="post" action="news_edit.php" name="edit_mobile_news">
						<input type="hidden" name="action" value="edit_news"/>
						<input type="hidden" name="id" value="'.$row["id"].'" />
						<input type="hidden" name="current_pic" value="'.$row["news_pic"].'" />
						<input type="hidden" name="news_title" value="'.$row["news_title"].'" />
						<input type="hidden" name="news_info" value="'.$row["news_info"].'" />
						<input type="hidden" name="news_by" value="'.$row["news_by"].'" />
						<input type="hidden" name="news_place" value="'.$row["news_place"].'" />
						<input type="hidden" name="news_cat" value="'.$row["cat"].'" />
						<input type="hidden" name="news_date" value="'.$row["news_date"].'" />
						<input type="submit" name="edit_btn" value="Edit" style="width:58px; margin-top:5px;" class="btn btn-warning btn-sm" />
					</form>
				';
				$fetch_data .='<tr>
								  <td>'.$news_state.'</td>
								  <td>'.$row["id"].'</td>
								  <td><img src="'.$pic.'" alt="..." style="width:100px;" title="News Image" /></td>
								  <td>'.$row["news_title"].'</td>
								  <td>'.$row["news_info"].'</td>
								  <td>'.$row["news_by"].'</td>
								  <td>'.$row["news_place"].'</td>
								  <td>'.$row["cat"].'</td>
								  <td>'.$row["news_date"].'</td>
							  </tr>';

			}
		}
		$html = '<div class="row">
					<div class="col-sm-12">
					  <table class="table table-bordered table-hover">
						<tr class="danger">
							<th>Manage</th>
							<th>ID</th>
							<th>News Image</th>
							<th>News Title</th>
							<th>News Details</th>
							<th>Upload By</th>
							<th>News Source</th>
							<th>Category</th>
							<th>Date</th>
						</tr>'
						.$fetch_data.
						'</table>
					 </div>
				  </div>';
		  echo $html;
	}
	
	function update_news_mobileByWeb($con,$temp){
		$html = '
			<div class="container">
				<form action="app_action.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="action" value="update_news_mobileByWeb">
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="news_title">News Title</label>
						</div>
						<div class="col-sm-6 form-group">
							<input type="text" name="news_title" id="news_title" class="form-control" placeholder="News Title" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="news_pic">News Image</label>
						</div>
						<div class="col-sm-6 form-group">
							<input type="file" name="news_pic" id="news_pic" class="file" placeholder="News Picture" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="news_place">News Source</label>
						</div>
						<div class="col-sm-6 form-group">
							<input type="text" name="news_place" id="news_place" class="form-control" placeholder="News Source" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="news_cat">News Category</label>
						</div>
						<div class="col-sm-6 form-group">
							<select name="news_cat" id="news_cat" class="form-control" >
								<option value=""None">Select</option>
								<option value="latest">Latest</option>
								<option value="state">State</option>
								<option value="sports">Sports</option>
								<option value="marketing">Bssiness</option>
								<option value="national">National</option>
								<option value="international">International</option>
								<option value="education">Education</option>
								<option value="entertainment">Entertainment</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="news_info">News Details</label>
						</div>
						<div class="col-sm-6 form-group">
							<textarea name="news_info" id="news_info" class="form-control" placeholder="News Information" ></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-4 form-group">
							<input type="submit" name="submit_btn" id="bid_submit_btn" class="btn btn-success" value="Upload" />
							<input type="reset" name="reset_btn" id="bid_reset_btn" class="btn btn-warning" value="Clear" />
						</div>
					</div>
				</form>
			</div>
		';
		echo $html;
	}
	
	function load_news($con,$temp){
		$res = mysqli_query($con,"select * from app_news where `cat` = '$temp->cat' ");
		$data = array();
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				array_push($data,$row);
			}
		}
		$temp = json_encode($data);
		echo  $temp;
	}
	
	function update_mobile_news($con,$temp){
		$date = $date = date("d-m-Y");
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
										'$temp->title',
										'$temp->info',
										'$temp->pic',
										'$temp->uploadBy',
										'$date',
										'$temp->place',
										'$temp->cat'
									)"
							);

		if($res){
			echo "News Update Succesfull";
		} else {
			echo "Error in News Update !!!";
		}
	}
	function add_bid($con,$temp){
		$html = '
			<div class="container">
				<form action="app_action.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="action" value="add_bids">
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="user_email">Email</label>
						</div>
						<div class="col-sm-6 form-group">
							<input type="email" name="user_email" id="user_email" class="form-control" placeholder="User Email Here" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="bid_no">No. Of Bids</label>
						</div>
						<div class="col-sm-6 form-group">
							<input type="number" name="bid_no" id="bid_no" class="form-control" placeholder="No. of Bids" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-4 form-group">
							<input type="submit" name="submit_btn" id="bid_submit_btn" class="btn btn-success" value="Add Bid" />
						</div>
					</div>
				</form>
			</div>
		';
		echo $html;
	}
	function update_bid($con,$temp){
		$html = '
			<div class="container">
				<form action="app_action.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="action" value="bid_items">
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="item_name">Item Name</label>
						</div>
						<div class="col-sm-6 form-group">
							<input type="text" name="item_name" id="item_name" class="form-control" placeholder="Item Name" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="item_pic">Item Image</label>
						</div>
						<div class="col-sm-6 form-group">
							<input type="file" name="item_pic" id="item_pic" class="file" placeholder="Item Picture" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="bid_state">Bid State</label>
						</div>
						<div class="col-sm-6 form-group">
							<select name="bid_state" id="bid_state" class="form-control" >
								<option value=""None">Select</option>
								<option value="Live">LIve</option>
								<option value="Upcoming">Upcoming</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2 form-group">
							<label for="item_info">Item Details</label>
						</div>
						<div class="col-sm-6 form-group">
							<textarea name="item_info" id="item_info" class="form-control" placeholder="Item Information" ></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-4 form-group">
							<input type="submit" name="submit_btn" id="bid_submit_btn" class="btn btn-success" value="Upload" />
							<input type="reset" name="reset_btn" id="bid_reset_btn" class="btn btn-warning" value="Clear" />
						</div>
					</div>
				</form>
			</div>
		';
		echo $html;
	}
	function set_mobile_user_state($con,$temp){
		$res = false;
		if( $temp->user_state == "bid_req" ){	
			$res = mysqli_query($con,"update users set `bid_req` = '0', `bids` = '$temp->bids' where `id` ='$temp->user_id' ");
		}
		else{
			$res = mysqli_query($con,"update users set `state` = '$temp->user_state' where `id` ='$temp->user_id' ");
		}
		if($res){
			echo "User state set to " . $temp->user_state . " Succesfully";
		}
		else {
			echo "Set Active updation failed !!!";
		}
	}
	
	function view_mobile_users($con,$temp){
		$res = mysqli_query($con,"select * from users");
		$data = array();
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				array_push($data,$row);
			}
		}
		$temp = json_encode($data);
		echo  $temp;
		
	}
	
	function view_mobile_user_records($con,$temp){
		$res = mysqli_query($con,"select * from users where `email` = '$temp->email' ");
		$data = array();
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				array_push($data,$row);
			}
		}
		$temp = json_encode($data);
		echo  $temp;
	}
	
	function view_mobile_bidItems($con,$temp){
		$res = mysqli_query($con,"select * from bid_items where `bid_state` = 'live' or `bid_state` = 'Live' ");
		$data = array();
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				array_push($data,$row);
			}
		}
		$temp = json_encode($data);
		echo  $temp;
	}
	
	function bid_coin_mobile_update($con,$temp){
		$res = mysqli_query($con,"update users set `bids` = '$temp->bid_coins' where `email` ='$temp->email' ");
		if($res){
			echo "Request Proceeded !!!";
		}
		else {
			echo "Bid updation failed !!!";
		}
	}
	
	function bid_mobile_delete($con,$data){
		//$filename = $data['pic'];
		$res = mysqli_query($con,"delete from bid_items where `id` = '$temp->id'");
		if ($res) {
			//unlink($filename);
			echo 'Delete Succesfull !!!';
		} else {
			//echo 'Could not delete '.$filename.', file does not exist';
			echo "Opeartion Falied !!!";
		}
	}
	
	function bidItem_mobile_edit($con,$data){
		$res = mysqli_query($con,"update 
										bid_items 
									  set 
										`proxy` = '$temp->proxy',
										`item_name` = '$temp->item_name',
										`item_pic` = '$temp->image',
										`item_info` = '$temp->item_info',
										`bid_state` = '$temp->bid_state'
									  where
										`id` ='$temp->id' 
									"
							);
							
			if($res){
				//move_uploaded_file($_FILES['item_pic']['tmp_name'], $f_path);
				echo "Bid Edit Updatation Succesfull !!!";
			}
			else{
				 echo "Bid Edit Updatation or  Image Upload failed  !!!";
			}
	}
	
	function bid_item_mobile_update($con,$temp){
		//$image_name = uniqid().$_FILES['item_pic']['name'];
		//$f_path="bid_image/$image_name";
		//$res2=mysqli_query($con,"update profile set cover='$f_path' where user_name='$user'"); 
		
		$res = mysqli_query($con,"
									insert 
										into 
									bid_items(
										`proxy`,
										`item_name`,
										`item_pic`,
										`item_info`,
										`bid_state`
									) 
									values(
										'On',
										'$temp->name',
										'$temp->image',
										'$temp->bid_info',
										'$temp->bid_state'
									)
								"
							);
		if($res){
			//move_uploaded_file($_FILES['item_pic']['tmp_name'], $f_path);
			echo "Upload Succesfull !!!";
		}
		else{
			 echo "Upload Failed !!!";
		}
	}
	
	function view_mobile_bidsItems($con,$temp){
		$res = mysqli_query($con,"select * from bid_items");
		$data = array();
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				array_push($data,$row);
			}
		}
		$temp = json_encode($data);
		echo  $temp;
	}
	
	function view_mobile_liveBids($con,$temp){
		$res = mysqli_query($con,"select * from bid_items where `bid_state` = 'live' ");
		$data = array();
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				array_push($data,$row);
			}
		}
		$temp = json_encode($data);
		echo  $temp;
	}
	
	function view_mobile_upcomingBids($con,$temp){
		$res = mysqli_query($con,"select * from bid_items where `bid_state` = 'upcoming' ");
		$data = array();
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				array_push($data,$row);
			}
		}
		$temp = json_encode($data);
		echo  $temp;
	}
	
	function view_users($con,$temp){
		$res = mysqli_query($con,"select * from users");
		$fetch_data = "";
		if ( mysqli_num_rows($res) > 0 ) {
			while($row = mysqli_fetch_assoc($res)) {
				$propic = $row["propic"] == "" ? "native_image/user_male.jpg" : $row["propic"];
				$user_state = '
					<form method="post" action="app_action.php" name="active">
						<input type="hidden" name="action" value="set_active"/>
						<input type="hidden" name="id" value="'.$row["id"].'" />
						<input type="submit" name="del_btn" value="Active" class="btn btn-danger btn-sm" />
					</form>
					<form method="post" action="app_action.php" name="block">
						<input type="hidden" name="action" value="set_block"/>
						<input type="hidden" name="id" value="'.$row["id"].'" />
						<input type="submit" name="edit_btn" value="Block" style="width:58px; margin-top:5px;" class="btn btn-warning btn-sm" />
					</form>
				';
				$fetch_data .='<tr>
								  <td>'.$user_state.'</td>
								  <td>'.$row["state"].'</td>
								  <td>'.$row["id"].'</td>
								  <td><img src="'.$propic.'" alt="..." style="width:100px;" title="User" /></td>
								  <td>'.$row["name"].'</td>
								  <td>'.$row["email"].'</td>
								  <td>'.$row["pass"].'</td>
								  <td>'.$row["contact"].'</td>
								  <td>'.$row["city"].'</td>
								  <td>'.$row["bids"].'</td>
							  </tr>';

			}
		}
		$html = '<div class="row">
					<div class="col-sm-12">
					  <table class="table table-bordered table-hover">
						<tr class="danger">
							<th>Set State</th>
							<th>Account State</th>
							<th>ID</th>
							<th>Profile Picture</th>
							<th>Name</th>
							<th>Email</th>
							<th>Pass</th>
							<th>Contact</th>
							<th>City</th>
							<th>Bids</th>
						</tr>'
						.$fetch_data.
						'</table>
					 </div>
				  </div>';
		  echo $html;
	}
	
	function feedback_update($con,$temp){
		$res = mysqli_query($con,"insert 
										into 
									feedback(
										`user_name`,
										`user_email`,
										`user_contact`,
										`user_feedback`
									) 
									values(
										'$temp->name',
										'$temp->email',
										'$temp->contact',
										'$temp->feedback'
									)"
							);

		if($res){
			echo "Feedback Submitted Succesfull";
		} else {
			echo "Error in Submition of Feedback !!!";
		}
	}
	
	function join_users($con,$temp){
		$res = mysqli_query($con,"insert 
										into 
									users(
										`name`,
										`email`,
										`pass`,
										`contact`,
										`city`,
										`gender`,
										`bids`,
										`state`
									) 
									values(
										'$temp->name',
										'$temp->email',
										'$temp->pass',
										'$temp->contact',
										'$temp->city',
										'$temp->gender',
										'10',
										'Active'
									)"
							);

		if($res){
			echo "Registration Succesfull";
		} else {
			echo "Error in Registration !!!";
		}
	}
?>