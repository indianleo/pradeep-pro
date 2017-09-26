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
        @media only screen and (max-width: 500px) {
          
        }
      </style>
  </head>
  <body>
      <div id="header container-fluid" class="header">
          <?php include('menu.html'); ?>
      </div>
       <div class="menu_icon">
      </div>
      <div class="side_pane_menu">
          <div class="back"></div>
          <div class="row">
              <div class="col-sm-2 side_menu">
                  <div class="side_menu_items" id="view_all" onclick="view_records(this)">
                        View Records
                  </div>
                  <div class="side_menu_items" id="update_records" onclick="admin_show(this)">
                        Update Records
                  </div>
                  <div class="side_menu_items" id="update_emi" onclick="admin_show(this)">
                        Update EMI
                  </div>
                  <div class="side_menu_items" id="reports" onclick="admin_show(this)">
                        Reports
                  </div>
                  <div class="side_menu_items" id="ledger" onclick="admin_show(this)">
                        Ledger
                  </div>
                  <div class="side_menu_items" id="summary" onclick="admin_show(this)">
                        Summary
                  </div>
                  <div class="side_menu_items" id="view_emp" onclick="admin_show(this)">
                        View Employee
                  </div>
                  <div class="side_menu_items" id="add_emp" onclick="admin_show(this)">
                        Add Employee
                  </div>
                  <div class="side_menu_items" id="del_emp" onclick="admin_show(this)">
                        Delete Employee
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
                        <h3 class="panel-title">Administraor</h3>
                      </div>
                      <div class="panel-body" id="output">
                        <h1>Welcome Administrator</h1>
                        <p>
                            This page is designed to Perform Administrative works like
                            Updation, Deletion and Adding new Employee Id to login.Also Admin can Delete their
                            Ids to stop login.Here Controls Button is given left side to peroform.
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
      <div class="footer" id="footer">
          <?php include('footer.html'); ?>
      </div>
      <script src="admin.js"></script>
  </body>
</html>
