<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
  </head>
  <body>
    <button class="btn btn-danger" onclick="window.location='admin.php';">Back</button>
    <div class="container">
      <div class="header">
          <div class="row">
              <div class="col-sm-2">
                    Logo
              </div>
              <div class="col-sm-9 text-center">
                    <h1> Ary Infra Realcon Pvt. Ltd</h1>
                    <h5> Milan Plaza, Civil Lines,</h5>
                    <h5> Allahabad - 211001</h5>
                    <p> Contact No. : +91 7523888800</p>
              </div>
          </div>
      </div>
<?php
$data = array();
foreach ($_REQUEST as $key => $value) {
  $data[$key] = $value;
}
$con= mysqli_connect('localhost','root','',"ary");
switch($data['action']){
  case 'report_show' : report_show($data);
  break;
  case 'ledger' : ledger($data,$con);
    break;
  case 'summary' : summary($data,$con);
    break;
  default : def($data['action']);
  break;
}

function report_show($data) {
  $con= mysqli_connect('localhost','root','',"ary");
  //--------------------get data of coustomer--------------------------
  switch ($data['report_type']) {
    case 'daily_report' : daily_report($data,$con);
      break;
    case 'monthly_report' : monthly_report($data,$con);
      break;
    case 'yearly_report' : yearly_report($data,$con);
      break;
  }
}

function daily_report($data,$con) {
  $inf = "";
  $report = "";
  $prayag_valley = 0;
  $royal_prayag = 0;
  $royal_stallion = 0;
  $arya_green = 0;
  $grand_total =0;
  $c_id = 0;
  $p = array('prayag_valley'=>0,'royal_stallion'=>0,'royal_prayag'=>0,'arya_green'=>0);
  $emi_data = array();
  $sponsor_list = array(
    'Nazia Khan',
    'Arvind Tiwari',
    'Deepika Singh',
    'Pawan Srivastava',
    'Prabhakar Singh',
    'Rakesh Shukla',
    'Vinod Dubey'
    );

  $th = '
    <tr class="danger">
        <th>Sponsor Name</th>
        <th>Prayag Valley</th>
        <th>Royal Prayag</th>
        <th>Royal Stallion</th>
        <th>Arya Green</th>
        <th>Grand Total</th>
    </tr>
  ';
  
   if($data['sponsor'] == 'all_sponsor') {
      foreach ($sponsor_list as $key => $sponsor_name) {
        $inf = mysqli_query($con,"select * from demo where sponsor='$sponsor_name' and last_updated='$data[report_date]'");
         //$inf = mysqli_query($con,"select * from demo where last_updated='$data[report_date]'"); 
          if ( mysqli_num_rows($inf) > 0 ) {
                $temp = array();
                while( $ans = mysqli_fetch_assoc($inf) ) {
                  $emi_arr = json_decode($ans['emi_details'], true);
                  $a = array_pop($emi_arr);
                  $pro = $ans['project'];
                  $amt = $a['emi_amt'];
                  if( array_key_exists($pro, $temp) ) {
                    $temp[$pro] += $amt;
                  } else {
                    $temp[$pro] = $amt;
                  }
                }
                $emi_data[$sponsor_name] = $temp;
                
            } else {
                //echo "Error in information fetching<br>";
            }
    
      }

    } else {
      $inf = mysqli_query($con,"select * from demo where sponsor='$data[sponsor]' and last_updated='$data[report_date]'");
          if ( mysqli_num_rows($inf) > 0 ) {
                $temp = array();
                $sponsor_name = $data["sponsor"];
                while( $ans = mysqli_fetch_assoc($inf) ) {
                  $emi_arr = json_decode($ans['emi_details'], true);
                  $a = array_pop($emi_arr);
                  $pro = $ans['project'];
                  $amt = $a['emi_amt'];
                  if( array_key_exists($pro, $temp) ) {
                    $temp[$pro] += $amt;
                  } else {
                    $temp[$pro] = $amt;
                  }
                }
                $emi_data[$sponsor_name] = $temp;
          }
    }

    //-------------------------Generation of Content---------------------------
    foreach($emi_data as $sponsor_name => $a) {
      $prayag_valley += @$a["Prayag Valley"] ? @$a["Prayag Valley"] : 0;
      $royal_prayag += @$a["Royal Prayag"] ? @$a["Royal Prayag"] : 0;
      $royal_stallion += @$a["Royal Stallion"] ? @$a["Royal Stallion"] : 0;
      $arya_green += @$a["Arya Green"] ? @$a["Arya Green"] : 0;
      $grand_total += @$a["Prayag Valley"] + @$a["Royal Prayag"] + @$a["Royal Stallion"] + @$a["Arya Green"];
      @$tc .= '<tr>
              <td>'.$sponsor_name.'</td>
              <td>'.($a["Prayag Valley"] ? @$a["Prayag Valley"] : 0).'</td>
              <td>'.($a["Royal Prayag"] ? @$a["Royal Prayag"] : 0).'</td>
              <td>'.($a["Royal Stallion"] ? @$a["Royal Stallion"] : 0).'</td>
              <td>'.($a["Arya Green"] ? @$a["Arya Green"] : 0).'</td>
              <td>'.(@$a["Prayag Valley"] + @$a["Royal Prayag"] + @$a["Royal Stallion"] + @$a["Arya Green"]).'</td>
              </tr>';
      
    }

    @$gt = '<tr class="info">
            <td>Grand Total</td>
            <td>'.$prayag_valley.'</td>
            <td>'.$royal_prayag.'</td>
            <td>'.$royal_stallion.'</td>
            <td>'.$arya_green.'</td>
            <td>'.$grand_total.'</td>
            </tr>';

    $html = '<table border="1" class="table table-bordered">'.$th.$tc.$gt.'</table>';
   
   


    echo $html;
}

