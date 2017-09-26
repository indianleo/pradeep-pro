<?php
$data = array();
foreach ($_REQUEST as $key => $value) {
  $data[$key] = $value;
}
switch($data['action']){
  case 'reports' : reports();
  break;
  case 'ledger' : ledger();
  break;
  case 'summary' : summary();
  break;
  case 'user_login' : user_login($data);
  break;
  case 'emp_login' : emp_login($data);
  break;
  case 'admin_login' : admin_login($data);
  break;
  case 'view_all' : view_all($data);
  break;
  case 'search' : search($data);
  break;
  case 'update_emi' : update_emi($data);
  break;
  case 'update_records' : update_records($data);
  break;
  default : def($data['action']);
  break;
}

function reports(){
  $reports = '
    <div class="row">
      <form action="reports.php" method="post">
        <input type="hidden" name="action" value="report_show"/>
        <div class=" col-sm-10 demo_form" style="margin-left:20px;">
            <div class="row fields form-group">
                <label for="report_type">Report Type</label>
                <select name="report_type" class="form-control" id="report_type" required >
                    <option value="none">Select Report Type</option>
                    <option value="daily_report">Daily Report</option>
                    <option value="monthly_report">Monthly Report</option>
                    <option value="yearly_report">Yearly Report</option>
                </select>
            </div>
            <div class="row fields form-group">
                <label for="sponsor">Sponsor</label>
                <select name="sponsor" class="form-control" id="sponsor">
                    <option value="none">Select Sponsor</option>
                    <option value="all_sponsor">All Sponsor</option>
                    <option value="Arvind Tiwari">Arvind Tiwari</option>
                    <option value="Deepika Singh">Deepika Singh</option>
                    <option value="Nazia Khan">Nazia Khan</option>
                    <option value="Pawan Srivastava">Pawan Srivastava</option>
                    <option value="Prabhakar Singh">Prabhakar Singh</option>
                    <option value="Rakesh Shukla">Rakesh Shukla</option>
                    <option value="Vinod Dubey">Vinod Dubey</option>
                </select>
            </div>
            <div class="row fields form-group">
                <label for="report_date">Date</label>
                <input type="date" name="report_date" class="form-control" id="report_date" required/>
            </div>
            <div class="row fields form-group">
                <input type="submit" name="submit_btn" class="btn btn-info" id="form_submit_btn" value="Submit"/>
                <input type="reset" name="clear_btn" class="btn btn-warning" id="form_clear_btn" value="Clear" />
            </div>
        </div>
      </form>
    </div>
  ';
  echo $reports;
}

function search(){
  $reports = '
    <div class="row">
      <form action="search.php" method="post">
        <input type="hidden" name="action" value="report_show"/>
        <div class=" col-sm-10 demo_form col-sm-offset-1">
            <div class="row fields form-group">
                <label for="filter">Select Filter</label>
                <select id="filter" name="filter" class="form-control">
                    <option value="none">Select</option>
                    <option value="view_all">View All</option>
                    <option value="sponsor">Sponsor Name</option>
                    <option value="client">Client Name</option>
                </select>
            </div>
            <div class="row fields form-group">
                <label for="sponsor">Sponsor</label>
                <select name="sponsor" class="form-control" id="sponsor">
                    <option value="none">Select Sponsor</option>
                    <option value="all_sponsor">All Sponsor</option>
                    <option value="Arvind Tiwari">Arvind Tiwari</option>
                    <option value="Deepika Singh">Deepika Singh</option>
                    <option value="Nazia Khan">Nazia Khan</option>
                    <option value="Pawan Srivastava">Pawan Srivastava</option>
                    <option value="Prabhakar Singh">Prabhakar Singh</option>
                    <option value="Rakesh Shukla">Rakesh Shukla</option>
                    <option value="Vinod Dubey">Vinod Dubey</option>
                </select>
            </div>
            <div class="row fields form-group">
                <label for="client_name">Client Name</label>
                <input type="text" name="client_name" id="client_name" class="form-control"/>
            </div>
            <div class="row fields form-group">
                <input type="submit" name="submit_btn" class="btn btn-info" id="form_submit_btn" value="Submit"/>
                <input type="reset" name="clear_btn" class="btn btn-warning" id="form_clear_btn" value="Clear" />
            </div>
        </div>
      </form>
    </div>
  ';
  echo $reports;
}

