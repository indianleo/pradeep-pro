<?php
$data = array();
foreach ($_REQUEST as $key => $value) {
  $data[$key] = $value;
}
switch($data['action']){
  case 'master_form' : master_form($data);
  break;
  case 'update_emi' : update_emi($data);
  break;
  default : def($data['action']);
  break;
}

function update_emi($data){
  $con= mysqli_connect('localhost','root','',"ary");
  //--------------------get data of coustomer--------------------------
  $inf = mysqli_query($con,"select * from demo where id='$data[user_id]'");
  if ( mysqli_num_rows($inf) > 0 ) {
    $ans = mysqli_fetch_assoc($inf);
  }
  //---------------------------start of calculation---------------------

  $emi_month = $ans['emi_month'];
  $emi_amt = $data['emi_amt'];
  $pending_emi = 0;
  $less_amt = 0;
  $extra_topup = 0;
  $count_emi = 0;
  $no_of_emi = intval($emi_amt/$emi_month);
  $emi = $ans['emi']; //total emi
  //$pending_emi = intval($ans['pending_emi']);

  //---------------------------------------------------------------------------

  if( $data['emi_amt'] < $emi_month ){
    $less_amt =  $emi_month - $data['emi_amt'];
    $total_emi_recv = $ans['total_emi_recv'] + $data['emi_amt'];
    $extra_topup = 0;
  } else if( $data['emi_amt'] == $emi_month ){
    $less_amt = 0;
    $extra_topup = 0;
    $total_emi_recv = $ans['total_emi_recv'] + $emi_month;
  } else{
    $less_amt = 0;
    $extra_topup = $data['emi_amt'] - $emi_month;
    $total_emi_recv = $ans['total_emi_recv'] + $emi_month;
  }
  $emi_details = json_decode($ans['emi_details']);
  $a = array(
          'emi_amt'   =>$data['emi_amt'],
          'date'      =>$data['emi_date'],
          'no_of_emi' =>$no_of_emi,
          'less_amt'  =>$less_amt,
          'type'      =>$data['payment_type'],
          'reciept_no'=>$data['reciept_no']
        );
              
  for($i=1;$i<=$no_of_emi;$i++){
    if($i == $no_of_emi){
       array_push($emi_details,$a);
    }else{
       array_push($emi_details,"extra");
    }
  }
  /*
  foreach ($emi_details as $key => $value) {
    if($value != 0 || $value != 'extra') {
      //$count_emi++;
      $pending_emi--;
     // var_dump($pending_emi);
    }
  }
  */
    $topup = $ans['topup'] + $extra_topup;
    $pending_emi = $ans['pending_emi'] - 1;
    $pending_amt = $pending_emi * $emi_month;
    $actual_pending = $pending_amt - $extra_topup;
    $total = $total_emi_recv + $topup;
    $total_due = $ans['duration'] * $emi_month;
    $pending_emi_amt = $ans['emi'] - $total;
    $balnced_amt = $total_due - $total;

  //------------------------------------------------------------------------------

  $tpv_including_plc = $ans['tpv_including_plc'];
  $total_receved_amt = $ans['cash'] + $ans['cheque'] + $total;
 // $balnced_amt = $tpv_including_plc - $total_receved_amt;
  $emi_arr = json_encode($emi_details);
  $approx = number_format(($total_receved_amt/$tpv_including_plc)*100, 2);  //calculating percentage of paid value
  $current_month = date('n', strtotime($data['emi_date']) );
  $current_year = date('Y', strtotime($data['emi_date']) );
  $status = $actual_pending == 0 ? 'done' : 'pending';
  //---------------------------end of calculation------------------------
  $res = mysqli_query($con,"update
                              demo
                            set
                              `approx` = '$approx',
                              `total` = '$total',
                              `pending_emi` = '$pending_emi',
                              `pending_emi_amt` = '$pending_emi_amt',
                              `emi_details`='$emi_arr',
                              `pending_amt` = '$pending_amt',
                              `actual_pending` = '$actual_pending',
                              `total_due` = '$total_due',
                              `total_emi_recv`='$total_emi_recv',
                              `topup` = '$topup',
                              `total_recv_amt`='$total_receved_amt',
                              `balnced_amt` = '$balnced_amt',
                              `last_updated` = '$data[emi_date]',
                              `current_month` = '$current_month',
                              `current_year` = '$current_year',
                              `status` = '$status'
                            where
                              id='$data[user_id]'
                              ");
  if($res){
    header("location:admin.php");
  }else{
    echo "Error in Update !!!";
  }
}

function master_form($data){
    $con= mysqli_connect('localhost','root','',"ary");

    //---------------------------start of calculation---------------------
    $emi_month = $data['emi_month'];
    $plot_value = $data['plot_size'] * $data['rate'];
    $plc_amt = $data['plot_value'] == 'yes' ? $plot_value * .10 : 0;
    $tpv_including_plc = $plot_value + $plc_amt;
    $topup = 0;
    $total_emi_recv = 0;
    $total_emi = $emi_month*$data['duration'];
    $total = $data['cash'] + $data['cheque'];
    $total_due = $data['duration'] * $emi_month;
    $emi_details = array();
    $total_receved_amt = $data['cash'] + $data['cheque'] + $topup;
    $emi_topup = 0;
    $emi_details_arr = json_encode($emi_details);
    $balnced_amt = $tpv_including_plc - $total_receved_amt;
    $pending_emi = $data['duration'];
    $down_payment = ($tpv_including_plc)*.40;  
    $pending_amt = $pending_emi * $emi_month;
    $actual_pending = $pending_amt - $topup;
    $approx = round(($total_receved_amt/$tpv_including_plc)*100); //calculating percentage of paid value
    //---------------------------end of calculation------------------------
    $query = mysqli_query($con,"insert
                                  into
                                  demo(
                                    `mon`,
                                    `date`,
                                    `project`,
                                    `sponsor`,
                                    `plot_no`,
                                    `client_name`,
                                    `bank_name`,
                                    `resi_add`,
                                    `contact_no`,
                                    `nomini`,
                                    `plot_size`,
                                    `rate`,
                                    `plot_value`,
                                    `plc_amt`,
                                    `tpv_including_plc`,
                                    `cash`,
                                    `cheque`,
                                    `cheque_no`,
                                    `approx`,
                                    `total`,
                                    `down_payment`,
                                    `agreement_date`,
                                    `duration`,
                                    `emi_month`,
                                    `emi`,
                                    `pending_emi`,
                                    `emi_details`,
                                    `total_due`,
                                    `pending_amt`,
                                    `actual_pending`,
                                    `total_recv_amt`,
                                    `balnced_amt`,
                                    `status`
                                  )
                                  values(
                                    '$data[mon]',
                                    '$data[date]',
                                    '$data[project]',
                                    '$data[sponsor]',
                                    '$data[plot_no]',
                                    '$data[client_name]',
                                    '$data[bank_name]',
                                    '$data[resi_add]',
                                    '$data[contact_no]',
                                    '$data[nomini]',
                                    '$data[plot_size]',
                                    '$data[rate]',
                                    '$plot_value',
                                    '$plc_amt',
                                    '$tpv_including_plc',
                                    '$data[cash]',
                                    '$data[cheque]',
                                    '$data[cheque_no]',
                                    '$approx',
                                    '$emi_topup',
                                    '$down_payment',
                                    '$data[agreement_date]',
                                    '$data[duration]',
                                    '$data[emi_month]',
                                    '$total_emi',
                                    '$pending_emi',
                                    '$emi_details_arr',
                                    '$pending_amt',
                                    '$actual_pending',
                                    '$total_due',
                                    '$total_receved_amt',
                                    '$balnced_amt',
                                    'pending'
                                  )"
                          );
    if($query){
      echo "Data Inserted Succesfully !!!";
      header("location:admin.php");
    } else{
      echo "Error Occured during Inserting Record";
    }
}

function def($action){
  echo "Function Not found";
}

?>
