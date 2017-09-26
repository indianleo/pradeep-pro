<?php
    $data = array();
    foreach ($_REQUEST as $key => $value) {
    $data[$key] = $value;
    }
    $id = $data['client_id'];
    $con = mysqli_connect("localhost","root","","ary");
    //--------------------get data of coustomer--------------------------
    $inf = mysqli_query($con,"select * from demo where id='$id'");
    if ( mysqli_num_rows($inf) > 0 ) {
        $ans = mysqli_fetch_assoc($inf);
    }
    $topup = $ans['topup'];
    $total_emi_recv = $ans['total_emi_recv'];
    $total = $total_emi_recv + $topup;
    $tpv_including_plc = $ans['tpv_including_plc'];
    $total_receved_amt = $ans['cash'] + $ans['cheque'] + $total;
    $balnced_amt = $tpv_including_plc - $total_receved_amt;
    $approx = round(($total_receved_amt/$tpv_including_plc)*100);

    $res = mysqli_query($con,"update
                              demo
                            set
                                `mon` = '$data[mon]',
                                `date` = '$data[date]',
                                `project` = '$data[project]',
                                `sponsor` = '$data[sponsor]',
                                `plot_no` = '$data[plot_no]',
                                `client_name` = '$data[client_name]',
                                `bank_name` = '$data[bank_name]',
                                `resi_add` = '$data[resi_add]',
                                `contact_no` = '$data[contact_no]',
                                `nomini` = '$data[nomini]',
                                `cash` = '$data[cash]',
                                `cheque` = '$data[cheque]',
                                `approx` = '$approx',
                                `agreement_date` = '$data[agreement_date]',
                                `total_recv_amt` = '$total_receved_amt',
                                `balnced_amt` = '$balnced_amt',
                                `status` = '$data[status]'
                            where
                              id='$id'
                              "
                        ); 
    if($res){
        header("location:records.php");
    } else {
        
        echo "Some error occured !!!!";
    }
?>