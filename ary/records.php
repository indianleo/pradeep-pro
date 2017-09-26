<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
      <link rel="stylesheet" href="main.css" type="text/css"/>
      <style>
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
          background-image: url('image/grid.png'); 
          height:30px;
          width:30px;
          background-size: cover;
          z-index:99999999;
          position: fixed;
          left:73px;
          top:65px;
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
        .top_menu{
          height:50px;
        }
        .top_menu_items{
          float: left;
          width:70px;
          text-align: center;
          padding: 2px 0 2px 0;
          margin: 20px 0 0 20px;
          border-radius: 2px;
          background: #4EC2E6;
          cursor: pointer;
        }
        .top_menu_items:hover{
              background: #198fb3;
              color:#fff;
        }
        .top_menu_items h5{
           font-weight: 600;
        }
        .edit_box, .finder{
          display: none;
          width:50%;
          height:50%;
          overflow: auto;
          background: #fff;
          z-index: 9999999;
          position: absolute;
          top:25%;
          left:25%;
        }
        .back{
          position: absolute;
          top:0;
          left:0;
          width:100%;
          height:100%;
          opacity: .5;
          background: #000;
          z-index: 99;
          display: none;
        }
        .cancel_btn{
          height:50px;
          width:50px;
          font-size: 30px;
          display: none;
          position: absolute;
          top:10px;
          right:10px;
          z-index: 9999;
        }
        @media only screen and (max-width: 500px) {
          
        }
      </style>
  </head>
  <body>
      <div id="header container-fluid" class="header">
          <div class="top_menu">
              <div class="top_menu_items" id="back_btn" onclick="location.href = 'admin.php';">
                  <h5>Back</h5>
              </div>
              <div class="top_menu_items" id="view_all" onclick="admin_show(this)">
                    <h5>View</h5> 
              </div>
              <div class="top_menu_items" id="search_btn" onclick="swicth_action_box(this)">
                    <h5>Search</h5> 
              </div>
              <div class="top_menu_items" id="edit_btn" onclick="swicth_action_box(this)">
                    <h5>Edit</h5>
              </div>
          </div>
      </div>
       <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12 main_item">
                  <br/>
                  <div class="panel panel-primary main_item_inner">
                      <div class="panel-heading">
                        <h3 class="panel-title">Administraor</h3>
                      </div>
                      <div class="panel-body" id="output">
                        <h1>Welcome Administrator</h1>
                        <p>
                            Please Click on absove listed buttons for desired action to perform here.
                        </p>
                        <a href="index.php" style="text-decoration:none;color:#fff">
                          <button class="btn btn-danger" id="log_Out1" for="log_out" >
                            Log Out
                          </button>
                        </a>
                      </div>
                      <div class="panel-footer">!!! Thank You !!!</div>
                  </div>
              </div>
          </div>
      </div>
      <div class="emi_box" id="emi_box">
         <!-- emi detail will show here -->
      </div>
      <div class="edit_box" id="edit_box" onclick="swicth_action_box(this)">
          <div class="row">
            <form action="master_form_edit.php" method="post">
              <input type="hidden" name="action" value="ledger"/>
              <div class=" col-sm-10 demo_form" style="margin-left:20px;">
                  <div class="row fields form-group">
                      <label for="client_id">Client Id</label>
                      <input type="number" name="client_id" id="client_id" class="form-control"/>
                  </div>
                  <div class="row fields form-group">
                      <input type="submit" name="submit_btn" class="btn btn-info" id="form_submit_btn" value="Submit"/>
                  </div>
              </div>
            </form>
          </div>
      </div>
      <div class="finder" id="finder" onclick="swicth_action_box(this)">

      </div>
      <div class="back" id="back"></div>
      <button type="button" class="btn btn-danger cancel_btn" id="cancel_btn" onclick="close_swicth_action_box(this)">X</button>
      <script src="admin.js"></script>
  </body>
</html>