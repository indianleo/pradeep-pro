<!doctype html>
<html>
  <head>
      <?php include('header.html'); ?>
  </head>
  <body>
    <button class="btn btn-danger" onclick="window.location='admin.php';">Back</button>
    <div class="container">
<?php
$data = array();
foreach ($_REQUEST as $key => $value) {
  $data[$key] = $value;
}
$con= mysqli_connect('localhost','root','',"ary");
switch($data['summary_type']){
    case 'sponsor_name' : sponsor_name($data, $con);
    break;
    case 'client_name' : client_name($data,$con);
    break;
    case 'project_name' : project_name($data,$con);
    break;
    case 'client_id' : client_id($data,$con);
    break;
    case 'plot_no'  : plot_no($data,$con);
    break;
    default : def($data['action']);
    break;
}

function sponsor_name( $data,$con ){
    $inf = mysqli_query($con,"select * from demo where sponsor='$data[sponsor]'");
    if ( mysqli_num_rows($inf) > 0 ) {
        $th = '<thead>
                <tr class="danger">
                        <th>Id</th>
                        <th>Plot No.</th>
                        <th>Client Name</th>
                        <th>Total Plot Value</th>
                        <th>EMI/Month.</th>
                        <th>Total EMI Recieved</th>
                        <th>Balanced Ammount</th>
                        <th>Pending EMI</th>
                        <th>Total Due</th>
                        <th>EMI + Topup Recieved</th>
                        <th>Pending Ammount</th>
                        <th>Agreement Date</th>
                        <th>No. of EMI</th>
                </tr>
            </thead>
        ';
        while( $ans = mysqli_fetch_assoc($inf) ) {
            @$tc .= '<tbody>
                    <tr>
                        <td>'.$ans['id'].'</td>
                        <td>'.$ans['plot_no'].'</td>
                        <td>'.$ans['client_name'].'</td>
                        <td>'.$ans['tpv_including_plc'].'</td>
                        <td>'.$ans['emi_month'].'</td>
                        <td>'.$ans['total_recv_amt'].'</td>
                        <td>'.$ans['balnced_amt'].'</td>
                        <td>'.$ans['pending_emi'].'</td>
                        <td>'.$ans['total_due'].'</td>
                        <td>'.$ans['total_emi_recv'].'</td>
                        <td>'.$ans['pending_amt'].'</td>
                        <td>'.$ans['agreement_date'].'</td>
                        <td>'.$ans['duration'].'</td>
                    </tr>
                </tbody>
            ';
        }

        $html = '<table class="table table-bordered table-hover">'.$th.$tc.'</table>';
        echo $html;       
    } else {
         echo "Sponsor Name not found<br>";
    }
}

function client_name( $data,$con ){
    $inf = mysqli_query($con,"select * from demo where client_name LIKE '%$data[filter_value]%'");
     if ( mysqli_num_rows($inf) > 0 ) {
         @$th = '<thead>
                <tr class="danger">
                        <th>Id</th>
                        <th>Plot No.</th>
                        <th>Client Name</th>
                        <th>Total Plot Value</th>
                        <th>EMI/Month.</th>
                        <th>Total EMI Recieved</th>
                        <th>Balanced Ammount</th>
                        <th>Pending EMI</th>
                        <th>Total Due</th>
                        <th>EMI + Topup Recieved</th>
                        <th>Pending Ammount</th>
                        <th>Agreement Date</th>
                        <th>No. of EMI</th>
                </tr>
            </thead>
        ';
        while( $ans = mysqli_fetch_assoc($inf) ) {
            @$tc .= '<tbody>
                    <tr>
                        <td>'.$ans['id'].'</td>
                        <td>'.$ans['plot_no'].'</td>
                        <td>'.$ans['client_name'].'</td>
                        <td>'.$ans['tpv_including_plc'].'</td>
                        <td>'.$ans['emi_month'].'</td>
                        <td>'.$ans['total_recv_amt'].'</td>
                        <td>'.$ans['balnced_amt'].'</td>
                        <td>'.$ans['pending_emi'].'</td>
                        <td>'.$ans['total_due'].'</td>
                        <td>'.$ans['total_emi_recv'].'</td>
                        <td>'.$ans['pending_amt'].'</td>
                        <td>'.$ans['agreement_date'].'</td>
                        <td>'.$ans['duration'].'</td>
                    </tr>
                </tbody>
            ';
        }

        $html = '<table class="table table-bordered table-hover">'.$th.$tc.'</table>';
        echo $html;       
    } else {
         echo "Client Name not found !!!<br> Please Provide different Client Name";
    }
}