function ledger(){
  $reports = '
    <div class="row">
      <form action="reports.php" method="post">
        <input type="hidden" name="action" value="ledger"/>
        <div class=" col-sm-10 demo_form" style="margin-left:20px;">
            <div class="row fields form-group">
                <label for="client_id">Client Id</label>
                <input type="number" name="client_id" id="client_id" class="form-control"/>
            </div>
            <div class="row fields form-group">
                <input type="submit" name="submit_btn" class="btn btn-info" id="form_submit_btn" value="Submit"/>
                <input type="reset" name="clear_btn" class="btn btn-warning" id="form_clear_btn" value="Clear" />
            </div>
        </div>
      </form>
    </div>
  ';
  echo $reports;
}

function summary(){
  $reports = '
    <div class="row">
      <form action="summary.php" method="post">
        <input type="hidden" name="action" value="summary"/>
        <div class=" col-sm-10 demo_form" style="margin-left:20px;">
            <div class="row fields form-group">
                <label for="summary_type">Summary Filter</label>
                <select name="summary_type" class="form-control" id="summary_type" onchange="summaryCheck(this)" required >
                    <option value="none">Select Filter</option>
                    <option value="sponsor_name">Sponsor Name</option>
                    <option value="client_name">Client Name</option>
                    <option value="project_name">Project Name</option>
                    <option value="client_id">Client Id</option>
                    <option value="plot_no">Plot No.</option>
                </select>
            </div>
            <div class="row fields form-group summary_group">
                <label for="filter_value">Filter Data</label>
                <input type="text" name="filter_value" class="form-control" id="filter_value" placeholder="Filter Information"/>
            </div>
            <div class="row fields form-group summary_group">
                <label for="sponsor">Sponsor Name</label>
                <select name="sponsor" class="form-control" id="sponsor">
                    <option value="none">Select Sponsor</option>
                    <option value="Arvind Tiwari">Arvind Tiwari</option>
                    <option value="Deepika Singh">Deepika Singh</option>
                    <option value="Nazia Khan">Nazia Khan</option>
                    <option value="Pawan Srivastava">Pawan Srivastava</option>
                    <option value="Prabhakar Singh">Prabhakar Singh</option>
                    <option value="Rakesh Shukla">Rakesh Shukla</option>
                    <option value="Vinod Dubey">Vinod Dubey</option>
                </select>
            </div>
            <div class="row fields form-group summary_group">
                <label for="project_name">Project Name</label>
                <select name="project_name" class="form-control" id="project_name">
                    <option value="none">Select Project</option>
                    <option value="Royal Prayag">Royal Prayag</option>
                    <option value="Prayag Valley">Prayag Valley</option>
                    <option value="Royal Stallion">Royal Stallion</option>
                    <option value="Arya Green">Arya Green</option>
                    <option value="Green Estate">Green Estate</option>
                </select>
            </div>
            <div class="row fields form-group">
                <label for="summary_date">Date</label>
                <input type="date" name="summary_date" class="form-control" id="summary_date" />
            </div>
            <div class="row fields form-group">
                <input type="submit" name="submit_btn" class="btn btn-info" id="form_submit_btn" value="Submit"/>
                <input type="reset" name="clear_btn" class="btn btn-warning" id="form_clear_btn" value="Clear" />
            </div>
        </div>
      </form>
    </div>
  ';
  echo $reports;
}

function update_emi() {
  $emi_form = '
    <div class="row">
      <form action="form.php" method="post">
        <input type="hidden" name="action" value="update_emi"/>
        <div class=" col-sm-10 demo_form" style="margin-left:20px;">
            <div class="row fields form-group">
                <label for="user_id">Customer ID</label>
                <input type="number" name="user_id" class="form-control" id="user_id" placeholder="Coustomer Id" required />
            </div>
            <div class="row fields form-group">
                <label for="payment_type">Payment Type</label>
                <select name="payment_type" class="form-control" id="payment_type"  required>
                    <option value="None">Select Payment Type</option>
                    <option value="cash">Cash</option>
                    <option value="cheque">Cheque</option>
                </select>
            </div>
            <div class="row fields form-group">
                <label for="reciept_no">Reciept No.</label>
                <input type="text" name="reciept_no" class="form-control" id="reciept_no" placeholder="Reciept No." />
            </div>
            <div class="row fields form-group">
                <label for="emi_date">Date</label>
                <input type="date" name="emi_date" class="form-control" id="emi_date" required/>
            </div>
            <div class="row fields form-group">
                <label for="emi_amt">Emi Ammount</label>
                <input type="text" name="emi_amt" class="form-control" id="emi_amt" placeholder="EMI Ammount" required/>
            </div>
            <div class="row fields form-group">
                <input type="submit" name="submit_btn" class="btn btn-info" id="form_submit_btn" value="Submit"/>
                <input type="reset" name="clear_btn" class="btn btn-warning" id="form_clear_btn" value="Clear" />
            </div>
        </div>
      </form>
    </div>
  ';
  echo $emi_form;
}

