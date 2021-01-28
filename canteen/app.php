<?php
    class app{
        
        public $con;

        function __construct ($props) {
            $this->connect();
        }

        function connect(){
             //after hosting this can be used.
            // $con=mysqli_connect("mysql.hostinger.in","u728032163_annie","786pradeep","u728032163_pics");
            $this->con = mysqli_connect("localhost","root","","canteen");
        }

        function del($props){
            $id = $props['id'];
            $table = $props['table'];
            $take=mysqli_query($this->con,"select * from $table where id='$id'");
            $ans=mysqli_fetch_assoc($take);
            //var_dump($ans);exit;
            if($ans)
            {
                @unlink($ans['image']);
                $res=mysqli_query($this->con,"delete from $table where id='$id'");
            }
            //echo $res ? "Deleted" : "Error";
            echo $res;
        }

        function setOrder($props){
           // $table = $props['table'];
            $id = $props['id'];
           // $tag = $props['tag'];
            $res=mysqli_query($this->con,"update orders set status='Delivered' where id='$id'"); 
            echo "Delivered";
        }
        
        function menuList($props){
            $tableHtml = "";
            $res = mysqli_query($this->con,"select * from items");
            if ( $res ) {
                while($items=mysqli_fetch_assoc($res)){
                    $image = empty($items['image']) ? 'image/error2.png' : $items['image'];
                    $name = $items['item'];
                    $amt = $items['amt'];
                    $id = $items['id'];
                    $tableHtml .= "
                        <div class='col-sm-3 board bg_white' id='items_$id'>
                            <div class='menu_item_img_box'>
                                <img src='./$image' class='img-responsive' alt='Menu Image'/>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span style='color:#17a2b8;'>$name</span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span>
                                    
                                </span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span class='text_gray'>
                                    Price : $amt RS
                                </span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <button class='btn btn-sm' onclick='delItem($id,`items`)'>
                                    Delete
                                </button>
                            </div>
                        </div>
                    ";
                }
            } else {
                $tableHtml = 'NO Item in Database';
            }
            
            $html = "<div class='row menu_item_box flex_box' id='menu_items'>
                        $tableHtml
                    </div>";
                    
            echo $html;
        }

        function getProfile(){
            $name = $_SESSION['user']['name'];
            $email = $_SESSION['user']['email'];
            $mobile = $_SESSION['user']['mobile'];
            $address= $_SESSION['user']['address'];
            $uid = "XXXXXXXXXXXXX";
            $status = $_SESSION['user']['status'];
            $html = "
                <table class='table table-hovered'>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Adharr No</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$mobile</td>
                        <td>$address</td>
                        <td>xxxxxxxxxx</td>
                        <td>$status</td>
                    </tr>
                </table>
            ";

            echo $html;
        }

        function orderList($props){
            // var_dump($props);
            $orders = mysqli_query($this->con,"select * from orders");
            $tableHtml = "";
            while($items=mysqli_fetch_assoc($orders)){
                $id = $items['id'];
                $tableHtml .= " <tr>
                                    <td>$items[id]</td>
                                    <td>$items[items]</td>
                                    <td>$items[email]</td>
                                    <td>$items[mobile]</td>
                                    <td>$items[address]</td>
                                    <td>$items[amt]</td>
                                    <td>$items[date]</td>
                                    <td id='order_status_$id'>$items[status]</td>
                                    <td>$items[type]</td>
                                    <td>
                                        <button onclick='setOrder(`$id`)' class='btn btn-sm btn-warning'>
                                            Update
                                        </button>
                                        <button onclick='delItem(`$id`,'orders')' class='btn btn-sm btn-warning'>
                                            Remove
                                        </button>
                                    </td>
                                </tr>";
            }

            $table = "<table class='table table-hover table-bordered' id='orderTable'> 
                        <tr class='bg-info'>
                            <th>ID</th>
                            <th>Items</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Ammountt</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                        $tableHtml
                    </table>";
                    
            echo $table;
         }

         function block($props){
            $table = $props['table'];
            $id = $props['id'];
            $tag = $props['tag'];
            $res=mysqli_query($this->con,"update $table set status='$tag' where id='$id'"); 
            echo $tag;
         }

         function empList($props){
            $tableHtml = "";
            $res = mysqli_query($this->con,"select * from users");
            if ( $res ) {
                while($users=mysqli_fetch_assoc($res)){
                    $image = empty($users['image']) ? 'image/user.png' : $items['image'];
                    $name = $users['name'];
                    $email = $users['email'];
                    $mobile = $users['mobile'];
                    $status = $users['status'];
                    $id = $users['id'];
                    $blockStr = strtolower($status) == "block" ? 'Active' : 'Block'; 
                    $tableHtml .= "
                        <div class='col-sm-3 board bg_white' id='users_$id'>
                            <div class='menu_item_img_box'>
                                <img src='./$image' class='img-responsive' alt='User Image'/>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span style='color:#17a2b8;'>$name</span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span>
                                    $email
                                </span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span style='color:#17a2b8;' id='users_status_$id'>$status</span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span class='text_gray'>
                                    $mobile
                                </span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <button class='btn btn-sm' onclick='delItem($id,`users`)'>
                                    Delete
                                </button>
                                <button class='btn btn-sm' onclick='block($id,`$blockStr`,`users`)'>
                                    $blockStr
                                </button>
                            </div>
                        </div>
                    ";
                }
            } else {
                $tableHtml = 'NO Item in Database';
            }
            
            $html = "<div class='row menu_item_box flex_box' id='menu_items'>
                        $tableHtml
                    </div>";
                    
            echo $html;
         }

        function orderPlace($data){
            
        }

        function takeOrders($data){
            if(empty($_SESSION['orders'])){
               $ids = $data['orderId'];
            } else {
                $ids = $_SESSION['orders'].",".$data['orderId'];
            }
            if(strpos( $_SESSION['orders'], $data['orderId'] ) === false ){
                $_SESSION['orders'] = $ids;
            }
            echo $_SESSION['orders'];
        }
        
        function parseData($req){
            foreach ($req as $key => $value) {
                $data[$key] = $value;
            }
            return $data;
        }

        function item_upload($data) {
             $item_image = uniqid().$_FILES['item_image']['name'];
             $f_path = "image/$item_image";
            $res = mysqli_query($this->con,"insert 
                                                into 
                                            items(
                                                `item`,
                                                `amt`,
                                                `image`
                                            ) 
                                            values(
                                                '$data[item_name]',
                                                '$data[item_amt]',
                                                '$f_path'
                                            )"
                                        );
            move_uploaded_file($_FILES['item_image']['tmp_name'], $f_path);
            header("location:admin.php");
        }

        function itemDetails($id){
            $res = mysqli_query($this->con,"select * from items where `id` IN ($id) ");
           // echo "select * from items where `id` IN ('$id') ";
            return $res;
        }

        function login($data){
            $res = mysqli_query($this->con,"select * from users where `email` = '$data[user_email]' and `password` = '$data[user_pass]' ");
            $ans = mysqli_fetch_assoc($res);
            if ( $ans ) {
                $_SESSION['user'] = $ans;
                $_SESSION['login'] = "passed";
                if($ans['email'] == 'admin@shuats.edu.in'){
                    header("location:admin.php");
                } else {
                    header("location:products.php");
                }
            } else {
                $_SESSION['login'] = "failed";
                header("location:index.php#login");
            }
        }

        function register($data){
            $res = mysqli_query($this->con,"insert 
                                            into 
                                        users(
                                            `name`,
                                            `email`,
                                            `address`,
                                            `mobile`,
                                            `password`
                                        ) 
                                        values(
                                            '$data[user_name]',
                                            '$data[user_email]',
                                            '$data[address]',
                                            '$data[user_mobile]',
                                            '$data[user_pass]'
                                        )"
                                    );
            if ( $res ) {
                header("location:index.php");
            } else {
                echo "Registration Failed. Please Try Again !!!";
            }
        }

        function getMenuItem(){
            $tableHtml = "";
            $res = mysqli_query($this->con,"select * from items");
            if ( $res ) {
                while($items=mysqli_fetch_assoc($res)){
                    $image = empty($items['image']) ? 'image/error2.png' : $items['image'];
                    $name = $items['item'];
                    $amt = $items['amt'];
                    $id = $items['id'];
                    $tableHtml .= "
                        <div class='col-sm-3 board bg_white'>
                            <div class='menu_item_img_box'>
                                <img src='./$image' class='img-responsive' alt='Menu Image'/>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span style='color:#17a2b8;'>$name</span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span>
                                    
                                </span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <span class='text_gray'>
                                    Price : $amt RS
                                </span>
                            </div>
                            <div class='text-center margin-vertical'>
                                <button class='btn btn-sm' onclick='takeOrder($id)'>
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    ";
                }
            } else {
                header("location:index.php");
            }
            
            $html = "<div class='row menu_item_box flex_box' id='menu_items'>
                        $tableHtml
                    </div>";
                    
            return $html;
        }

        function calulateOrder($ids){
            $ordersDetails = $this->itemDetails($ids);
            $orderAmt = 0;
            while($items=mysqli_fetch_assoc($ordersDetails)){
                $orderAmt += $items['amt'];
            }
            $_SESSION['GST'] = $orderAmt* 0.12;
            $_SESSION['total'] = $orderAmt;
            return $orderAmt;
        }

        function confirmOrder($props){
            $email = $_SESSION['user']['email'];
            $mobile = $_SESSION['user']['mobile'];
            $address= $_SESSION['user']['address'];
            $status = "Pending";
            $type = $props['type'];
            $amt = 0;
            $items = array();
            $orders = $this->itemDetails($_SESSION['orders']);
            while($item=mysqli_fetch_assoc($orders)){
                array_push($items,$item['item']);
                $amt += $item['amt'];
            }
            $list = json_encode($items);
            $res = mysqli_query($this->con,"insert 
                                                into 
                                            orders(
                                                `items`,
                                                `email`,
                                                `mobile`,
                                                `address`,
                                                `amt`,
                                                `date`,
                                                `status`,
                                                `type`
                                            ) 
                                            values(
                                                '$list',
                                                '$email',
                                                '$mobile',
                                                '$address',
                                                '$amt',
                                                now(),
                                                '$status',
                                                '$type'
                                            )"
                );
            if ( $res ) {
                echo "Order Confirmed !";
            } else {
                echo "Order is not Confirmed. Please try agian.";
            }
        }
        
        function getOrderTable($ids,$type='min'){
            $s_no = 1;
            $tableHtml = "";
            $add = "";
            $total = @$_SESSION['total'];
            $orders = $this->itemDetails($ids);
            while($items=mysqli_fetch_assoc($orders)){
                $tableHtml .= " <tr>
                                    <td>$s_no</td>
                                    <td>$items[item]</td>
                                    <td>$items[amt]</td>
                                </tr>";
                $s_no++;
            }
            if($type=='full') {
                $add = " <tr>
                            <td colspan=2>Total</td>
                            <td>$total</td>
                        </tr>";
            }
            $table = "<table class='table table-hover table-bordered' id='orderTable'> 
                        <tr class='bg-info'>
                            <th>Sr NO.</th>
                            <th>Item</th>
                            <th>Ammount</th>
                        </tr>
                        $tableHtml
                        $add
                    </table>";
                    
            return $table;
        }

    }
?>