function project_name( $data,$con ){
    $inf = mysqli_query($con,"select * from demo where project='$data[project_name]'");
     if ( mysqli_num_rows($inf) > 0 ) {
         @$th = '<thead>
                <tr class="danger">
                        <th>Id</th>
                        <th>Plot No.</th>
                        <th>Client Name</th>
                        <th>Total Plot Value</th>
                        <th>EMI/Month.</th>
                        <th>Total EMI Recieved</th>
                        <th>Balanced Ammount</th>
                        <th>Pending EMI</th>
                        <th>Total Due</th>
                        <th>EMI + Topup Recieved</th>
                        <th>Pending Ammount</th>
                        <th>Agreement Date</th>
                        <th>No. of EMI</th>
                </tr>
            </thead>
        ';
        while( $ans = mysqli_fetch_assoc($inf) ) {
            @$tc .= '<tbody>
                    <tr>
                        <td>'.$ans['id'].'</td>
                        <td>'.$ans['plot_no'].'</td>
                        <td>'.$ans['client_name'].'</td>
                        <td>'.$ans['tpv_including_plc'].'</td>
                        <td>'.$ans['emi_month'].'</td>
                        <td>'.$ans['total_recv_amt'].'</td>
                        <td>'.$ans['balnced_amt'].'</td>
                        <td>'.$ans['pending_emi'].'</td>
                        <td>'.$ans['total_due'].'</td>
                        <td>'.$ans['total_emi_recv'].'</td>
                        <td>'.$ans['pending_amt'].'</td>
                        <td>'.$ans['agreement_date'].'</td>
                        <td>'.$ans['duration'].'</td>
                    </tr>
                </tbody>
            ';
        }
        
        $html = '<table class="table table-bordered table-hover">'.$th.$tc.'</table>';
        echo $html;
    } else {
         echo "Project Name not found<br>";
    }
}

function client_id( $data,$con ){
    $inf = mysqli_query($con,"select * from demo where id='$data[client_id]'");
     if ( mysqli_num_rows($inf) > 0 ) {
         $th = '<thead>
                <tr class="danger">
                        <th>Id</th>
                        <th>Plot No.</th>
                        <th>Client Name</th>
                        <th>Total Plot Value</th>
                        <th>EMI/Month.</th>
                        <th>Total EMI Recieved</th>
                        <th>Balanced Ammount</th>
                        <th>Pending EMI</th>
                        <th>Total Due</th>
                        <th>EMI + Topup Recieved</th>
                        <th>Pending Ammount</th>
                        <th>Agreement Date</th>
                        <th>No. of EMI</th>
                </tr>
            </thead>
        ';
        while( $ans = mysqli_fetch_assoc($inf) ) {
            @$tc .= '<tbody>
                    <tr>
                        <td>'.$ans['id'].'</td>
                        <td>'.$ans['plot_no'].'</td>
                        <td>'.$ans['client_name'].'</td>
                        <td>'.$ans['tpv_including_plc'].'</td>
                        <td>'.$ans['emi_month'].'</td>
                        <td>'.$ans['total_recv_amt'].'</td>
                        <td>'.$ans['balnced_amt'].'</td>
                        <td>'.$ans['pending_emi'].'</td>
                        <td>'.$ans['total_due'].'</td>
                        <td>'.$ans['total_emi_recv'].'</td>
                        <td>'.$ans['pending_amt'].'</td>
                        <td>'.$ans['agreement_date'].'</td>
                        <td>'.$ans['duration'].'</td>
                    </tr>
                </tbody>
            ';
        }

        $html = '<table class="table table-bordered table-hover">'.$th.$tc.'</table>';
        echo $html;       
    } else {
         echo "Client ID not found<br>";
    }
}

function plot_no( $data,$con ){
    $inf = mysqli_query($con,"select * from demo where plot_no LIKE '%$data[filter_value]%'");
    if ( mysqli_num_rows($inf) > 0 ) {
         $th = '<thead>
                <tr class="danger">
                        <th>Id</th>
                        <th>Plot No.</th>
                        <th>Client Name</th>
                        <th>Total Plot Value</th>
                        <th>EMI/Month.</th>
                        <th>Total EMI Recieved</th>
                        <th>Balanced Ammount</th>
                        <th>Pending EMI</th>
                        <th>Total Due</th>
                        <th>EMI + Topup Recieved</th>
                        <th>Pending Ammount</th>
                        <th>Agreement Date</th>
                        <th>No. of EMI</th>
                </tr>
            </thead>
        ';
        while( $ans = mysqli_fetch_assoc($inf) ) {
            @$tc .= '<tbody>
                    <tr>
                        <td>'.$ans['id'].'</td>
                        <td>'.$ans['plot_no'].'</td>
                        <td>'.$ans['client_name'].'</td>
                        <td>'.$ans['tpv_including_plc'].'</td>
                        <td>'.$ans['emi_month'].'</td>
                        <td>'.$ans['total_recv_amt'].'</td>
                        <td>'.$ans['balnced_amt'].'</td>
                        <td>'.$ans['pending_emi'].'</td>
                        <td>'.$ans['total_due'].'</td>
                        <td>'.$ans['total_emi_recv'].'</td>
                        <td>'.$ans['pending_amt'].'</td>
                        <td>'.$ans['agreement_date'].'</td>
                        <td>'.$ans['duration'].'</td>
                    </tr>
                </tbody>
            ';
        }

        $html = '<table class="table table-bordered table-hover">'.$th.$tc.'</table>';
        echo $html;     
    } else {
         echo "Plot Number not found !!!<br>";
    }

}


?>

</div>
    </body>
</html>