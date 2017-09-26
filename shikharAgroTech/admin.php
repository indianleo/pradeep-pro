<?php
	session_start();
	if( !isset($_SESSION["admin"])){
		header("location:admin_login.php");
	}
?>
<!doctype html>
<html>
	<head>
		<title> ADMIN | ABC NEWS EXPRESS </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<style>
		.center{
			display: -webkit-flex;
			display: flex;
			//align-items: center;
			justify-content: center;
		}
        .side_pane_menu{
          width:200px;
          height:100%;
          border-right: 1px solid #ccc;
          z-index: 99999;
          position: fixed;
          display:none;
          overflow: auto;
        }
        .back{
           filter:blur(5px);
           width:200px;
          height:100%;
          opacity: 0.7;
          background: #ccc;
          position: absolute;
        }
        .menu_icon{
          height:30px;
          width:30px;
          background-size: cover;
          z-index:99999999;
		  position:relative;
		  top:-41px;
		  cursor:pointer;
        }
        .side_menu{
          padding-left: 30px;
        }
        .side_menu_items{
          background: #4EC2E6;
          height:50px;
          width:150px;
          line-height: 50px;
          text-align: center;
          margin-top: 20px;
          box-shadow: 2px 2px 10px 1px #000;
          border:1px solid #0a3643;
          cursor:pointer;
        }
        .main_item{
          min-height:567px;
        }
        .main_item_inner{
          width: 100%;
        }
        .panel-body{
          overflow: auto;
          max-height:450px;
        }
        .emi_details_box{
          display: none;
          z-index: 9999;
          position: fixed;
          top:10%;
          left:10%;
          height:50%;
          width:70%;
        }
        .emi_details_table{
          max-height:100%;
          width:100%;
          overflow: auto;
        }
        .emi_box{
          position: fixed;
          top:0;
          left:0;
          background: #000;
          opacity: .7;
          z-index: 99;
          height:100%;
          width:100%;
          display: none;
        }
        .summary_group{
          display : none;
        }
        @media only screen and (max-width: 500px) {
          
        }
      </style>
  </head>
  <body>
      <div class="side_pane_menu">
          <div class="back"></div>
          <div class="row">
              <div class="col-sm-2 side_menu">
                  <div class="side_menu_items" id="view_users" onclick="send(this)">
                        View Users
                  </div>
				  <div class="side_menu_items" id="search_users" onclick="send(this)">
                        Search Users
                  </div>
                  <div class="side_menu_items" id="update_bid" onclick="send(this)">
                        Upload Bid Items
                  </div>
				  <div class="side_menu_items" id="manage_bids" onclick="send(this)">
                        Manage Bid Items
                  </div>
				  <div class="side_menu_items" id="add_bid" onclick="send(this)">
                        Add Bid Coins
                  </div>
				  <div class="side_menu_items" id="edit_news_mobileByWeb" onclick="send(this)">
                        Manage Mobile News
                  </div>
                  <div class="side_menu_items" id="update_news" onclick="send(this)">
                        Manage News Web
                  </div>
				  <div class="side_menu_items" id="update_news_mobileByWeb" onclick="send(this)">
                        Upload Mobile News
                  </div>
				  <div class="side_menu_items" id="live_bids" onclick="send(this)">
                        Live Products
                  </div>
				  <div class="side_menu_items" id="upcoming_bids" onclick="send(this)">
                        Upcoming Products
                  </div>
                  <div class="side_menu_items" id="feedback" onclick="send(this)">
                        View Feedbacks
                  </div>
              </div>
          </div>
      </div>
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12 main_item">
                  <br/>
                  <div class="panel panel-primary main_item_inner">
						<div class="panel-heading">
							<div>
								<h3 class="panel-title">Administraor</h3>
							</div>
							<div class="pull-right">
								<h3 class="menu_icon">&#9776;</h3>
							</div>
						</div>
						<div class="panel-body center" id="output">
							<div>
								<h1>Welcome Administrator</h1>
								<p>
									This page is designed to Perform Administrative works like
									Updation, Deletion and Adding contetnt and managing database here.
									He will be able to do anything with database and he have access of all permissions.
									Here Control Button is given Right top of panel to perform.
								</p>
								<a href="index.php" style="text-decoration:none;color:#fff">
								  <button class="btn btn-danger" id="log_Out1" for="log_out" >
									Log Out
								  </button>
								</a>
							</div>
						</div>
                      <div class="panel-footer">!!! Thank You !!!</div>
                  </div>
              </div>
          </div>
      </div>
      <div class="emi_box" id="emi_box">
         <!-- emi detail will show here -->
      </div>
		<script>
			function send( elm ){
				var req = new XMLHttpRequest();
				var id = elm.id;
				let data = {
					name : "anamika",
					type : "admin_action",
					action : id,
				};
				
				if(id == "search_users"){
					window.location = "app_filter.php";
					return true;
				} 
				else if( id == "update_news" ){
					window.location = "manager/login.php";
					return true;
				}
				req.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("output").innerHTML = this.responseText;
					} else {
						document.getElementById("output").innerHTML = "<div style='margin:auto;'><i class='fa fa-spinner fa-3x'></div>";
					}
				};
				req.open("POST", "action.php?data="+JSON.stringify(data), true);
				req.send();
			}
			$(document).ready(function(){
				$('.menu_icon').click(function(){
					$('.side_pane_menu').slideToggle('slow');
				});
				$('#output').click(function(){
					$('.side_pane_menu').hide('slow');
				});
			});
		</script>
	</body>
</html>