function monthly_report($data,$con) {
  $inf = "";
  $report = "";
  $prayag_valley = 0;
  $royal_prayag = 0;
  $royal_stallion = 0;
  $arya_green = 0;
  $grand_total =0;
  $c_id = 0;
  $p = array('prayag_valley'=>0,'royal_stallion'=>0,'royal_prayag'=>0,'arya_green'=>0);
  $emi_data = array();
  $month = date('n', strtotime($data['report_date']) );
  $year = date('Y', strtotime($data['report_date']) );
  $sponsor_list = array(
    'Nazia Khan',
    'Arvind Tiwari',
    'Deepika Singh',
    'Pawan Srivastava',
    'Prabhakar Singh',
    'Rakesh Shukla',
    'Vinod Dubey'
    );

  $th = '
    <tr class="danger">
        <th>Sponsor Name</th>
        <th>Prayag Valley</th>
        <th>Royal Prayag</th>
        <th>Royal Stallion</th>
        <th>Arya Green</th>
        <th>Grand Total</th>
    </tr>
  ';
   if($data['sponsor'] == 'all_sponsor') {
      foreach ($sponsor_list as $key => $sponsor_name) {
        $inf = mysqli_query($con,"select * from demo where sponsor='$sponsor_name' and current_month='$month' and current_year='$year'");
         //$inf = mysqli_query($con,"select * from demo where last_updated='$data[report_date]'"); 
          if ( mysqli_num_rows($inf) > 0 ) {
                $temp = array();
                while( $ans = mysqli_fetch_assoc($inf) ) {
                  $emi_arr = json_decode($ans['emi_details'], true);
                  $a = array_pop($emi_arr);
                  $pro = $ans['project'];
                  $amt = $a['emi_amt'];
                  if( array_key_exists($pro, $temp) ) {
                    $temp[$pro] += $amt;
                  } else {
                    $temp[$pro] = $amt;
                  }
                }
                $emi_data[$sponsor_name] = $temp;
                
            } else {
                //echo "Error in information fetching<br>";
            }
    
      }

    } else {
      $inf = mysqli_query($con,"select * from demo where sponsor='$data[sponsor]' and current_month='$month' and current_year='$year'");
          if ( mysqli_num_rows($inf) > 0 ) {
                $temp = array();
                $sponsor_name = $data["sponsor"];
                while( $ans = mysqli_fetch_assoc($inf) ) {
                  $emi_arr = json_decode($ans['emi_details'], true);
                  $a = array_pop($emi_arr);
                  $pro = $ans['project'];
                  $amt = $a['emi_amt'];
                  if( array_key_exists($pro, $temp) ) {
                    $temp[$pro] += $amt;
                  } else {
                    $temp[$pro] = $amt;
                  }
                }
                $emi_data[$sponsor_name] = $temp;
          }
    }

    //-------------------------Generation of Content---------------------------
    foreach($emi_data as $sponsor_name => $a) {
      $prayag_valley += @$a["Prayag Valley"] ? @$a["Prayag Valley"] : 0;
      $royal_prayag += @$a["Royal Prayag"] ? @$a["Royal Prayag"] : 0;
      $royal_stallion += @$a["Royal Stallion"] ? @$a["Royal Stallion"] : 0;
      $arya_green += @$a["Arya Green"] ? @$a["Arya Green"] : 0;
      $grand_total += @$a["Prayag Valley"] + @$a["Royal Prayag"] + @$a["Royal Stallion"] + @$a["Arya Green"];
      @$tc .= '<tr>
              <td>'.$sponsor_name.'</td>
              <td>'.($a["Prayag Valley"] ? @$a["Prayag Valley"] : 0).'</td>
              <td>'.($a["Royal Prayag"] ? @$a["Royal Prayag"] : 0).'</td>
              <td>'.($a["Royal Stallion"] ? @$a["Royal Stallion"] : 0).'</td>
              <td>'.($a["Arya Green"] ? @$a["Arya Green"] : 0).'</td>
              <td>'.(@$a["Prayag Valley"] + @$a["Royal Prayag"] + @$a["Royal Stallion"] + @$a["Arya Green"]).'</td>
              </tr>';
      
    }

    @$gt = '<tr class="info">
            <td>Grand Total</td>
            <td>'.$prayag_valley.'</td>
            <td>'.$royal_prayag.'</td>
            <td>'.$royal_stallion.'</td>
            <td>'.$arya_green.'</td>
            <td>'.$grand_total.'</td>
            </tr>';

    $html = '<table border="1" class="table table-bordered">'.$th.$tc.$gt.'</table>';
   
   


    echo $html;
}