function update_records(){
    $form = include('master_form.html');
    echo $form;
}

function checkEmiMonth( $con, $status,$pending_emi, $agreement_date, $last_updated ) {
   $today = date("Y-m-d");
   $new_date=date_create($today);
   if($status != "done" || intval($pending_emi) != 0 ) {
      if( $last_updated != ""){
          @$old_date=date_create($last_updated);
          
      } else {

          @$old_date=date_create($agreement_date);
      }
      @$diff=date_diff($old_date,$new_date);
      $month_diff = intval($diff->format('%m'));
      $update_emi_time = $pending_emi + ($month_diff -1);

      $upToDate = mysqli_query($con,"update
                              demo
                            set
                              `pending_emi` = '$update_emi_time',
                            where
                              status='pending'
                              "); 
   }
}

function view_all(){
  $con = mysqli_connect("localhost","root","","ary");
  //------------------------up-to-date-----------------------
   $current_month = date('n',time());
   $current_year = date('Y',time());
   
  //---------------------------End------------------------------
  $res = mysqli_query($con,"select * from demo");
  $fetch_data = "";
  $nn = "";
  if ( mysqli_num_rows($res) > 0 ) {
    while($row = mysqli_fetch_assoc($res)) {
      
      //checkEmiMonth( $con, $row["status"], $row["pending_emi"], $row["agreement_date"], $row["last_updated"] );

      $n = get_emi_details($row["emi_details"]);
        $fetch_data .='<tr>
                          <td>'.$row["id"].'</td>
                          <td>'.$row["mon"].'</td>
                          <td>'.$row["date"].'</td>
                          <td>'.$row["project"].'</td>
                          <td>'.$row["sponsor"].'</td>
                          <td>'.$row["plot_no"].'</td>
                          <td>'.$row["client_name"].'</td>
                          <td>'.$row["bank_name"].'</td>
                          <td>'.$row["resi_add"].'</td>
                          <td>'.$row["contact_no"].'</td>
                          <td>'.$row["nomini"].'</td>
                          <td>'.$row["plot_size"].'</td>
                          <td>'.$row["rate"].'</td>
                          <td>'.$row["plot_value"].'</td>
                          <td>'.$row["plc_amt"].'</td>
                          <td>'.$row["tpv_including_plc"].'</td>
                          <td>'.$row["cash"].'</td>
                          <td>'.$row["cheque"].'</td>
                          <td>'.$row["cheque_no"].'</td>
                          <td>'.$row["agreement_date"].'</td>
                          <td>'.$row["duration"].'</td>
                          <td>'.$row["emi_month"].'</td>
                          <td>'.$row["emi"].'</td>
                          <td>'.$row["pending_emi"].'</td>
                          <td>'.$row["pending_emi_amt"].'</td>
                          <td>
                            <div class="emi_details_box" id="'.$row["id"].'">
                               <div class="emi_details_table">
                                  <table class="table table-bordered">
                                      <tr class="danger">
                                          <th>Emi Ammount</th>
                                          <th>Date</th>
                                          <th>Reciept No.</th>
                                          <th>No. of Emi</th>
                                      </tr>
                                      '.$n.'
                                  </table>
                                </div>
                                <button class="emi_show_btn btn btn-info" onclick="close_emi('.$row["id"].')">Close EMI</button>
                            </div>
                            <button class="emi_show_btn btn btn-danger" onclick="show_emi('.$row["id"].')">Show EMI</button>
                          </td>
                          <td>'.$row["pending_amt"].'</td>
                          <td>'.$row["actual_pending"].'</td>
                          <td>'.$row["total_due"].'</td>
                          <td>'.$row["total_emi_recv"].'</td>
                          <td>'.$row["topup"].'</td>
                          <td>'.$row["total"].'</td>
                          <td>'.$row["approx"].'%</td>
                          <td>'.$row["total_recv_amt"].'</td>
                          <td>'.$row["balnced_amt"].'</td>
                          <td>'.$row["remark"].'</td>
                      </tr>';
      }
  }
  $html = '<div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered table-hover">
                <tr class="danger">
                    <th>ID</th>
                    <th>Month</th>
                    <th>Date</th>
                    <th>Project</th>
                    <th>Sponsor</th>
                    <th>Plot No.</th>
                    <th>Client</th>
                    <th>Bank Name</th>
                    <th>Residential Address</th>
                    <th>Contact No</th>
                    <th>Nomini</th>
                    <th>Plot Size</th>
                    <th>Rate</th>
                    <th>Plot Value</th>
                    <th>PLC Ammount</th>
                    <th>TPV (Including PLC)</th>
                    <th>Cash</th>
                    <th>Cheque</th>
                    <th>Cheque No.</th>
                    <th>Agreement Date</th>
                    <th>Duration</th>
                    <th>EMI/Month</th>
                    <th>EMI</th>
                    <th>Pending EMI</th>
                    <th>Pending EMI Ammount</th>
                    <th>EMI Details</th>
                    <th>Pending Ammount</th>
                    <th>Actual Pending</th>
                    <th>Total Due</th>
                    <th>Total EMI Receiced</th>
                    <th>Topup</th>
                    <th>Total(Emi + Topup)</th>
                    <th>Approx</th>
                    <th>Total Receiced</th>
                    <th>Balanced Amount</th>
                    <th>Remark</th>
                </tr>'
                .$fetch_data.
                '</table>
             </div>
          </div>';
  echo $html;
}

function get_emi_details( $emi ){
  $data = json_decode($emi, true);
  $inf = "";
  foreach ($data as $key => $value) {
    if( $value == 0 ){
        $inf .= '
            <tr class="warning">
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
        ';
    } else {
      $inf .= '
      <tr class="success">
          <td>'.$value["emi_amt"].'</td>
          <td>'.$value["date"].'</td>
          <td>'.$value["reciept_no"].'</td>
          <td>'.$value["no_of_emi"].'</td>
      </tr>
    ';
  }
    
}
  return $inf;
}
function user_login($data){
  $html ="
    <div class='container'>
      <h3 class='alert alert-danger'>
        User Page is Under Devlopement
      </h3>
      <h4 class='alert alert-info'>
        action = ".$data['action']."
      </h4>
      <h2 class='alert alert-success'>
        ...Thank You...
      </h2>
      <a href='login.php' class='btn btn-warning'>Back</a>
    </div>";
  echo $html;
}

function emp_login(){
  $html ="
    <div class='container'>
      <h3 class='alert alert-danger'>
        Employee Page is Under Devlopement
      </h3>
      <h4 class='alert alert-info'>
        action = ".$act."
      </h4>
      <h2 class='alert alert-success'>
        ...Thank You...
      </h2>
      <a href='login.php' class='btn btn-warning'>Back</a>
    </div>";
  echo $html;
}

function admin_login($data){
  $admin_id = "ary";
  $admin_pass = "anamika@ary";
  if($data['admin_name'] == $admin_id && $data['admin_pass'] === $admin_pass){
    header("location:admin.php");
  } else{
    $html ="
      <div class='container'>
        <h3 class='alert alert-danger'>
          Access Denied !!!
        </h3>
        <h4 class='alert alert-info'>
          You have entered wrong Id/Pass.
        </h4>
        <h2 class='alert alert-success'>
          Try Again...
        </h2>
        <a href='login.php' class='btn btn-warning'>Back</a>
      </div>";
    echo $html;
  }
}

function def($act){
  $html ="
    <div class='container'>
      <h3 class='alert alert-danger'>
        Activity Not Associated
      </h3>
      <h4 class='alert alert-info'>
        action = ".$act."
      </h4>
      <h2 class='alert alert-success'>
        ...Thank You...
      </h2>
      <a href='index.php' class='btn btn-warning'>Back</a>
    </div>";
  echo $html;
}
?>
