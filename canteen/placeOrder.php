<?php
  session_start();
  if(!isset($_SESSION['user'])) {
      header("location:index.php#portfolio");
  } else if(empty($_SESSION['orders']) ){
      header("location:products.php#portfolio"); 
  }
  include_once('./app.php');
  $app = new app("Intialize App");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once("header.html"); ?>
  </head>
  <body id="page-top">
        <section class="bg-info" id="items">
            <div class="row">
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary" onclick="checkMethod('cod')">COD</button>
                    <button type="button" class="btn btn-primary" onclick="checkMethod('payPal')">PayPal</button>
                </div>
                <div class="col-sm-6">
                    <!-- method will show here -->
                    <div id="out">
                        <div class="row">
                            <div class="payment_box">
                                <h5 class="text-center">Canteen Receipt</h5>
                                <?php echo $app->getOrderTable($_SESSION['orders'],'full'); ?>
                                <div class="align-center">
                                    <button onclick="confirmOrder()" type="button" id="print" class="btn btn-sm btn-danger">
                                        Confirm
                                    </button>
                                    <button onclick="print()" type="button" id="print" class="btn btn-sm btn-danger">
                                        Print Reciept
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="box"></div>
                </div>
            </div>
        </section>
        <script>
            function confirmOrder(){
                var show = new XMLHttpRequest();
				show.onreadystatechange=function() {
                    if(show.readyState == 4 && show.status==200) {
                        alert(show.responseText);	
                    } 
				}
                show.open("GET","action.php?action=confirmOrder&type=COD",true);
                show.send();
            }

            function downloadTable(html){
                //let html = document.querySelector('body').innerHTML;
                let link = document.createElement('a');
                let mimeType = 'text/html';
                link.setAttribute('download', 'Order.xls');
                link.setAttribute('href', 'data:' + mimeType  +  ';charset=utf-8,' + encodeURIComponent(html));
                link.click(); 
            }

            function print() {
                let html = document.querySelector("#orderTable").outerHTML;
            // export_table_to_csv(html, "table.csv", id);
                downloadTable(html);
            }
            function checkMethod(type){
                var node = document.querySelector('#out');
                if(type == 'cod'){
                   
                } else {
                    node.innerHTML = `
                        <div>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type='hidden' name='business' value='pradeepdv45-facilitator_api1.gmail.com'>
                                <input type='hidden' name='item_name' value='Camera'>
                                <input type='hidden' name='item_number' value='CAM#N1'>
                                <input type='hidden' name='amount' value="<?php echo $_SESSION['total']; ?>">
                                <input type='hidden' name='no_shipping' value='1'>
                                <input type='hidden' name='currency_code' value='USD'>
                                <input type='hidden' name='notify_url' value='http://SITE NAME/payment.php'>
                                <input type='hidden' name='cancel_return' value='http://SITE NAME/cancel.php'>
                                <input type='hidden' name='return' value='http://SITE NAME/success.php'>
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="### COPY FROM BUTTON CODE ###">
                                <input type="image" style="width: 100%;" class="pull-right" src="./image/place_order.jpg" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            </form>
                        </div>
                    `;
                }
            }
        </script>
  </body>

</html>