function yearly_report($data,$con) {
  $inf = "";
  $report = "";
  $prayag_valley = 0;
  $royal_prayag = 0;
  $royal_stallion = 0;
  $arya_green = 0;
  $grand_total =0;
  $c_id = 0;
  $p = array('prayag_valley'=>0,'royal_stallion'=>0,'royal_prayag'=>0,'arya_green'=>0);
  $emi_data = array();
  $month = date('n', strtotime($data['report_date']) );
  $year = date('Y', strtotime($data['report_date']) );
  $sponsor_list = array(
    'Nazia Khan',
    'Arvind Tiwari',
    'Deepika Singh',
    'Pawan Srivastava',
    'Prabhakar Singh',
    'Rakesh Shukla',
    'Vinod Dubey'
    );

  $th = '
    <tr class="danger">
        <th>Sponsor Name</th>
        <th>Prayag Valley</th>
        <th>Royal Prayag</th>
        <th>Royal Stallion</th>
        <th>Arya Green</th>
        <th>Grand Total</th>
    </tr>
  ';
  
   if($data['sponsor'] == 'all_sponsor') {
      foreach ($sponsor_list as $key => $sponsor_name) {
        $inf = mysqli_query($con,"select * from demo where sponsor='$sponsor_name' and current_year='$year'");
         //$inf = mysqli_query($con,"select * from demo where last_updated='$data[report_date]'"); 
          if ( mysqli_num_rows($inf) > 0 ) {
                $temp = array();
                while( $ans = mysqli_fetch_assoc($inf) ) {
                  $emi_arr = json_decode($ans['emi_details'], true);
                  $a = array_pop($emi_arr);
                  $pro = $ans['project'];
                  $amt = $a['emi_amt'];
                  $temp[$pro] = $amt;
                }
                $emi_data[$sponsor_name] = $temp;
                
            } else {
                //echo "Error in information fetching<br>";
            }
    
      }

    } else {
      $inf = mysqli_query($con,"select * from demo where sponsor='$data[sponsor]' and current_year='$year'");
          if ( mysqli_num_rows($inf) > 0 ) {
                $temp = array();
                $sponsor_name = $data["sponsor"];
                while( $ans = mysqli_fetch_assoc($inf) ) {
                  $emi_arr = json_decode($ans['emi_details'], true);
                  $a = array_pop($emi_arr);
                  $pro = $ans['project'];
                  $amt = $a['emi_amt'];
                  $temp[$pro] = $amt;
                }
                $emi_data[$sponsor_name] = $temp;
          }
    }

    //-------------------------Generation of Content---------------------------
    foreach($emi_data as $sponsor_name => $a) {
      $prayag_valley += @$a["Prayag Valley"] ? @$a["Prayag Valley"] : 0;
      $royal_prayag += @$a["Royal Prayag"] ? @$a["Royal Prayag"] : 0;
      $royal_stallion += @$a["Royal Stallion"] ? @$a["Royal Stallion"] : 0;
      $arya_green += @$a["Arya Green"] ? @$a["Arya Green"] : 0;
      $grand_total += @$a["Prayag Valley"] + @$a["Royal Prayag"] + @$a["Royal Stallion"] + @$a["Arya Green"];
      @$tc .= '<tr>
              <td>'.$sponsor_name.'</td>
              <td>'.($a["Prayag Valley"] ? @$a["Prayag Valley"] : 0).'</td>
              <td>'.($a["Royal Prayag"] ? @$a["Royal Prayag"] : 0).'</td>
              <td>'.($a["Royal Stallion"] ? @$a["Royal Stallion"] : 0).'</td>
              <td>'.($a["Arya Green"] ? @$a["Arya Green"] : 0).'</td>
              <td>'.(@$a["Prayag Valley"] + @$a["Royal Prayag"] + @$a["Royal Stallion"] + @$a["Arya Green"]).'</td>
              </tr>';
      
    }

    @$gt = '<tr class="info">
            <td>Grand Total</td>
            <td>'.$prayag_valley.'</td>
            <td>'.$royal_prayag.'</td>
            <td>'.$royal_stallion.'</td>
            <td>'.$arya_green.'</td>
            <td>'.$grand_total.'</td>
            </tr>';

    $html = '<table border="1" class="table table-bordered">'.$th.$tc.$gt.'</table>';
   
   


    echo $html; 
}

