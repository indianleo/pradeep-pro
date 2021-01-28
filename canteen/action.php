<?php
session_start();
include_once('./app.php');
$app = new app("Intialize App");

switch($_REQUEST['action']){
    case 'login' : $app->login($_REQUEST);
    break;
    case 'reg' : $app->register($_REQUEST);
    break;
    case 'item_upload' : $app->item_upload($_REQUEST);
    break;
    case 'takeOrder' : $app->takeOrders($_REQUEST);
    break;
    case 'orderPlace' : $app->orderPlace($_REQUEST);
    break;
    case 'menu' : $app->menuList($_REQUEST);
    break;
    case 'orderList' : $app->orderList($_REQUEST);
    break;
    case 'emp' : $app->empList($_REQUEST);
    break;
    case 'del' : $app->del($_REQUEST);
    break;
    case 'block' : $app->block($_REQUEST);
    break;
    case 'confirmOrder' : $app->confirmOrder($_REQUEST);
    break;
    case 'setOrder' : $app->setOrder($_REQUEST);
    break;
    default : echo "Action not found";
    break;
}

  

?>