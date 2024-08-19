<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  require_once(./function/cart.php);
  $created_date = $_POST("created_date");
  $grand_total = $_POST("grand_total");
  $paid	= $_POST("paid");
  $paymentmethod = $_POST("payment_method");
  $shipping_address = $_POST("shipping_address");
  $telephone = $_POST("telephone");
  $customer_name = $_POST("customer_name");
  $Email = $_POST("Email");

  if(count($items)==0){
    header("Location: cart.php");
    die();
  }

  $grand_total=0;
  foreach($items as $item){
    $grand_total+=$item["price"]*$item["quantity"];
  }

  $now = new DateTime();
?>