function ledger($data,$con) {
      $cash = 0;
      $cheque = 0;
      $total = 0;
      $client_detail = "";
     $res = mysqli_query($con,"select * from demo where id='$data[client_id]'");
     if ( mysqli_num_rows($res) > 0 ) {
        $ans = mysqli_fetch_assoc($res);

        $client_detail = '
          <div class="client_detail">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="row">
                          <div class="col-sm-3">
                            <h5><b class="text-info">Client ID :</b></h5>
                          </div>
                          <div class="col-sm-3">
                            <h5><span>'.$ans['id'].'</span></h5>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3">
                            <h5><b class="text-info">Client Name :</b></h5>
                          </div>
                          <div class="col-sm-3">
                            <h5><span>'.$ans['client_name'].'</span></h5>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3">
                            <h5><b class="text-info">Sponsor Name : </b></h5>
                          </div>
                          <div class="col-sm-3">
                            <h5><span>'.$ans['sponsor'].'</span></h5>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3">
                            <h5><b class="text-info">Project Name : </b></h5>
                          </div>
                          <div class="col-sm-3">
                            <h5><span>'.$ans['project'].'</span></h5>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3">
                            <h5><b class="text-info">Agreement Date:</b></h5>
                          </div>
                          <div class="col-sm-3">
                            <h5><span>'.$ans['agreement_date'].'</span></h5>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="row">
                          <div class="col-sm-4">
                            <h5><b class="text-info">Plot No. : </b></h5>
                          </div>
                          <div class="col-sm-2">
                            <h5><span>'.$ans['plot_no'].'</span></h5>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-4">
                            <h5><b class="text-info">Plot Area : </b></h5>
                          </div>
                          <div class="col-sm-2">
                            <h5><span>'.$ans['plot_size'].'</span></h5>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-4">
                            <h5><b class="text-info">Total Plot Value : </b></h5>
                          </div>
                          <div class="col-sm-2">
                            <h5><span>'.$ans['tpv_including_plc'].' &#8377;</span></h5>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-4">
                            <h5><b class="text-info">Desposite Ammount : </b></h5>
                          </div>
                          <div class="col-sm-2">
                            <h5><span>'.$ans['total_recv_amt'].' &#8377;</span></h5>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-4">
                            <h5><b class="text-info">Balanced Ammount : </b></h5>
                          </div>
                          <div class="col-sm-2">
                            <span>'.$ans['balnced_amt'].' &#8377;</span></h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        ';

       // var_dump($ans);
        $th = '
            <tr class="danger">
                <th>Month</th>
                <th>Date</th>
                <th>Cash</th>
                <th>Cheque</th>
                <th>Total</th>
                <th>Reciept No.</th>
                <th>Cheque Date</th>
                <th>Bank Name</th>
                <th>NB/DP/EMI</th>
            </tr>
        ';
        $cash += $ans["cash"];
        $cheque += $ans["cheque"];
        $total += ($cash + $cheque);
        $tc = '<tr>
                  <td>'.$ans["mon"].'</td>
                  <td>'.$ans["date"].'</td>
                  <td>'.$ans["cash"].'</td>
                  <td>'.$ans["cheque"].'</td>
                  <td>'.($ans["cheque"] + $ans["cash"]).'</td>
                  <td>'.$ans["cheque_no"].'</td>
                  <td>'.$ans["date"].'</td>
                  <td>'.($ans["bank_name"] ? $ans["bank_name"] : "Not Available").'</td>
                  <td> Down Payment </td>
              </tr>
            ';

        $emi_details = json_decode($ans['emi_details'], true);
          foreach ($emi_details as $k => $v) {
            //var_dump($v["date"] == "e");
            @$total += $v["emi_amt"];
            @$cheque += $v["emi_amt"];
            @$cash += ($v["type"] == 'cash' ? $v["emi_amt"] : 0);
            @$tr_emi .= '<tr>
                  <td>'.($v["date"] == "e" ? 'e' : date('F', strtotime($v["date"])) ).'</td>
                  <td>'.$v["date"].'</td>
                  <td>0</td>
                  <td>'.$v["emi_amt"].'</td>
                  <td>'.$v["emi_amt"].'</td>
                  <td>'.$v["reciept_no"].'</td>
                  <td>'.$v["date"].'</td>
                  <td>'.($v["bank_name"] ? $v["bank_name"] : "Not Available").'</td>
                  <td>'.($v["type"] ? $v["type"] : "Emi").'</td>
              </tr>
            ';
          }

          $gt = '<tr>
                  <td colspan="2" class="text-center danger">Grand Total</td>
                  <td class="info">'.$cash.'</td>
                  <td class="warning">'.$cheque.'</td>
                  <td class="success">'.$total.'</td>
                  <td colspan="4" class="danger"></td>
              </tr>
            ';
          
      } else {
        //echo "Error Occured in query";
      }

      // $html = '<table border="1" class="table table-bordered">'.$th.$tc.$tr_emi.$gt.'</table>';
      $html = $client_detail.'
              <table border="1" class="table table-bordered">
                <thead>'.$th.'</thead>
                <tbody>'.$tc.@$tr_emi.$gt.'</tbody>
              </table>';
       echo $html;
}

?>

</div>
    </body>
</html>